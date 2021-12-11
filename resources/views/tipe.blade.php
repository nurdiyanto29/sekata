@extends('layouts/appUser')
@section('content')
  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="">Home</a>
                <a href="">Halaman Sewa</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

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
                        <h2>Tipe : {{ $d['tipe_perform']}}</h2>
                        <h2>Harga Sewa : {{ $d['harga_sewa']}}</h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->



 @endsection