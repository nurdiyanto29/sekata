@extends('layouts/appUser')
@section('content')
<!-- Carousel Start -->
<div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="img/slider5.jpg" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Sekata.<span>Barongsai</span></h1>
                    <p>

                    </p>
                    {{-- <div class="carousel-btn">
                        <a class="btn custom-btn" href="">View Menu</a>
                    </div> --}}
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
                            simbal dan 1 kenong yang bertahan sampai dengan 8 tahun lamanya
                        </p>
                        <a class="btn custom-btn" href="">Baca Selengkapnya</a>
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
            <div class="col-lg-4 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset('tipe/'.$d['cover'])}}" alt="Image">
                        <div class="team-social">
                            <a href="{{ route('user.sewa', $d['id'])}}"><i class="fas fa-cart-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h2>{{ $d['tipe_perform']}}</h2>
                        {{-- {{"Rp.".number_format($p->keluar,2,',','.')}} --}}
                        <h2>Harga Sewa {{"Rp.".number_format( $d['harga_sewa'],2,',','.')}}</h2>
                        {{-- <h2>Harga Sewa : {{ $d['harga_sewa']}}</h2> --}}
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
                        <p>Jl Madiun</p>
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
                        <p>0899999999</p>
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
                        <p>info@example.com</p>
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
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row contact-form">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31637.369993588167!2d111.52925234507285!3d-7.610706459668357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bf29216d8c59%3A0x22f7d627aa54443d!2sTerminal%20Purbaya%20Madiun!5e0!3m2!1sid!2sid!4v1637811573189!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1600663868074!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
            </div>
            <div class="col-md-6">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

 @endsection