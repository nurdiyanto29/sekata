@extends('layouts/appUser')
@section('content')
  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="">Home</a>
                <a href="">Jadwal Perform</a>
            </div>
        </div>
    </div>
</div>
<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <p>Jadwal Perform</p>
            <h2>Sekata Barongsai</h2>
        </div>
        <div class="row">
            @foreach ($data as $d)
            @if ($d['tgl_perform'] >= date("Y-m-d", strtotime('today')) && $d['status'] == 'Sudah Bayar (Terkonfirmasi)' )
            <div class="col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="{{asset('tipe/'.$d['tipe']['cover'])}}" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">{{ $d['tipe']['tipe_perform']}}</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-calendar-alt"></i>{{ $d['tgl_perform']}}</p>
                        </div>
                        <div class="blog-text">
                            <p>
                               Pada Tanggal {{ $d['tgl_perform']}} Sekata Barongsai akan melakukan perform di {{ $d['alamat']}} mulai pada pukul {{ $d['jam']}} - Selesai dalam acara {{ $d['acara']}}. Pada perform kali ini akan menampilkan barongsai dengan jenis Perform {{ $d['tipe']['tipe_perform']}}.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            @endif
       @endforeach
        </div>
    </div>
</div>
@endsection
