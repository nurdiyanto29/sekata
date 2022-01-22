
@extends('layouts/app2')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @if ($data['jadwal']['status'] == 'menunggu_konfirmasi')
            <div class="callout callout-info">

                <h5><i class="fas fa-info"></i> Note:</h5>
                Segera konfirmasi status bayar
            </div>
            @endif


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> ID PESANAN : {{$data['id']}}.
                  
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Detail Pesanan
                  <address>
                    <strong>Tanggal Perform {{$data['jadwal']['tgl_perform']}}</strong><br>
                    Jam {{$data['jadwal']['jam']}}<br>
                    ALamat Perform {{$data['jadwal']['alamat']}}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Bukti Bayar</b><br>
                    <br>
                    <b><img src="{{asset('pembayaran/'.$data['bukti_bayar'])}}" height="150px" alt=""></b> <br>
                 </div>
                <div class="col-sm-4 invoice-col">
                  Status Bayar
                  <br>  
                  <address>
                    <strong>{{$data['jadwal']['status']}}</strong><br>
                    @if ($data['jadwal']['status'] == 'menunggu_konfirmasi')
                    <a href="{{ route('konfirmasi', $data['jadwal']['id'])}}" type="submit" class="btn btn-sm btn-primary" >Konfirmasi Pembayaran</a></td>
                    @endif
                  </address>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  @endsection