@extends('layouts/appUser')
@section('content')
  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="">Home</a>
                <a href="">Sewa</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Booking Start -->
<div class="booking">
    <div class="container">
        <div class="row align-items-top">
            <div class="col-lg-7">
                <div class="booking-content">
                    <div class="section-header">
                        <p>Halaman Sewa</p>
                        <h2>Tipe :  {{$data['tipe_perform']}}</h2>
                    </div>
                    <div class="about-text">
                        <h4>
                            {{$data['deskripsi']}}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="booking-form">
                    <form method="POST" action="{{ route('home.store')}} "  enctype="multipart/form-data">
                        <div class="card-body">
                          @csrf
                          @if(session('errors'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Something it's wrong:
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                              <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                              </ul>
                          </div>
                      @endif
                          <div class="form-group">
                            <label for="tipe_id">Penyewa</label>
                                <select id="user_id" type="text" class="form-control" name="user_id">
                                    {{-- @foreach ($user as $u) --}}
                                    {{-- {{ $b['id']['tipe_perform']}} --}}
                                    <option value={{ Auth::user()->id }}>{{ Auth::user()->name }}</option>
                                    {{-- @endforeach --}}
                                </select>
                        </div>
                        <div class="form-group">
                          <label for="tgl_perform">Tanggal Perform</label>
                          <input type="date" class="form-control" name="tgl_perform" id="tgl_perform">
                        </div>
                        <div class="form-group">
                            <label for="jam">jam</label>
                            <input type="time" class="form-control" name="jam" id="jam">
                          </div>
                          <div class="form-group">
                            <label for="acara">acara</label>
                            <input type="text" class="form-control" name="acara" id="acara">
                          </div>
                        <div class="form-group">
                          <label for="tgl_perform">Alamat Perform</label>
                          <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                        <div class="form-group">
                            <label for="tipe_id">Tipe Perform</label>
                                <select id="tipe_id" type="text" class="form-control" name="tipe_id">
                                    {{-- @foreach ($tipe as $b) --}}
                                    {{-- {{ $b['id']['tipe_perform']}} --}}
                                    <option value={{ $data['id']}}>{{ $data['tipe_perform']}}</option>
                                    {{-- @endforeach --}}
                                </select>
                        </div>
                      </div>
                      <!-- /.card-body -->
        
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->

 @endsection