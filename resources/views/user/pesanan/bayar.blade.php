<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sekata Barongsai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pembayaran</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            @foreach ($pesanan as $p )
            <div class="col-12 col-sm-6">
          
              <div class="col-12">
                <img src="../../dist/img/tf.jpg" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <form method="POST" action="{{ route('pembayaran.store') }} "  enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                        <select id="jadwal_id" type="text" class="form-control" name="jadwal_id">
                            <option value={{ $p->id}}>ID SEWA :{{ $p->id}}</option>
                        </select>
                </div>
             <h5 class= "my-3">Pemesan        :{{ $p->user->name}}</h5>
             <h5 class= "my-3">Tanggal Perform:{{ $p->tgl_perform}}</h5>
             <h5 class= "my-3">Alamat Perform :{{ $p->alamat}}</h5>
             <h5 class= "my-3">No Tlp :{{ $p->hp}}</h5>
             <h5 class= "my-3">Tipe Perform   :{{ $p->tipe->tipe_perform}}</h5>
              <hr>
              <div class="bg-red py-2 px-3 mt-4">
                <h5 class="mb-0">
                  <b>Silahkan Lakukan Transfer Pada No Rek :  123473637</b>
                  <b>Atas Nama : Sekata Madiun</b>
                </h5>
              </div>
              <hr>
              
             {{-- <p style="color:rgb(255, 38, 0);"></p> 
              <H4 style="color:rgb(255, 38, 0);"><b>Silahkan Lakukan Transfer Pada Rekening</b></H4>
              <H3>An:Sekata Madiun</H3> --}}
              <div class="form-group row">
                <label for="bukti_bayar" class="col-sm-2 col-form-label">Upload Bukti Bayar</label>
                <div class="col-sm-10">
                    <input type="file" name="bukti_bayar" class="form-control" id="bukti_bayar" >
                </div>
            </div>
            <hr>
            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0">
               
               Total Bayar : {{"Rp.".number_format( $p->tipe->harga_sewa,2,',','.')}}
              </h2>
            </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            @endforeach
          </div>
  
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
