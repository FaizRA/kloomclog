  <!DOCTYPE html>
  <html>

    <head>
      <title>Panel Admin</title>
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
                  <li><a href="{{URL::route('admin')}}">Panel Admin</a></li>

                  <!-- Dropdown Trigger START-->
                </ul>

              </div>
            </nav>
            </div>
          </header>
      <!-- HEADER END -->
      <main>
@yield('content')
      </main>
      <!-- FOOTER START -->
          <footer class="page-footer black">
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright by Faiz Razzak Adiyatma 14.12.7815

            </div>
          </div>
        </footer>

      <!-- FOOTER END -->



    </body>
  </html>
