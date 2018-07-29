@section('title')
Model Clog
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Lihat Pesanan</h2>

<div class="container">


  <div class="card-panel black">
          <form action="aksicaripesanan" method="post">
            Cari Pesanan
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="search" v-model='search' name="session">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($pesanans as $pesanan)
                  <option value="{{$pesanan->session}}">{{$pesanan->nama}} | {{$pesanan->total}}</option>
                  @endforeach

                </select>
                <label>Cari info pemesan</label>
              </div>
              <input type="submit" name="Submit" value="Cari">
              </div>
                   {{ csrf_field() }}
                   <input type="hidden" name="_method" value="PUT">
                 </form>

  </div>

  <div class="card-panel black">
          <form action="aksicaripesanan" method="post">
            Cari Pesanan Yang Sedang Di Proses
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="search" v-model='search' name="session">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($pesanans1 as $pesanan)
                  <option value="{{$pesanan->session}}">{{$pesanan->nama}} | {{$pesanan->total}}</option>
                  @endforeach

                </select>
                <label>Cari info pemesan</label>
              </div>
              <input type="submit" name="Submit" value="Cari">
              </div>
                   {{ csrf_field() }}
                   <input type="hidden" name="_method" value="PUT">
                 </form>
                 @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
  </div>

  <div class="card-panel black">
          <form action="aksicaripesanan" method="post">
            Cari Pesanan Yang Sudah Dikirim
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="search" v-model='search' name="session">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($pesanans2 as $pesanan)
                  <option value="{{$pesanan->session}}">{{$pesanan->nama}} | {{$pesanan->total}}</option>
                  @endforeach

                </select>
                <label>Cari info pemesan</label>
              </div>
              <input type="submit" name="Submit" value="Cari">
              </div>
                   {{ csrf_field() }}
                   <input type="hidden" name="_method" value="PUT">
                 </form>
                 @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
  </div>



  <div class="row">
     <div class="input-field col s2"></div>
     <div class="input-field col s4">
       <h3>From :</h3></br>
       <h3>Nama   :: KLOOM</h3></br>
       <h3>No. hp :: 08989019089</h3></br>
       <h3>Alamat :: Jl. Lembata 3 Blok Sb No.12B, Rw. Mekar Jaya, Serpong, Kota Tangerang Selatan, Banten 15310</h3></br>

     </div>
     <div class="input-field col s4">
       <h3>To :</h3></br>
       <h3>Nama   :: {{$pesanan2->nama}}</h3></br>
       <h3>No. hp :: 0{{$pesanan2->nowa}}</h3></br>
       <h3>Alamat :: {{$pesanan2->alamat}}</h3></br></br></br>
       <h3>Keterangan :: {{$pesanan2->keterangan}}</h3></br>

     </div>
     <div class="input-field col s2"></div>
  </div>


  <div class="container">


<h3 align="center">Keterangan :: {{$pesanan2->session}} {{$pesanan2->status}}</h3></br>
@if ($pesanan2->status === '1')
  <h3 align="center">Pesanan Baru Diterima</h3></br>
  <h3 align="center"><a href="prosespesanan/{{$pesanan2->id}}">PROSES</a></h3></br>
@elseif ($pesanan2->status === '2' )
  <h3 align="center">Pesanan Sedang Diproses</h3></br>
  <h3 align="center"><a href="kirimpesanan/{{$pesanan2->id}}">KIRIM</a></h3></br>
@elseif ($pesanan2->status === '3')
  <h3 align="center">Pesanan Sudah Dikirim</h3></br>
  <h3 align="center"><a href="hapuspesanan/{{$pesanan2->id}}">HAPUS</a></h3></br>
@endif


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
                <td>{{$clog->harga}}</td>
                <td>{{$clog->diskon}}</td>
                <td>{{$clog->jumlah}}</td>

              </tr>
              @endforeach




          </tbody>
        </table>

  <h2 align="left">Total + Ongkir :: {{ number_format($pesanan2->total, 2) }}</h2>







</div>
@endsection
