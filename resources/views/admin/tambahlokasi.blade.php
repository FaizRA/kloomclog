@section('title')
Tambah Lokasi
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah Lokasi</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Tambah Lokasi</span>

          <form action="aksitambahlokasi" method="post">
            <!--username start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Periode" id="Periode" name="periode" type="text" class="validate" value="">
              <label for="first_name">Periode</label>
            </div>
          </div>
          <!--username end-->
            <!--password start-->
            <div class="row">
             <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea" name="lokasi" type="text" class="validate" ></textarea>
                <label for="textarea1">Lokasi</label>
            </div>
          </div>
          <!--password end-->
          <!--username start-->

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
      <input type="submit" name="Submit" value="Tambah">
</div>
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    </form>
    </div>
  </div>

@endsection
