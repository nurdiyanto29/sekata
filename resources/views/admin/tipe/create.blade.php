@extends('layouts/app2')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Tipe Perform</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('tipe.store') }} " enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="tipe_perform">Tipe Perform</label>
                                    <input type="text" class="form-control" name="tipe_perform" id="tipe_perform">
                                </div>
                                <div class="form-group">
                                    <label for="harga_sewa">Harga Sewa</label>
                                    <input type="number" class="form-control" name="harga_sewa" id="harga_sewa">
                                </div>
                                <div class="form-group row">
                                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="cover" class="form-control" id="cover">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection
