@extends('layouts.main-layouts')

@section('title', 'Deleted Pasien')

@section('content')

<div class="card px-0">
    <div class="card-header ">
      Halaman Data Yang Sudah di Delete
    </div>
    <div class="card-body">
      <table class="table table-bordered text-center">
        <tr>
            <th>No. Pasien</th>
            <th>Nama Pasien</th>
            <th>Tanggal Lahir</th>
            <th>Tanggal Antri</th>
            <th>Waktu Antri</th>
            <th>Poli</th>
            <th>Pegawai</th>
            <th>Action</th>
        </tr>
        @foreach ($deleted as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            {{--  --}}
            <td><a href="/student/{{$item->id}}/restore" class="btn btn-primary">Restore</a></td>
        </tr>
        @endforeach
      </table>
      <a href="/student" class="btn btn-primary">Kembali</a>
    </div>
  </div>

@endsection