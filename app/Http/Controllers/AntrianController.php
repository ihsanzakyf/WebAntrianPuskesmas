<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Waktu;
use App\Models\Pasien;
use App\Models\Antrian;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\PasienRequest;
use Illuminate\Support\Facades\Session;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $pasien = Pasien::with(['waktu', 'poli', 'pegawai'])
            ->where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tanggal_lahir', $keyword)
            ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nomor_telepon', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tanggal_antri', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('waktu', function ($query) use ($keyword) {
                $query->where('waktu_antri', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(5);

        return view('/antrian', [
            'pasienList' => $pasien

        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $waktu = Waktu::all();
        $poli = Poli::all();
        $pegawai = Pegawai::all();
        return view('antrian-add', [
            'waktu' => $waktu,
            'poli' => $poli,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PasienRequest $request)
    {
        $pasien = Pasien::create($request->all());

        return redirect('/antrian')->with('berhasil', 'Berhasil Ditambahkan !');
        // $selectedWaktu = $request->input('waktu_id');
        // $waktuAntri = Waktu::findOrFail($selectedWaktu)->waktu_antri;

        // $pasienCount = Pasien::where('waktu_antri', $waktuAntri)->count();
        // if ($pasienCount >= 5) {
        //     // Menampilkan pesan batasan maksimum pasien dalam 1 jam 
        //     return redirect('/antrian')->with('gagal', 'Batasan maksimum pasien dalam 1 jam telah tercapai.');
        // }

        // $pasien = Pasien::create(array_merge($request->all(), ['waktu_antri' => $waktuAntri]));

        // return redirect('/antrian')->with('berhasil', 'Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pas = Pasien::with(['waktu', 'poli', 'pegawai'])->findOrFail($id);

        return view('antrian-detail', [
            'pas' => $pas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $pasien = Pasien::with(['waktu', 'poli', 'pegawai'])->findOrFail($id);
        $pegawai = Pegawai::where('id_pegawai', '!=', $pasien->id_pegawai)->get(['id_pegawai', 'nama']);
        $waktu = Waktu::where('waktu_id', '!=', $pasien->waktu_id)->get(['waktu_id', 'waktu_antri']);
        $poli = Poli::where('id_poli', '!=', $pasien->id_poli)->get(['id_poli', 'nama_poli']);

        return view('/antrian-edit', [
            'pasien' => $pasien,
            'pegawai' => $pegawai,
            'waktu' => $waktu,
            'poli' => $poli
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->update($request->all());
            return redirect('/antrian')->with('update', 'Update data berhasil!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect('/antrian')->withErrors(['error' => 'Jam tersebut sudah digunakan!']);
            }
            return redirect('/antrian')->withErrors(['error' => 'An error occurred during the update.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Pasien::findOrFail($id);
        $delete->delete();

        return redirect('/antrian')->with('hapus', 'Data berhasil dihapus');
    }

    function delete($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('antrian-delete', [
            'pasien' => $pasien
        ]);
    }

    function statuspangpeg($id)
    {
        $status = Pasien::where('id', $id)->first();
        $cek = $status->status;

        if ($cek == 1) {
            Pasien::where('id', $id)->update([
                'status' => 2
            ]);
        } else {
            echo "Panggilan sudah di lakukan";
        }
        return redirect('/antrian');
    }
    function statuspangdok($id)
    {
        $status = Pasien::where('id', $id)->first();
        $cek = $status->status;

        if ($cek == 2) {
            Pasien::where('id', $id)->update([
                'status' => 3
            ]);
        }
        return redirect('/antrian');
    }
}
