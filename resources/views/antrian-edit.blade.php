@extends('layouts.main-layouts')

@section('title', 'Antrian - Edit')

@section('content')

@if ($login = Session::get('login'))
<div class="alert alert-success col-auto" data-bs-toggle="alert">
<button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
{{ $login }}
</div>
@elseif ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        html: `<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
        confirmButtonText: 'OK',
        focusConfirm: false
    });
</script>
@endif

<div class="container mt-5">
  <div class="row col-sm-10">
      <div class="col">
          <div class="card">
              <h5 class="card-header">Edit - Pasien </h5>
              <div class="card-body">


                <form action="/antrian/{{$pasien->id}}" method="POST">
                    @csrf
                    @method('PUT')

                 <div class="card px-0 ">
                    <div class="card-body">            
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control form-control-sm" required placeholder="Masukan Nama" name="nama" id="nama" value="{{$pasien->nama}}">
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control form-control-sm" required placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir" value="{{$pasien->tanggal_lahir}}">
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control form-control-sm" required placeholder="Masukan Alamat" name="alamat" id="alamat" value="{{$pasien->alamat}}" >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Nomor Telp</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control form-control-sm" required placeholder="Masukan No.Telp" name="nomor_telepon" id="nomor_telepon" value="{{$pasien->nomor_telepon}}"  >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Antri</label>
                      <div class="col-sm-3">
                          <input type="date" class="form-control form-control-sm" required placeholder="Masukan Tanggal Antri" name="tanggal_antri" id="tanggal_antri" value="{{$pasien->tanggal_antri}}" >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Waktu Antri</label>
                      <div class="col-sm-3">
                          <select name="waktu_id" class="form-select-sm " id="waktu_id" required>
                              <option value="{{$pasien->waktu->waktu_id}}">{{ $pasien->waktu->waktu_antri }}</option>
                              @foreach ($waktu as $item)
                              <option value="{{$item->waktu_id}}">{{$item->waktu_antri}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Poli</label>
                      <div class="col-sm-3">
                          <select name="id_poli" class="form-select-sm" id="id_poli" required>
                              <option value="{{$pasien->poli->id_poli}}">{{ $pasien->poli->nama_poli }}</option>
                              @foreach ($poli as $item)
                              <option value="{{$item->id_poli}}">{{ $item->nama_poli }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Pegawai</label>
                      <div class="col-sm-3">
                          <select name="id_pegawai" class="form-select-sm " id="id_pegawai" required>
                              <option value="{{$pasien->pegawai->id_pegawai}}">{{$pasien->pegawai->nama}}</option>
                              @foreach ($pegawai as $item)
                              <option value="{{$item->id_pegawai}}">{{ $item->nama }}</option>
                              @endforeach
                          </select>
                      </div>    
                  </div>
                  
              <hr>
                  <button class="btn btn-success mx-3 text-dark" type="submit">Simpan</button>
                  <a href="/antrian" class="btn btn-warning text-white" >Kembali</a>
              
          </div>
        </div>
      </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
@endsection