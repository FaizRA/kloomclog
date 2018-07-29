<!DOCTYPE html>
<html>

  <head>
    <title>Kloom Clogshop</title>
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

          <!-- navigation menu -->
          <div class="navbar-fixed">
          <nav>
            <div class="nav-wrapper black">
              <a href="#" class="brand-logo center"><img width="57" height="57" style="center;" src="{{ asset('image')}}/9084.jpg" id="showgambar"  /></a>
              <ul class="left hide-on-med-and-down">
                <li><a href="{{URL::route('home')}}">Home</a></li>
                <li><a href="{{URL::route('tampilukuran')}}">Measurement</a></li>
                <li><a href="{{URL::route('tampilongkir')}}">Ongkir</a></li>
              </ul>

              <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger START-->
                <li><a href="{{URL::route('keranjang')}}" >Keranjang [[{{$keranjang}}]]</a></li>
                <li><a href="{{URL::route('aturtransaksi')}}" >CHECK OUT</a></li>
                <li><a href="https://api.whatsapp.com/send?phone=628989019089" >Pesan via WhatsApp</a></li>
                <li><a href="https://api.whatsapp.com/send?phone=628989019089" >Konfirmasi pembayaran</a></li>
                <li><a href="http://www.jne.co.id/en/tracking/trace" >Track Order</a></li>
                <li><a href="https://www.google.com/maps/place/KLOOM+CLOGSHOP/@-6.322289,106.6967167,13.92z/data=!4m12!1m6!3m5!1s0x0:0xe87705b212720d9b!2sKLOOM+CLOGSHOP!8m2!3d-6.31211!4d106.698177!3m4!1s0x0:0xe87705b212720d9b!8m2!3d-6.31211!4d106.698177" >Lokasi</a></li>
                <!-- Dropdown Trigger END -->
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
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Cara Belanja</h5>
                <ul>
                  <li>Pilih Produk, Isi Formnya</li>
                  <li>Tambah Produk Lain atau Klik Keranjang</li>
                  <li>Klik Isi informasi Pembeli, Isi Formnya</li>
                  <li>Klik kirim Form Pesanan</li>
                  <li>Tunggu Petugas kami menghubungi anda untuk mengkonfirmasi</li>
                </ul>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li>WA/SMS : 08989019089</li>
                  <li><a href="https://api.whatsapp.com/send?phone=628989019089" >Pesan via WhatsApp</a></li>
                  <li><a href="https://api.whatsapp.com/send?phone=628989019089" >Konfirmasi pembayaran</a></li>
                  <li><a href="http://www.jne.co.id/en/tracking/trace" >Track Order</a></li>
                  <li><a href="https://www.google.com/maps/place/KLOOM+CLOGSHOP/@-6.322289,106.6967167,13.92z/data=!4m12!1m6!3m5!1s0x0:0xe87705b212720d9b!2sKLOOM+CLOGSHOP!8m2!3d-6.31211!4d106.698177!3m4!1s0x0:0xe87705b212720d9b!8m2!3d-6.31211!4d106.698177" >Lokasi</a></li>
                </ul>
              </div>
            </div>
          </div>
        <div class="footer-copyright">
          <div class="container">
          © 2017 Copyright by Faiz Razzak Adiyatma 14.12.7815
          </div>
        </div>
      </footer>

    <!-- FOOTER END -->

    <script type="text/javascript">

        $(document).ready(function(){
          $('.collapsible').collapsible();
          $(".dropdown-button").dropdown();
          $('select').material_select();
          $('persediaan').material_select();
          $('warna').material_select();
          $('model').material_select();
          $('ukuran').material_select();
          $('kota').material_select();
      $('.carousel').carousel();
      $('.slider').slider({height: 400} );
      $('.materialboxed').materialbox();
      $('.carousel.carousel-slider').carousel({full_width: true});
           $('.carousel.carousel-slider').carousel({fullWidth: true});


         });

    </script>

  </body>
</html>
