@extends('layouts/app2')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kelola Data Jadwal</h3>
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
                                  <h3 class="card-title">Tambah Data Sewa</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{ route('sewa.store') }} "  enctype="multipart/form-data">
                                    <div class="card-body">
                                      @csrf
                                    <div class="form-group">
                                      <label for="tgl_perform">Tanggal Perform</label>
                                      <input type="date" class="form-control" name="tgl_perform" id="tgl_perform">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_id">Tipe Perform</label>
                                        <div class="col-md-12">
                                            <select id="tipe_id" type="text" class="form-control" name="tipe_id">
                                                @foreach ($tipe as $b)
                                                <option value={{ $b->id}}>{{ $b->tipe_perform}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_id">Penyewa</label>
                                        <div class="col-md-12">
                                            <select id="tipe_id" type="text" class="form-control" name="tipe_id">
                                                @foreach ($user as $u)
                                                <option value={{ $u->id}}>{{ $u->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                    {{-- <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputFile">File input</label>
                                      <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="exampleInputFile">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="">Upload</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> --}}
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

  {{-- @endsection --}}