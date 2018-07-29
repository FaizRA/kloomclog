@section('title')
Tambah Gambar Produk
@endsection

@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah Gambar</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Tambah Gambar</span>

          <form action="aksitambahgambar" method="post" enctype="multipart/form-data">
            <!--username start-->
            <div class="input-field col s12">
            <select id='model' v-model='model' name="model">
              <option disabled selected >Choose your option</option>
              <@foreach ($clogs as $clog)
              <option value='{{$clog->nama}}'>{{$clog->nama}}</option>
              @endforeach

            </select>
            <label>Pilih Clog</label>
          </div>
          <!--username end-->
            <!--password start-->
            <div class="input-field col s12">
            <select id='kategori' v-model='kategori' name="kategori">
              <option disabled selected >Choose your option</option>
              <@foreach ($kategoris as $kategori)
              <option value='{{$kategori->kategori}}'>{{$kategori->kategori}}</option>
              @endforeach

            </select>
            <label>Pilih Kategori</label>
          </div>
          <!--password end-->
<div class="input-field col s12">
          <div class="row">

            <div class="input-field col s6">
              <input type="file" id="inputgambar" name="gambar[]" multiple class="validate"/ >
            </div>
          </div>
        </div>

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
      <input type="submit"  name="Submit" value="Tambah" >
    </div>

      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    </form>
    </div>
  </div>

@endsection
