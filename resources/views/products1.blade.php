@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

      <!-- MAIN START -->
      <!-- FIRST ROW -->
      <div class="row">
        <div class="col s4"></div>
        <div class="col s4">
            <div class="card black">
              <div class="card-content white-text">
                <span class="card-title"><p style="text-align:center">{{$products->nama}}</p></span>
              </div>
            </div>
        </div>
        <div class="col s4"></div>
      </div>
      <!-- FIRST ROW END -->
      <!--SECOND ROW -->
      <div class="row">
        <div class="col s2"></div>
        <div class="col s4">

          <div class="col s12">
              <div class="card black">
                <div class="card-content white-text">
                  <p style="text-align:center">
                  <img width="200" height="200" style="center;" src="{{ asset('image')}}/{{$products->gambar}}" id="showgambar"  />
                </p>
                </div>
              </div>
          </div>

          <div class="col s12">
              <div class="card black">
                <div class="card-content white-text">
                  <span class="card-title"><p style="text-align:left">Description</p></span>
                  <p style="text-align:left">
                    {{$products->deskripsi}}
                  </p>
                </div>
              </div>
          </div>

          <div class="col s4">
              <div class="card black">
                <div class="card-content white-text">
                  <span class="card-title"><p style="text-align:left">Price</p></span>
                </div>
              </div>
          </div>
          <div class="col s8">
              <div class="card black">
                <div class="card-content white-text">
                  <span class="card-title"><p style="text-align:right">IDR {{ number_format($products->harga, 2) }}</p></span>
                </div>
              </div>
          </div>
        </div>
        <div class="col s4">
          <!--gambar--->
          <div class="col s12">
            <div class="card black">
              <div class="card-content white-text">

          <div class="carousel">
            @foreach ($gambars as $gambar)
            <a class="carousel-item"><img class="materialboxed" width="200" height="200" src="{{ asset('image')}}/{{$gambar->gambar}}"></a>
          @endforeach
          </div>
          </div>
          </div>

          </div>
        <!--gambarend--->
          <div class="col s12">
            <div class="card black">
              <div class="card-content white-text">
                    <form action="aksitambahkeranjang" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <input type="hidden" name="clog" value='{{$products->nama}}'>
                    <input type="hidden" name="kategori" value='{{$products->kategori}}'>
                    <input type="hidden" name="harga" value='{{$products->harga}}'>
                      <!--username start-->
                      <div class="input-field col s12">
                      <select id='warna' v-model='warna' name="warna">
                        <option disabled selected >Choose your option</option>
                        <@foreach ($cariw as $warna)
                        <option value='{{$warna->warna}}'>{{$warna->warna}}</option>
                        @endforeach

                      </select>
                      <label>Pilih Warna</label>
                    </div>
                    <!--username end-->
                    <!--username start-->
                    <div class="input-field col s12">
                    <select id='ukuran' v-model='ukuran' name="ukuran">
                      <option disabled selected >Choose your option</option>
                      <@foreach ($cariuk as $ukuran)
                      <option value='{{$ukuran->ukuran}}'>{{$ukuran->ukuran}}</option>
                      @endforeach

                    </select>
                    <label>Pilih Ukuran</label>
                  </div>
                  <!--username end-->
                      <!--password start-->
                      <div class="input-field col s12">
                      <select id='heel' v-model='heel' name="heel">
                        <option disabled selected >Choose your option</option>
                        <@foreach ($carik as $kategori)
                        <option value='{{$kategori->heel}}'>{{$kategori->heel}}</option>
                        @endforeach

                      </select>
                      <label>Pilih Tinggi</label>
                    </div>
                    <!--password end-->
                    <!--username start-->
                    <div class="row">
                     <div class="input-field col s12">
                      <input placeholder="Jumlah" id="Jumlah" name="jumlah" type="text" class="validate">
                      <label for="first_name">Jumlah</label>
                    </div>
                  </div>
                  <!--username end-->

                  <div style="text-align:right">
                    <input type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: black; background-color: #FFFFFF; border: 3pt ridge lightgrey" name="Submit" value="Tambah Ke keranjang" >
                  </div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ csrf_field() }}
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT">
              </form>
            </div>
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
        <div class="col s2"></div>
      </div>
      <!-- SECOND ROW END -->

          <!-- PREMIUM END -->

        </div>
        <div class="col s5">

        </div>
        <div class="col s1"></div>
      </div>

      <!-- THIRD ROW END -->
      <!-- THIRD ROW START -->

      <!-- THIRD ROW END -->
      <!-- THIRD ROW START -->

      <!-- THIRD ROW END -->


      <!-- MAIN END -->


<!-- SCRIPT SLIDE SHOW -->


@endsection
