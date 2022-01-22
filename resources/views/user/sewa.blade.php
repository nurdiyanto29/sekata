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
                        <p>
                            {{$data['deskripsi']}}
                        </p>
                        <hr>
                        <table class="table table-dark">
                            <h4>Jadwal Perform</h4>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Lokasi</th>
                                </tr>
                            </thead>
                          
                            @php
                            $i=1;
                            $x=1;
                        @endphp
                            @foreach ($kalender as $item)
                            @if ($item['tgl_perform'] >= date("Y-m-d", strtotime('today')) && $item['status'] == 'Sudah Bayar (Terkonfirmasi)' )
                            <tbody>
                              <tr>
                                  <th scope="row">{{$i++}}</th>
                                  <td>{{ $item['tgl_perform']}}</td>
                                  <td>{{ $item['jam']}}</td>
                                  <td>{{ $item['alamat']}}</td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>
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
                        {{-- <div class="form-group">
                            <label for="hp">No Tlp</label>
                            <input type="number" class="form-control" name="hp" id="hp">
                          </div> --}}
                        <div class="form-group">
                          <label for="tgl_perform">Tanggal Perform</label>
                          <input type="date" class="form-control" name="tgl_perform" id="tgl_perform" min="{{ date("Y-m-d", strtotime('+7 day'))}}">
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
                            <label for="hp">No Tlp</label>
                            <input type="number" class="form-control" name="hp" id="hp">
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