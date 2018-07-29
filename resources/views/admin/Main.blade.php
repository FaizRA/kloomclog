@section('title')
Welcome To Admin Page
@endsection
@extends('admin.menu')
@section('content')
      <!-- MAIN START -->
            <div class="container">
            <h1 align="center">WELCOME TO </br> KLOOM CLOGSHOP </br> ADMIN PAGE</h1>
            <h2 align="center">Apa yang anda ingin lakukan ?</h2>


                
            </h6></div><div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturpesanan">Lihat Pesanan</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturkategori">Lihat List Kategori</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturclog">Lihat List Model Produk</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturgambar">Lihat List Gambar Produk</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturwarna">Lihat List Warna Bahan</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturukuran">Lihat List Ukuran</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturadmin">Lihat Admin</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturongkir">Atur Ongkir</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturdiskon">Atur Diskon</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturlokasi">Atur Lokasi Pameran</a>
            </h6></div>
            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aturbanner">Atur Banner Toko</a>
            </h6></div>

            <div class="container"><h6 align="center">
            @if ($status > 0)
              <a class="waves-effect waves-light btn-large black" href="tutuptoko">Tutup Toko</a>
            @else
              <a class="waves-effect waves-light btn-large black" href="bukatoko">Buka Toko</a>
            @endif


            </h6></div>

            <div class="container"><h6 align="center">
            <a class="waves-effect waves-light btn-large black" href="aksilogout">Log Out</a>
            </h6></div>
            </div>
      <!-- MAIN END -->
@endsection
