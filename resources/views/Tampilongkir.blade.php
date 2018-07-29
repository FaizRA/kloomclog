@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

<h2 align="center">Daftar Ongkir</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>

            <th>Ukuran</th>
            <th>Keterangan</th>


          </tr>
        </thead>

        <tbody>

            @foreach ($ongkirs as $ongkir)
            <tr>

              <td>{{$ongkir->kota}}</td>
              <td>IDR {{ number_format($ongkir->harga, 2) }}</td>

            </tr>
            @endforeach




        </tbody>
      </table>




</div>
@endsection
