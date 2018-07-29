@section('title')
Model Clog
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Pesanan</h2>
<div class="container">


  <div class="card-panel black">
          <form action="aksicaripesanan" method="post">
            Cari Pesanan Yang Baru Masuk
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






</div>
@endsection
