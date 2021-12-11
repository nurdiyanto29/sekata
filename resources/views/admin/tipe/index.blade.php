@extends('layouts/app2')
@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kelola Data Tipe Perform</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tipe Perform</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <a class="btn btn-success" href="{{ route('register')}}"> +Tambah User </a> --}}
                        <a class="btn btn-outline-primary" href="{{ route('tipe.create')}}" style="width: 200px" >Tambah Tipe</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Perform</th>
                                    <th>Harga Sewa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @php
                                $i=1;
                                $x=1;
                            @endphp
                             @foreach ($tipe as $t) 
                                <tr>
                                    <td><b>{{$i++}}<b></td>
                                        <td>{{$t['tipe_perform']}}</td>
                                        <td>{{$t['harga_sewa']}}</td>
                                   
                                    <td>
                                        <form action="{{ route('tipe.delete', $t['id'])}}" method="post">
                                        <a class="btn btn-sm btn-warning" href="{{ route('tipe.edit', $t['id'])}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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