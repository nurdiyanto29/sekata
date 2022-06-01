@extends('layouts/appUser')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css')}}">
<style>
    body {
  position: absolute;
    color: #757575;
    background: #ffffff;
    font-family: 'open sans', sans-serif;
    min-width: fit-content;
}
</style>
@endpush
@section('content')
  <!-- Page Header Start -->
  <div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="">Halaman Pesananmu</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Perform</th>
                                        <th>Tipe Perform</th>
                                        <th>Alamat Perform</th>
                                        <th>Status Pesanan</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $i=1;
                                    $x=1;
                                @endphp
                                 @foreach ($pesanan as $p)
                                    <tr>
                                        <td><b>{{$i++}}<b></td>
                                        <td>{{ $p['tgl_perform'] }}</td>
                                        <td>{{ $p['tipe']['tipe_perform']}}</td>
                                        <td>{{ $p['alamat'] }}</td>
                                        <td>{{ $p['status'] }}</td>
                                        <td>
                                            @if ($p['status'] == 'Sudah Bayar (Terkonfirmasi)')
                                            <a href="{{ route('pdf', $p['id'])}}" type="submit" class="btn btn-sm btn-primary" >e-nota</a></td>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

 @endsection

 @push('js')

<script type="text/javascript" charset="utf8" src="{{asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js')}}"></script>
 <script>
    $(function() {

           $("#example1").DataTable({
               "responsive": true,
               "autoWidth": false,
           });
           $('#example2').DataTable({
               "paging": true,
               "lengthChange": true,
               "searching": false,
               "ordering": true,
               "info": true,
               "autoWidth": false,
               "responsive": true,
           });
           });

   </script>
 @endpush
