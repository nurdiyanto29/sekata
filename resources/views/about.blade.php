@extends('layouts/appUser')
@section('content')
  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="">Home</a>
                <a href="">Tentang Kami</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="img/slider6.png" alt="Image">
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
                            simbal dan 1 kenong yang bertahan sampai dengan 8 tahun lamanya, a, akan tetapi
                            sejak tahun 2017 awal sekata barongsai sudah melakukan perombakan terhadap
                            Barongsai, Liong, maupun alat musik. dan sekarang mempunyai 6 Barongsai
                            yaitu berwarna Merah, Kuning, Hitam, Hijau, Biru , dan Pink. Biasanya Sekata
                            barongsai disewa untuk memeriahkan suatu acara seperti, grand opening sebuah
                            toko, pernikahan, ulang tahun, dan terutama perayakan tahun baru imlek.
                            
                        </p>
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

 @endsection