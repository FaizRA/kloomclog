@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

<h2 align="center">Transaksi</h2>

<div class="row">
   <div class="input-field col s2"></div>
   <div class="input-field col s8">
     <h5>Nama   :: {{$pembelis->nama}}</h5></br>
     <h5>No. WA :: {{$pembelis->nowa}}</h5></br>
     <h5>Alamat :: {{$pembelis->alamat}}</h5></br>
     <h5>Keterangan :: {{$pembelis->keterangan}}</h5></br>

   </div>
   <div class="input-field col s2"></div>
</div>


<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Clog</th>
            <th>Warna</th>
            <th>Heel</th>
            <th>Ukuran</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Jumlah</th>

          </tr>
        </thead>

        <tbody>

            @foreach ($keranjangs as $clog)
            <tr>
              <td>{{$clog->clog}}</td>
              <td>{{$clog->warna}}</td>
              <td>{{$clog->heel}}</td>
              <td>{{$clog->ukuran}}</td>
              <td>IDR {{ number_format($clog->harga, 2) }}</td>
              <td>{{$clog->diskon}}</td>
              <td>{{$clog->jumlah}}</td>

            </tr>
            @endforeach




        </tbody>
      </table>
<h2 align="left">Ongkir ke {{$ongkirs->kota}} :: IDR {{ number_format($ongkirs->harga, 2) }}/Kg</h2>
<h2 align="left">Total ongkir :: IDR {{ number_format($ongkirh, 2) }}/Kg</h2>
<h2 align="left">Total :: IDR {{ number_format($total1, 2) }}</h2>
<h2 align="left">Total + Ongkir :: IDR {{ number_format($total2, 2) }}</h2>


<div class="row">
   <div class="input-field col s6">
     <div style="text-align:left">
     <a class="waves-effect waves-light black btn-large" href="editinformasipembeli">Edit Informasi</a>
     </div>
   </div>
   <div class="input-field col s6">
     <div style="text-align:right">
     <a class="waves-effect waves-light black btn-large" href="selesai">Kirimkan Form Pesanan</a>
     </div>
   </div>
</div>
</div>
@endsection
