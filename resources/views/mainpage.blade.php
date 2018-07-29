@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

      <!-- MAIN START -->
      <!-- FIRST ROW -->

      <!-- FIRST ROW END -->
      <div class="row">
        <div class="col s2"></div>
        <div class="col s8">


          <div class="carousel carousel-slider">
              @foreach ($banners as $banner)

                <img class="carousel-item" width="650" height="300" src="{{ asset('image')}}/{{$banner->banner}}"> <!-- random image -->

            @endforeach

          </div>



        </div>
        <div class="col s2"></div>
      </div>
      <!--SECOND ROW -->
      <div class="row">
        <div class="col s2"></div>
        <div class="col s8">
          <div class="card black">
            <div class="card-content white-text">

          <div style="text-align:center">
                <h3>Lokasi Pameran</h3>
          </div>
          <table class="centered highlight responsive-table">
            <thead>
              <tr>
                <th>Lokasi</th>
                <th>Periode</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($lokasis as $lokasi)
                <tr>
                  <td>{{$lokasi->lokasi}}</td>
                  <td>{{$lokasi->periode}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
        </div>
        <div class="col s2"></div>
      </div>

      <div class="row">
      <div class="col s1"></div>
        <div class="col s10">
          <div class="col s12">
            <div class="card-panel black">
                    <form action="aksicarikategoriproduk" method="post">
                      Cari Berdasar Kategori
                        <div style="text-align:right">

                          <div class="input-field col s12">
                          <select id="kategori" v-model='kategori' name="kategori">
                            <option disabled selected >Choose your option</option>
                            <@foreach ($kategoris as $kategori)
                            <option value='{{$kategori->kategori}}'>{{$kategori->kategori}} {{$kategori->heel}}</option>
                            @endforeach

                          </select>
                          <label>Cari Kategori</label>
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
        </div>
      <div class="col s1"></div>
      </div>

      <div class="row">
      <div class="col s1"></div>
        <div class="col s10">
          <div class="col s12">
            <div class="card-panel black">
                    <form action="aksicariclogproduk" method="post">
                      Cari Berdasar Produk
                        <div style="text-align:right">

                          <div class="input-field col s12">
                          <select id="nama" v-model='nama' name="nama">
                            <option disabled selected >Choose your option</option>
                            <@foreach ($clogs as $clog)
                              <a href="product/{{$clog->id}}">
                            <option value='{{$clog->nama}}'>{{$clog->nama}}</option>
                          </a>
                            @endforeach

                          </select>
                          <label>Cari Produk</label>
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
        </div>
      <div class="col s1"></div>
      </div>

      <!-- SECOND ROW END -->
      <div class="row">
        <div class="col s1"></div>
        <div class="col s5">
          <!-- PREMIUM START -->
          <div class="col s12">
            <div class="card black">
              <div class="card-content yellow-text">
                <span class="card-title">Premium Edition</span>
              </div>
            </div>
          </div>

          <div class="col s12">
            <div class="card black">
              <div class="card-content white-text">

          <div class="carousel">
            @foreach ($etalasesall as $gambar)
            <a class="carousel-item" href="product/{{$gambar->id}}"><img width="200" height="200" src="{{ asset('image')}}/{{$gambar->gambar}}"></a>
          @endforeach
          </div>
          </div>
          </div>
          </div>

          @foreach ($etalases as $etalase)
            <a href="product/{{$etalase->id}}">
            <div class="col s6">
              <div class="card black">
                <div class="card black">
            <div class="card-image">
              <img height="200" src="{{ asset('image')}}/{{$etalase->gambar}}">
            </div>

            <div class="card-action yellow-text">
              <h4 style="text-align:center">
              {{$etalase->nama}}</br></h4>
              <h4 style="text-align:left">
              Price</br>
              IDR {{ number_format($etalase->harga, 2) }}</br></h4>
            </div>
          </div>
              </div>
            </div>
          </a>
          @endforeach

          <div class="col s12">
            <a href="premiumall">
            <div class="card black">
              <div class="card-content yellow-text">
                <span align="center" class="card-title">Lihat Semua Produk Premium</span>
              </div>
            </div>
          </a>
          </div>
          <!-- PREMIUM END -->

        </div>
        <div class="col s5">
          <!-- PREMIUM START -->
          <div class="col s12">
            <div class="card black">
              <div class="card-content white-text">
                <span class="card-title">Everyday clogs Edition</span>
              </div>
            </div>
          </div>

          <div class="col s12">
            <div class="card black">
              <div class="card-content white-text">

          <div class="carousel">
            @foreach ($etalases1all as $gambar)
            <a class="carousel-item" href="product/{{$gambar->id}}"><img width="200" height="200" src="{{ asset('image')}}/{{$gambar->gambar}}"></a>
          @endforeach
          </div>
          </div>
          </div>
          </div>

          @foreach ($etalases1 as $etalase)
            <a href="product/{{$etalase->id}}">
            <div class="col s6">
              <div class="card black">
                <div class="card black">
            <div class="card-image">
              <img height="200" src="{{ asset('image')}}/{{$etalase->gambar}}">
            </div>

            <div class="card-action white-text">
              <h4 style="text-align:center">
              {{$etalase->nama}}</br></h4>
              <h4 style="text-align:left">
              Price</br>
              IDR {{ number_format($etalase->harga, 2) }}</br></h4>
            </div>
          </div>
              </div>
            </div>
          </a>
          @endforeach
          <div class="col s12">
            <a href="regularall">
            <div class="card black">
              <div class="card-content white-text">
                <span align="center" class="card-title">Lihat Semua Produk Everyday Clogs</span>
              </div>
            </div>
          </a>
          </div>
          <!-- PREMIUM END -->
        </div>
        <div class="col s1"></div>
      </div>

      <!-- THIRD ROW END -->

      <!-- THIRD ROW START -->

      <!-- THIRD ROW END -->


      <!-- MAIN END -->


<!-- SCRIPT SLIDE SHOW -->
<script type="text/javascript">
$(document).ready(function(){

$('.carousel').carousel();
setInterval(function() {
  $('.carousel').carousel('next');
}, 5000); // every 2 seconds

});
</script>
@endsection
