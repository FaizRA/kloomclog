@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

<h2 align="center">Keranjang</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Clog</th>
            <th>Warna</th>
            <th>Heel</th>
            <th>Ukuran</th>
            <th>Diskon</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>

          </tr>
        </thead>

        <tbody>

            @foreach ($keranjangs as $clog)
            <tr>
              <td>{{$clog->clog}}</td>
              <td>{{$clog->warna}}</td>
              <td>{{$clog->heel}}</td>
              <td>{{$clog->ukuran}}</td>
              <td>{{$clog->diskon}}%</td>
              <td>IDR {{ number_format($clog->harga, 2) }}</td>
              <td>{{$clog->jumlah}}</td>
              <td>
                <!--EDIT-->
                <!--DELETE-->
                <form action="hapuskeranjang/{{$clog->id}}" method="post">
                <input type="submit" class ="btn waves-effect waves-light black" name="Submit" value="delete">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                </form>
              </td>
            </tr>
            @endforeach




        </tbody>
      </table>
<h2 align="right">Total :: IDR {{ number_format($total1, 2) }}</h2>


<div class="row">
   <div class="input-field col s6">
     <div style="text-align:left">
     <a class="waves-effect waves-light black btn-large" href="home">Tambah Clog</a>
     </div>
   </div>
   <div class="input-field col s6">
     <div style="text-align:right">
     <a class="waves-effect waves-light black btn-large" href="tambahpembeli">Isi Informasi Pembeli</a>
     </div>
   </div>
</div>
</div>
@endsection
