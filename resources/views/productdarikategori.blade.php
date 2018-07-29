@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

      <!-- MAIN START -->
      <!-- FIRST ROW -->

      <!-- FIRST ROW END -->


      <!--SECOND ROW -->
      <div class="row">
        <div class="col s1"></div>
        <div class="col s10">
          <div class="card black">
            <div class="card-content yellow-text">
              <span align="center" class="card-title">Semua Produk Premium</span>
            </div>
          </div>
        </div>
        <div class="col s1"></div>
      </div>

      <!-- SECOND ROW END -->
      <div class="container">
      <div class="row">

          @foreach ($etalasesall as $etalase)
            <a href="product/{{$etalase->id}}">
            <div class="col s3">
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

        </div>
        </div>



      <div style="text-align:center">
            {{ $etalasesall->links() }}
      </div>

      <!-- THIRD ROW END -->
      <!-- THIRD ROW START -->

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
