@extends('layouts/app2')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Jadwal</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                              <!-- general form elements -->
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Edit Tipe Perform</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{route('tipe.update',$tipe['id'])}}"  enctype="multipart/form-data">
                                    <div class="card-body">
                                      @csrf
                                      @method('PUT')
                                    <div class="form-group">
                                      <label for="tipe_perform">Tipe Perform</label>
                                      <input type="text" class="form-control" name="tipe_perform" id="tipe_perform" value="{{ $tipe['tipe_perform'] }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="harga_sewa">Harga Sewa</label>
                                      <input type="number" class="form-control" name="harga_sewa" id="harga_sewa" value="{{ $tipe['harga_sewa'] }}">
                                    </div>
                                      <div class="form-group">
                                        <label for = "cover" class="control-label col-md-12 col-sm-12 col-xs-12">Cover</label><br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <img src="{{asset('tipe/'.$tipe['cover'])}}" width='80' height='60'/>
                                          <input type="file" id="cover" name="cover" value="{{ $tipe['cover'] }}">
                                          <p>Kosongkan apabila tidak ingin merubah cover</p>
                                        </div>
                                      </div><br>

                                    {{-- <div class="form-group row">
                                      <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                                      <div class="col-sm-10">
                                          <input type="file" name="cover" class="form-control" id="cover" ><?php echo $tipe['cover'] ?>
                                      </div>
                                  </div> --}}
                                        <!-- textarea -->
                                        <div class="form-group">
                                          <label for="deskripsi">Keterangan</label>
                                          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"><?php echo $tipe['deskripsi'] ?></textarea>

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

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    </div>

  @endsection
