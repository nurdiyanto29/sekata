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
                            <h3 class="card-title">Tambah Jadwal</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('jadwal.store') }} " enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    {{-- date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d")))) --}}
                                    <label for="tgl_perform">Tanggal Perform</label>
                                    <input type="date" class="form-control" name="tgl_perform"
                                        min="{{ date('Y-m-d', strtotime('+3 day', strtotime(date('Y-m-d')))) }}"
                                        id="tgl_perform">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_perform">Alamat Perform</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                                <div class="form-group">
                                    {{-- date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d")))) --}}
                                    <label for="jam">jam</label>
                                    <input type="time" class="form-control" name="jam" id="jam">
                                </div>
                                <div class="form-group">
                                    <label for="acara">acara</label>
                                    <input type="text" class="form-control" name="acara" id="acara">
                                </div>

                                <div class="form-group">
                                    <label for="tipe_id">Penyewa</label>
                                    <div class="col-md-12">
                                        <select id="user_id" type="text" class="form-control" name="user_id">
                                            @foreach ($user as $u)
                                                {{-- {{ $b['id']['tipe_perform']}} --}}
                                                <option value={{ $u->id }}>{{ $u->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hp">No Tlp</label>
                                    <input type="number" class="form-control" name="hp" id="hp">
                                </div>
                                <div class="form-group">
                                    <label for="tipe_id">Tipe Perform</label>
                                    <div class="col-md-12">
                                        <select id="tipe_id" type="text" class="form-control" name="tipe_id">
                                            @foreach ($tipe as $b)
                                                {{-- {{ $b['id']['tipe_perform']}} --}}
                                                <option value={{ $b['id'] }}>{{ $b['tipe_perform'] }}</option>
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
@endsection
