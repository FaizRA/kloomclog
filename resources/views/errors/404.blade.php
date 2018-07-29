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


<div class="row">
   <div class="input-field col s4"></div>
   <div class="input-field col s4">
    <h2 align="center">ERROR 404</h2></br>
    <h2 align="center">Halaman Tidak DItemukan, Silahkan Kembali Kehalaman Sebelumnya</h2></br>



   </div>
   <div class="input-field col s4"></div>
</div>



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
