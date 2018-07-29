@section('title')
Tambah Ongkir Bahan
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah Ongkir</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Tambah Ongkir</span>

          <form action="aksitambahongkir" method="post">

              <!--username start-->
              <div class="row">
               <div class="input-field col s12">
                <input placeholder="Kota" id="Kota" name="kota" type="text" class="validate">
                <label for="first_name">Kota</label>
              </div>
            </div>
            <!--username end-->
              <!--password start-->
              <div class="row">
               <div class="input-field col s12">
                <input placeholder="Harga" id="Harga" name="harga" type="text" class="validate">
                <label for="first_name">Harga</label>
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
        <input type="submit" name="Submit" value="Tambah">
  </div>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
      </form>
    </div>
  </div>

@endsection
