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
                                  <h3 class="card-title">Tambah Jadwal</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{route('jadwal.update',$jadwal['id'])}}"  enctype="multipart/form-data">
                                    <div class="card-body">
                                      @csrf
                                      @method('PUT')
                                    <div class="form-group">
                                      <label for="tgl_perform">Tanggal Perform</label>
                                      <input type="date" class="form-control" name="tgl_perform" id="tgl_perform" value="{{ $jadwal['tgl_perform'] }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="alamat">Alamat</label>
                                      <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $jadwal['alamat'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_id">Tipe Perform</label>
                                        <div class="col-md-12">
                                            <select id="tipe_id" type="text" class="form-control" name="tipe_id">
                                                @foreach ($tipe as $b)
                                                <option value={{ $b['id']}}>{{ $b['tipe_perform']}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">Penyewa</label>
                                        <div class="col-md-12">
                                            <select id="user_id" type="text" class="form-control" name="user_id">
                                                @foreach ($user as $u)
                                                <option value={{ $u['id']}}>{{ $u['name']}}</option>
                                                @endforeach
                                            </select>
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