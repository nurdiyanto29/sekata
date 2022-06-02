@extends('layouts/appUser')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css')}}">
<style>

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



  <div class="food mt-0">
            <div class="container">
                <div class="row align-items-center">
                     @foreach ($pesanan as $p)
                    <div class="col-md-4">
                        <div class="food-item">
                            <i class="fas fa-ticket-alt"></i>
                            <h2>{{ $p['tipe']['tipe_perform']}}</h2>
                            <p>
                               Pesanan Pada tanggal {{ Carbon\Carbon::parse($p['created_at'] )->isoFormat('D MMM Y')}}, dengan tanggal perform pementasan barongsai pada {{ Carbon\Carbon::parse($p['tgl_perform'] )->isoFormat('D MMM Y')}}  dengan alamat perform di {{ $p['alamat'] }}
                            </p>
                             @if ($p['status'] == 'Sudah Bayar (Terkonfirmasi)')
                            <a href="">Cetak e-Tiket</a>
                             @else
                             <p style="color:orange">Pesanan anda belum di konfirmasi oleh admin. Silahkan tunggu</>
                             @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
<!-
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
