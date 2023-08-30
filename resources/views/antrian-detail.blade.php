@extends('layouts.main-layouts')

@section('title', 'Antrian - Detail')

@section('content')

<div class="container-fluid mt-5">
    <div class="card">
        <h5 class="card-header">Detail Pasien
            @if (Auth::user()->role_id != 2 )

            @else
            <a href="#" class="btn btn-primary float-right mx-3" onclick="prosesPasien()">Proses</a>

            @endif

            

        </h5>
            <div class="card-body">
                <h5 class="card-title">Selamat Datang, anda sedang melihat halaman detail, {{ $pas->nama }}</h5>
                <table class="table table-bordered text-center">
                    <tr>
                        <th>Nomor Antrian</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Tanggal Antri</th>
                        <th>Waktu</th>
                        <th>Poli</th>
                        <th>Pegawai</th>
                    </tr>
                    <tr>
                        <td>{{ $pas->id }}</td>
                        <td>{{ $pas->nama }}</td>
                        <td>{{ $pas->tanggal_lahir }}</td>
                        <td>{{ $pas->alamat }}</td>
                        <td>{{ $pas->nomor_telepon }}</td>
                        <td>{{ $pas->tanggal_antri }}</td>
                        <td>{{ $pas->waktu->waktu_antri }}</td>
                        <td>{{ $pas->poli->nama_poli }}</td>
                        <td>{{ $pas->pegawai->nama }}</td>
                    </tr>
                </table>
                {{-- @if ($pas->status == 1) --}}
                <a id="callButton" class="btn btn-warning float-right" style="width: 17rem">Panggil Antrian</a>
                {{-- @endif --}}
                <a href="/antrian" class="btn btn-info float-right mx-3" style="width: 17rem">Kembali</a>
                
            </div>
    </div>
</div>

<script>
    function prosesPasien() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin memproses pasien?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan tindakan yang diinginkan saat tombol "Ya" ditekan
                // Misalnya, redirect ke halaman proses dengan mengganti URL
                window.location.href = "/status/{{$pas->id}}";
            }
        });
    }
</script>


<script>

    function callQueueNumber() {
        const queueAntri = "{{ $pas->id }}";
        const queuePoli = "{{ $pas->poli->nama_poli }}";
        const queueName = "{{ $pas->nama }}";
        const queuePegawai= "{{ $pas->pegawai->nama }}";
        const msg = new SpeechSynthesisUtterance("Pendaftaran poli" + queuePoli + "Nomor antrian " + queueAntri + " dengan nama " + queueName + " silahkan datang keloket " + queuePegawai); 
        msg.lang = "id-ID";
        msg.rate = 0.7; 
        window.speechSynthesis.speak(msg); 
        
        document.getElementById("callButton").classList.add("calling-animation");
    }

    function repeatCallQueueNumber(times, interval) {
        let counter = 0;
        const intervalId = setInterval(function() {
            callQueueNumber(); 
            counter++;
            if (counter === times) {
                clearInterval(intervalId);
            }
        }, interval);
    }

    document.getElementById("callButton").addEventListener("click", function() {
        repeatCallQueueNumber(3, 1000); 
    });
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



@endsection