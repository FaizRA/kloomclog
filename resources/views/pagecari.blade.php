<!DOCTYPE html>
<html>

  <head>
    <title>@yield('title')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/foot.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/app.css')}}"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>

    </style>
  </head>

  <body>
                <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

    <script type="text/javascript" src="{{URL::asset('js/materialize.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/materializen.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/materialize.js') }}"></script>




    <!-- HEADER START -->
          <!-- Dropdown Structure -->
          <header>
          <ul id="dropdownproduk" class="dropdown-content">
            <li><a href="#!">Input Produk</a></li>
            <li class="divider"></li>
            <li><a href="#!">List Produk</a></li>
          </ul>

          <!-- Dropdown Structure -->
          <ul id="dropdowntoko" class="dropdown-content">
            <li><a href="#!">Buka/Tutup Toko</a></li>
            <li class="divider"></li>
            <li><a href="#!">Log Out</a></li>
          </ul>

          <!-- navigation menu -->
          <div class="navbar-fixed">
          <nav>
            <div class="nav-wrapper black">
              <ul class="left hide-on-med-and-down">
                <li><a href="admin">Panel Admin</a></li>

                <!-- Dropdown Trigger START-->
                <li><a class="dropdown-button" href="#!" data-activates="dropdownproduk">Atur Produk<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- Dropdown Trigger END -->
                <li><a href="badges.html">Order</a></li>
                <li><a href="badges.html">Discount Manager</a></li>
              </ul>

              <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger START-->
                <li><a class="dropdown-button" href="#!" data-activates="dropdowntoko">Atur Toko<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- Dropdown Trigger END -->
              </ul>
            </div>
          </nav>
          </div>
        </header>
    <!-- HEADER END -->
    <main>
      <div class="row">
        <div class="col s2">

        </div>
        <div class="col s8">

          @foreach ($etalases as $etalase)
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
                  Price : <strike>IDR {{$etalase->harga}},00</strike> </br>
                  Potongan : IDR {{$etalase->diskon}},00
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

        </div>
      </div>
      <div style="text-align:center">
            {{ $etalases->links() }}
      </div>


    </main>
    <!-- FOOTER START -->
        <footer class="page-footer black">
        <div class="footer-copyright">
          <div class="container">
          © 2017 Copyright by Faiz Razzak Adiyatma 14.12.7815
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </footer>

    <!-- FOOTER END -->



  </body>
</html>
