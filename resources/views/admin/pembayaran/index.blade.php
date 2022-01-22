@extends('layouts/app2')
@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kelola Pembayaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>NO Hp</th>
                                    <th>Tanggal Perform</th>
                                    <th>Bukti Bayar</th>
                                    <th>Status Pesanan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $i=1;
                                $x=1;
                                @endphp
                                @foreach ($data as $s)
                                <tr>
                                    <td><b>{{$i++}}<b></td>
                                    <td>{{$s['jadwal']['id']}}</td>
                                    <td>{{$s['jadwal']['hp']}}</td>
                                    <td>{{$s['jadwal']['tgl_perform']}}</td>
                                    <td><img src="{{asset('pembayaran/'.$s['bukti_bayar'])}}" height="100px" width="100px" alt=""></td>
                                    <td>{{$s['jadwal']['status']}}</td>
                                        <td>
                                            <form action="{{ route('pembayaran.delete', $s['id'])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <a class="btn btn-sm btn-warning" href="{{ route('show', $s['id'])}}"><i class="fas fa-eye"></i></a> --}}
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                @if ($s['jadwal']['status'] == 'menunggu_konfirmasi')
                                                <a href="{{ route('konfirmasi', $s['jadwal']['id'])}}" type="submit" class="btn btn-sm btn-primary" ><i class="fas fa-check-circle"></i></a></td>
                                                @endif
                                            </form>
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
</div>
   <!-- jQuery -->
   <script src="../../plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- DataTables -->
   <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <!-- AdminLTE App -->
   <script src="../../dist/js/adminlte.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="../../dist/js/demo.js"></script>
   <!-- page script -->
   <script>
       $(function() {
           $("#example1").DataTable({
               "responsive": true,
               "autoWidth": false,
           });
           $('#example2').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": false,
               "ordering": true,
               "info": true,
               "autoWidth": false,
               "responsive": true,
           });
       });
   </script>
  @endsection
