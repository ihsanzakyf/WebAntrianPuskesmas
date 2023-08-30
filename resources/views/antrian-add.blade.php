@extends('layouts.main-layouts')

@section('title', 'Antrian - Add')

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
            html: `@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach`,
            confirmButtonText: 'OK',
            focusConfirm: false
        });
    </script>
    @endif
@if ($exception = Session::get('exception'))
    @if (strpos($exception, 'Duplicate entry') !== false)
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Duplicate Entry!',
                text: 'SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endif


<div class="container mt-5">
  <div class="row col-sm-10">
      <div class="col">
          <div class="card">
              <h5 class="card-header">Tambah - Pasien </h5>
              <div class="card-body">
                

                <form action="antrian" method="POST">
                    
                  {{ csrf_field() }}
                  
                 

                 <div class="card px-0 ">
                    <div class="card-body">            
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control form-control-sm" placeholder="Masukan Nama" name="nama" id="nama" >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control form-control-sm" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir">
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control form-control-sm" placeholder="Masukan Alamat" name="alamat" id="alamat" >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Nomor Telp</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control form-control-sm" placeholder="Masukan No.Telp" name="nomor_telepon" id="nomor_telepon" >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Tanggal Antri</label>
                      <div class="col-sm-3">
                          <input type="date" class="form-control form-control-sm" placeholder="Masukan Tanggal Antri" name="tanggal_antri" id="tanggal_antri" >
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Waktu Antri</label>
                      <div class="col-sm-3">
                          <select name="waktu_id" class="form-control js-example-responsive form-select-sm select2" id="waktu_id">
                              <option value="waktu_id">--Pilih Salah Satu--</option>
                              @foreach ($waktu as $item)
                              <option value="{{$item->waktu_id}}">{{ $item->waktu_antri }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Poli</label>
                      <div class="col-sm-3">
                          <select name="id_poli" class="form-control js-example-responsive form-select-sm select2" id="id_poli">
                              <option value="id_poli">--Pilih Salah Satu--</option>
                              @foreach ($poli as $item)
                              <option value="{{$item->id_poli}}">{{ $item->nama_poli }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Pegawai</label>
                      <div class="col-sm-3">
                          <select name="id_pegawai" class="form-control js-example-responsive form-select-sm select2" id="id_pegawai">
                              <option value="id_pegawai">--Pilih Salah Satu--</option>
                              @foreach ($pegawai as $item)
                              <option value="{{$item->id_pegawai}}">{{ $item->nama }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  
              <hr>
                  <button class="btn btn-outline-dark" type="submit">Simpan</button>
                  <a href="/antrian" class="btn btn-outline-primary" >Kembali</a>
              
          </div>
        </div>
      </form>

    </div>
  </div>



  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>

  <script>
      $(waktu_id).ready(function() {
          $('.select2').select2({
              theme: 'bootstrap-5'
          });
      });
  </script>
@endsection