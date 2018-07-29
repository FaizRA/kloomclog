@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')
      <!-- MAIN START -->
      <!-- FIRST ROW -->
      <div class="row">
        <div class="col s12">
          <div class="card black">
            <div class="card-content yellow-text">
              <span class="card-title">Premium Edition</span>
            </div>
          </div>
        </div>
      </div>

      <!-- THIRD ROW START -->
      <div class="row">
        @foreach ($etalases as $etalase)
          <div class="col s2">
            <div class="card black">
              <div class="card-content yellow-text">
                <span class="card-title"><p style="text-align:center">{{$etalase->model}}</p></span>
                <p style="text-align:center">
                <img width="250" height="250" style="center;" src="{{ asset('image')}}/{{$etalase->gambar}}" id="showgambar"  />
              </p>
              </div>
              <div class="card-action yellow-text">
                <h4 style="text-align:center">
                Price</br>
                IDR {{$etalase->harga}},00</br></h4>
              </div>
            </div>
          </div>
        @endforeach


      </div>



      <!-- MAIN END -->
@endsection
