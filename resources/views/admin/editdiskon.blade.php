@section('title')
Edit diskon
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Diskon</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Edit Diskon</span>



          <form action="../aksieditdiskon/{{$diskons->id}}" method="post">
            <!--username start-->
          <!--password end-->
          <!--username start-->
          <div class="row">
           <div class="input-field col s12">
            <input placeholder="diskon" id="diskon" name="diskon" type="text" class="validate" value="{{$diskons->diskon}}">
            <label for="first_name">diskon</label>
          </div>
        </div>
        <!--username end-->

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
<div style="text-align:center">
      <input type="submit" name="Submit" value="Edit">
</div>
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    </form>
    </div>
  </div>

@endsection
