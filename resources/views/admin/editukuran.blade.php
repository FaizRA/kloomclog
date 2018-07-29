@section('title')
Edit Ukuran
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Edit Ukuran</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Edit Ukuran</span>

          <form action="../aksieditukuran/{{$ukurans->id}}" method="post">
            <!--username start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Ukuran" id="Ukuran" name="ukuran" type="text" class="validate" value="{{$ukurans->ukuran}}">
              <label for="first_name">Ukuran</label>
            </div>
          </div>
          <!--username end-->
            <!--password start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Keterangan" id="Keterangan" name="keterangan" type="text" class="validate" value="{{$ukurans->keterangan}}">
              <label for="first_name">Keterangan</label>
            </div>
            </div>
          <!--password end-->

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
