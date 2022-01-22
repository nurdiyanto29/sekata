@extends('layouts/appUser')
@section('content')
<!-- Carousel Start -->
<div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="img/back.jpg" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Sekata.<span>Barongsai</span></h1>
                    <p>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Carousel End -->



<!-- About Start -->
<div class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="img/sekata.jpg" alt="Image">
                    <button type="button" class="btn-play" data-toggle="modal" data-src="{{asset('https://www.youtube.com/embed/wUZ8DxABFHA')}}" data-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-header">
                        <p>Tentang Kami</p>
                        <h2>Profile Sekata Barongsai</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            Sekata barongsai adalah salah satu grup barongsai yang ada dikota madiun.
                            “Sekata Barongsai” berdiri sejak tahun 2009 tepatnya dibulan januari sebelum
                            perayaan imlek . Sekata barongsai berlokasikan dijalan bali 60, Madiun.
                        </p>
                        <p>
                            Terbentuknya Sekata Barongsai dari awal sudah mempunyai kurang lebih 5
                            barongsai dan 1 Liong atau naga, dan alat musiknya nya yang berisi 1 tambur, 4
                            simbal dan 1 kenong yang bertahan sampai dengan 8 tahun lamanya
                        </p>
                        <a class="btn custom-btn" href="{{route('about')}}">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Video Modal Start-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->



<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
            <p>Sewa Disini</p>
            <h2>Tipe Perform</h2>
        </div>

        <div class="row">
            @foreach ($data as $d)
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img class="team-img" width="200" height="200"
                        style="border-radius:10%" src="{{asset('tipe/'.$d['cover'])}}" alt="Bear">
                        <div class="team-social">
                            <a href="{{ route('user.sewa', $d['id'])}}"><i class="fas fa-cart-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h5><strong>{{ $d['tipe_perform']}}</strong></h5>

                        <h5>Harga Sewa {{"Rp.".number_format( $d['harga_sewa'],2,',','.')}}</h5>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->




<!-- Contact Start -->
<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <p>Kontak Kami</p>
            {{-- <h2>Untuk Segala Bentuk Pertanyaan Tentang Sekata Barongsai</h2> --}}
        </div>
        <div class="row align-items-center contact-information">
            <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Alamat</h3>
                        <p>Jl bali 60 Madiun</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-phone-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Tlp</h3>
                        <p>08562569695</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Email Kami</h3>
                        <p>sekatamadiun@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-share"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Follow Us</h3>
                        <div class="contact-social">
                            <a href="https://www.youtube.com/channel/UC0QWAGYQgObUX2VcZoluFjQ"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.instagram.com/sekata.barongsai/"><i class="fab fa-instagram"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contact-form">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21421.43846066159!2d111.49609747278134!3d-7.632770372521877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bef6427ad945%3A0x4bf5e62a76e37464!2sJl.%20Bali%20No.60%2C%20Kartoharjo%2C%20Kec.%20Kartoharjo%2C%20Kota%20Madiun%2C%20Jawa%20Timur%2063117!5e0!3m2!1sid!2sid!4v1640351086596!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
    </div>
</div>
<!-- Contact End -->

 @endsection
