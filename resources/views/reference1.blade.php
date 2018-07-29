@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')
      <!-- MAIN START -->
      <!-- FIRST ROW -->
      <div class="row">
        <div class="col s2">
          <!--FILLER-->
        </div>
        <div class="col s4">
                  <div class="card blue-grey darken-1">
                   <div class="card-content white-text">
                     <h4>SPECIAL PRICE</h4>
                   </div>

                 </div>
          @foreach ($etalases as $etalase)
            <a href="product/{{$etalase->id}}">
            <div class="col s6 fixed">
            <div class="card">
            <div class="card-image">
              <img width="200" height="200" src="{{ asset('image')}}/{{$etalase->gambar}}">
              <h4 align="center">{{$etalase->model}} {{$etalase->warna}}</h4>

            <!--  <span class="card-title">Card Title</span> -->
            </div>
            <div class="card-action">
              <h5 style="text-align:left">
                @if ($etalase->diskon > 0)
                  Price : IDR<strike> {{$etalase->harga}},00</strike> </br>
                  Promo (- IDR {{$etalase->diskon}},00)
                @else
                  Price </br>
                  IDR {{$etalase->harga}},00
                @endif

            </h5>
            </div>
          </div>
          </div>
        </a>
          @endforeach

        </div>
        <div class="col s4">
          <div class="card blue-grey darken-1">
           <div class="card-content white-text">
             <h4>TEMPAT PAMERAN</h4>
           </div>

         </div>
              @foreach ($etalases as $etalase)
                <a href="product/{{$etalase->id}}">
                <div class="col s6 fixed">
                <div class="card">
                <div class="card-image">
                  <img width="200" height="200" src="{{ asset('image')}}/{{$etalase->gambar}}">
                  <h4 align="center">{{$etalase->model}} {{$etalase->warna}}</h4>

                <!--  <span class="card-title">Card Title</span> -->
                </div>
                <div class="card-action">
                  <h5 style="text-align:left">
                    @if ($etalase->diskon > 0)
                      Price : IDR<strike> {{$etalase->harga}},00</strike> </br>
                      Promo (- IDR {{$etalase->diskon}},00)
                    @else
                      Price </br>
                      IDR {{$etalase->harga}},00
                    @endif

                </h5>
                </div>
              </div>
              </div>
            </a>
              @endforeach

        </div>
        <div class="col s2">
          <!--FILLER-->
        </div>
      </div>
      <!-- FIRST ROW END -->
      <!--SECOND ROW -->
      <div class="row">
        <div class="col s2">
          <!--FILLER-->
        </div>
        <div class="col s8">
          <div class="card blue-grey darken-1">
           <div class="card-content white-text">
             <h4>PRODUK</h4>
           </div>
         </div>
         @foreach ($etalases2 as $etalase)
           <a href="product/{{$etalase->id}}">
           <div class="col s3 fixed">
           <div class="card">
           <div class="card-image">
             <img width="200" height="200" src="{{ asset('image')}}/{{$etalase->gambar}}">
             <h4 align="center">{{$etalase->model}} {{$etalase->warna}}</h4>

           <!--  <span class="card-title">Card Title</span> -->
           </div>
           <div class="card-action">
             <h5 style="text-align:left">
               @if ($etalase->diskon > 0)
                 Price : IDR<strike> {{$etalase->harga}},00</strike> </br>
                 Promo (- IDR {{$etalase->diskon}},00)
               @else
                 Price </br>
                 IDR {{$etalase->harga}},00
               @endif

           </h5>
           </div>
         </div>
         </div>
       </a>
         @endforeach
        </div>
        <div class="col s2">
          <!--FILLER-->
        </div>
      </div>




      <!-- MAIN END -->
@endsection
