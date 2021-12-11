<!DOCTYPE html>
<html>
    <head>
        <title>E-Ticket TAMI JAYA</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" style="margin-bottom: 100px"></div>
        <div class="container" style="padding-left: 150px">
            <h1 class="font-weight-light">e-NOTA</h1>
            <h4 class="font-weight-light" style="margin-bottom: 10px">Pemesanan Barongsai</h4>
            <table>
                @php
                    $x=0;
                @endphp
                        @foreach ($pesanan as $p )

                        {{-- @php
                            $x++;
                        @endphp
                        <tr><td>Penumpang {{ $x }}</code></td></tr> --}}
                        <tr><td>Id Pesanan : <code>{{ $p->id }}</code></td></tr>
                        <tr><td>Nama Penyewa: {{ $p->user->name }}</code></td></tr>
                        <tr><td>No Hp : {{ $p->user->no_tlp }}</code></td></tr>
                        <tr><td><hr></td></tr>
                        <tr><td>Tipe Perform : {{ $p->tipe->tipe_perform}}</td></tr>
                        <tr><td>Tgl Perform : {{ $p->tgl_perform}}</td></tr>
                        <tr><td>Alamat Perform : {{ $p->alamat }}</td></tr>
                        <tr><td><hr></td></tr>
                        @endforeach
                        <tr><td>Total Bayar : Rp. {{ number_format($p->tipe->harga_sewa) }},-</td></tr>
                        <tr><td>Status : {{ ($p->status) }}</td></tr>

             
            </table>
        </div>
    </body>
</html>
