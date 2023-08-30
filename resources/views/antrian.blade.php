@extends('layouts.main-layouts')

@section('title', 'Antrian')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if ($login = Session::get('login'))
<script>
     Swal.fire({
                    title: 'Login Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
    
</script>
@elseif ($berhasil = Session::get('berhasil'))
<script>
     Swal.fire({
                    title: 'Berhasil Ditambahkan!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
</script>
@elseif ($update = Session::get('update'))
<script>
    Swal.fire({
                    title: 'Update Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
</script>
@elseif ($hapus = Session::get('hapus'))
<script>
    Swal.fire({
                    title: 'Hapus Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
</script>
@elseif ($panggil = Session::get('panggil'))
<script>
    Swal.fire({
                    title: 'Pangggil pasien Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
</script>
@elseif ($error = Session::get('error'))
<script>
    Swal.fire({
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
</script>
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


<div class="container-fluid mt-3" data-aos="fade-up" data-aos-duration="1000">
    <div class="row col-sm-12">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Antrian
                        @if (Auth::user()->role_id != 3 )
                                    
                        @else
                        <a href="/antrian-add" class="btn btn-info float-right p-1"><i class="fa-solid fa-plus"></i>
                            Antrian</a>
                        @endif

                        @if (Auth::user()->role_id != 2 )
                                
                        @else
                        {{-- <a href="/antrian-deleted-list" class="btn btn-warning float-right  mx-3 p-1"><i
                            class="fa-solid fa-eye"></i> Show Deleted</a> --}}
                        @endif

                </h5>
                <div class="card-body">
                    <h5 class="card-title">Ihsan Medical</h5>

                    <div class="my-3">
                        <form action="" method="get">
                            <div class="input-group flex-nowrap col-sm-5 px-0">
                                <input type="text" class="form-control" placeholder="Masukan nama" name="keyword">
                                <button class="input-group-text btn btn-primary"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>No. Antrian</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Antri</th>
                            <th>Waktu Antri</th>
                            <th>Poli</th>
                            <th>Status</th>
                            {{-- <th>Pegawai</th> --}}
                            
                            <th colspan="4">Action</th>
                        </tr>
                        @foreach ($pasienList as $pas)
                        <tr>
                            <td>
                                {{$pas->id}}
                            </td>
                            
                            <td>{{$pas->nama}}</td>
                            <td>{{$pas->tanggal_antri}}</td>
                            <td>{{$pas->waktu->waktu_antri}}</td>
                            <td>{{$pas->poli->nama_poli}}</td>
                            <td>
                            <label class="badge {{ ($pas->status == 1) ? 'badge-secondary' : (($pas->status == 2) ? 'badge-warning' : 'badge-success') }}">
                                {{ ($pas->status == 1) ? 'Belum diproses' : (($pas->status == 2) ? 'Sedang diproses dokter' : 'Selesai') }}
                              </label>
                            </td>
                            {{-- <td>{{$pas->pegawai->nama}}</td> --}}

                            <td style="width: 30px;">
                                {{-- Hak Akses Pasien --}}
                                @if (Auth::user()->role_id != 2 )
                                
                                @else
                                <a href="/antrian/{{$pas->id}}" class="btn btn-warning"><i
                                        class="fa-solid fa-circle-info"></i></a>
                                @endif


                            </td>
                            <td style="width: 30px;"> 
                                @if (Auth::user()->role_id != 2 )
                                
                                @else
                                <a href="/antrian-edit/{{$pas->id}}" class="btn btn-info"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                @endif
                            </td>
                            <td style="width: 30px;"> 
                                @if (Auth::user()->role_id != 2 )
                                
                                @else
                                {{-- <a href="/antrian-delete/{{$pas->id}}" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i></a> --}}
                                    <form style="display: inline-block" action="/antrian-destroy/{{$pas->id}}" method="POST" id="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                    </form>
                                @endif
                            </td>
                            <td style="width: 40px;" class="text-center">
                                @if (Auth::user()->role_id != 1 )
                                @elseif($pas->status != 2)
                                @else
                                <button class="btn btn-warning" onclick="panggilpasien('{{ $pas->nama }}')">Panggil Pasien</button>
                                    {{-- <button class="btn btn-warning" onclick="panggilpasien('{{ $pas->nama }}', '{{ $pas->status }}')">Panggil Pasien</button> --}}
                                @endif
            
                                @if (Auth::user()->role_id != 1 )
                                
                                @else
                                {{-- <a href="/selesai/{{$pas->id}}" class="btn btn-primary my-1">Selesai</a> --}}
                                <a href="#" class="btn btn-primary my-1" onclick="selesaikanPasien('{{ $pas->id }}', '{{ $pas->status }}')">Selesai</a>
                                @endif
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                    <div>
                        {{ $pasienList->firstItem() }}
                        {{ $pasienList->lastItem() }}
                    </div>
                    <div>
                        {{$pasienList->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    AOS.init();
</script>

{{-- selesaikan pasien --}}
<script>
    function selesaikanPasien(id, status) {
        if (status < 2 ) {
            Swal.fire({
                title: 'Peringatan',
                text: 'Pasien ini belum siap untuk diselesaikan!',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        } else if (status == 3) {
            Swal.fire({
                title: 'Apal Mereun !',
                text: 'Pasien ini sudah diselesaikan !',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        } else {
            Swal.fire({
                title: 'Selesaikan Pasien',
                text: 'Anda yakin ingin menyelesaikan pasien ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan tindakan yang diinginkan saat tombol "Ya" ditekan
                    // Misalnya, redirect ke halaman selesai dengan mengganti URL
                    window.location.href = "/selesai/" + id;
                }
            });
        }
    }
</script>


{{-- script panggilan --}}
<script>
    function panggilpasien(queueName) {
      if (queueName) {
        const msg = new SpeechSynthesisUtterance("Pasien dengan nama " + queueName + " silahkan masuk!");
        msg.lang = "id-ID";
        msg.rate = 0.8;
        window.speechSynthesis.speak(msg);
        document.getElementById("callButtonPasien").classList.add("calling-animation");
      }
    }
  </script>
  
<style>
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .calling-animation {
        animation-name: pulse;
        animation-duration: 1s;
        animation-iteration-count: infinite;
    }
</style>
{{-- script delete --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Mencegah pengiriman form secara langsung
        document.getElementById('delete-form').addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data dengan nama {{$pas->nama}} akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik "Ya, hapus!", submit form secara manual
                    event.target.submit();
                }
            });
        });
    </script>
  

  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
@endsection
