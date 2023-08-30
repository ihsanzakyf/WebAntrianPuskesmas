@extends('layouts.main-layouts')

@section('title', 'Home')

@section('content')
<div data-aos="fade-up" data-aos-duration="1000">


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active tales">
            <img class="d-block w-100" src="{{asset('images/bg1.jpg')}}" alt="First slide" style="height: 700px;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kami berkomitmen untuk menyediakan perawatan medis berkualitas tinggi dengan teknologi canggih dan tim medis yang berpengalaman. Percayakan kesehatan Anda pada Rumah Sakit kami."</h5>
                <p>Ihsan Medical </p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 tales" src="{{asset('images/bg2.jpg')}}" alt="Second slide" style="height: 700px;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kami memberikan perhatian penuh pada kenyamanan dan pemulihan pasien. Staf kami yang ramah dan perawatan yang holistik akan membantu Anda kembali ke kehidupan yang sehat.</h5>
                <p>Ihsan Medical </p>
            </div>
        </div>

        <div class="carousel-item">
            <img class="d-block w-100 tales" src="{{asset('images/bg3.jpg')}}" alt="Third slide" style="height: 700px;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Layanan kami mencakup beragam spesialisasi medis, dari bedah hingga onkologi, dari kardiologi hingga kebidanan. Percayakan masalah kesehatan Anda pada para ahli kami.""</h5>
                <p>Ihsan Medical </p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="height: 700px;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="height: 700px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- bag2 -->
<hr class="featurette-divider" style="margin-top: 100px;">

<div class="container text-center mt-5">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-black" id="about">About Us</h1>
</div>

<div class="container marketing mt-5">

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 align-items-center">
            <h2 class="featurette-heading">Kesehatan. <span class="text-muted">By Ihsan Medical.</span></h2>
            <p class="lead">Kesehatan adalah investasi terbaik yang dapat Anda lakukan. Jadilah bagian dari program promosi kesehatan kami di Rumah Sakit Kami dan nikmati manfaat kesehatan jangka panjang. Kesehatan adalah kekayaan terbesar dalam hidup kita. Temukan perawatan berkualitas dan perhatian yang peduli di Rumah Sakit Kami. Kami percaya bahwa pencegahan adalah kunci utama untuk kesehatan yang baik. Dapatkan informasi, saran, dan layanan promosi kesehatan terbaik dari tim ahli kami di Rumah Sakit Kami. Mengutamakan kesehatan berarti mengambil tanggung jawab pribadi untuk menjaga dan meningkatkan kualitas hidup secara keseluruhan. Hal ini juga melibatkan kesadaran akan pentingnya pencegahan penyakit, pengelolaan stres, pemenuhan kebutuhan emosional, dan berpartisipasi dalam kegiatan yang mempromosikan kesehatan di masyarakat.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="https://source.unsplash.com/500x500?doctor" data-holder-rendered="true">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Obat. <span class="text-muted">Atur kendali dirimu dengan baik.</span></h2>
            <p class="lead">Kesehatan menggunakan obat mencakup penggunaan obat sebagai salah satu metode untuk menjaga atau memulihkan kesehatan seseorang. Obat digunakan dalam berbagai kondisi medis untuk mengobati penyakit, mengurangi gejala, atau mencegah penyakit tertentu.
                Dalam penggunaan obat untuk menjaga kesehatan, Penggunaan obat dalam konteks kesehatan harus didasarkan pada penilaian dan diagnosis yang tepat oleh tenaga medis yang berkualifikasi. Penting untuk mengikuti instruksi penggunaan obat yang diberikan oleh dokter atau apoteker, termasuk dosis yang tepat, jadwal pemberian, dan durasi penggunaan.

            </p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="https://source.unsplash.com/500x500?medicine" data-holder-rendered="true" style="width: 500px; height: 500px;">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Cepat & Sigap <span class="text-muted">Prioritas Kami.</span></h2>
            <p class="lead">Kecepatan dalam menjemput pasien merupakan faktor penting dalam pelayanan rumah sakit yang efisien dan responsif. Ketika seorang pasien membutuhkan transportasi menuju rumah sakit, kecepatan dalam menjemput dapat mempengaruhi waktu respons dan aksesibilitas terhadap perawatan yang diperlukan. Tim pelayanan rumah sakit yang bertanggung jawab untuk menjemput pasien harus memiliki sistem yang tanggap terhadap panggilan atau permintaan bantuan. Dalam situasi darurat, waktu respons yang cepat sangat penting untuk memastikan pasien mendapatkan pertolongan segera. Proses koordinasi dan pengaturan transportasi harus dilakukan dengan efisien. Informasi yang diperlukan tentang pasien dan lokasi harus dikumpulkan dengan cepat dan akurat untuk meminimalkan waktu tunggu dan memaksimalkan efisiensi dalam menjemput pasien.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="https://source.unsplash.com/500x500?ambulance" data-holder-rendered="true" style="width: 500px; height: 500px;">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

    <footer class="container my-5">
        <p class="float-right"><a href="#">Back to top</a></p>
        <?php echo " © " . (int)date('Y') . " Ihsan Zaky Fadillah"; ?>
    </footer>

    <div class="container">
        <h2 class="text-white">spasi</h2>
    </div>

</div>
</div>
<script>
    AOS.init();
</script>
  
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

@endsection