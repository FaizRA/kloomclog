@section('title')
Tambah Kategori
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah kategori</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Tambah kategori</span>

          <form action="aksitambahkategori" method="post">

              <!--username start-->
              <div class="row">
               <div class="input-field col s12">
                <input placeholder="kategori" id="kategori" name="kategori" type="text" class="validate">
                <label for="first_name">kategori</label>
              </div>
            </div>
            <!--username end-->
              <!--password start-->
              <div class="row">
               <div class="input-field col s12">
                <input placeholder="heel" id="heel" name="heel" type="text" class="validate" value="">
                <label for="first_name">Heel</label>
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
