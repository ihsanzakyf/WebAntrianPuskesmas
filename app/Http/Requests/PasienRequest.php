<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required:pasien',
            'tanggal_lahir' => 'required:pasien',
            'alamat' => 'required:pasien',
            'nomor_telepon' => 'required:pasien',
            'tanggal_antri' => 'required:pasien',
            'waktu_id' => 'unique:pasien',
            'id_poli' => 'required:pasien',
            'id_pegawai' => 'required:pasien'

        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'nomor_telepon' => 'Nomor Telepon',
            'tanggal_antri' => 'Tanggal Antri',
            'waktu_id' => 'Waktu antri',
            'id_poli' => 'Poli',
            'id_pegawai' => 'Pegawai'


        ];
    }

    public function messages()
    {
        return [
            'nama.required'            => 'Nama harus diisi !',
            'tanggal_lahir.required'   => 'Tanggal Lahir harus diisi !',
            'alamat.required'          => 'Alamat harus diisi !',
            'nomor_telepon.required'   => 'Nomor Telepon harus diisi !',
            'tanggal_antri.required'   => 'Tanggal Antri harus diisi !',
            'waktu_id.unique'          => 'Waktu antri sudah digunakan oleh pasien lain !',
            'id_poli.required'         => 'Poli harus diisi !',
            'id_pegawai.required'      => 'Pegawai harus diisi !'

        ];
    }
}
