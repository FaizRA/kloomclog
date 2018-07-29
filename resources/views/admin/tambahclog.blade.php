@section('title')
Tambah Model Clog
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah Clog</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Tambah Clog</span>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="aksitambahclog" method="post" enctype="multipart/form-data">
              <!--username start-->
              <div class="row">
               <div class="input-field col s12">
                <input placeholder="Name" id="Name" name="nama" type="text" class="validate">
                <label for="first_name">Nama</label>
              </div>
            </div>
            <!--username end-->
            <div class="input-field col s12">
            <select id='kategori' v-model='kategori' name="kategori">
              <option disabled selected >Choose your option</option>
              <@foreach ($kategoris as $kategori)
              <option value='{{$kategori->kategori}}'>{{$kategori->kategori}}</option>
              @endforeach

            </select>
            <label>Pilih Kategori</label>
          </div>
          <!--password start-->
          <div class="input-field col s12">
                    <div class="row">

                      <div class="input-field col s6">
                        <input type="file" id="inputgambar" name="gambar" class="validate"/ >
                      </div>
                    </div>
                  </div>
          <!--password start-->
              <!--password start-->
              <div class="row">
               <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name="deskripsi" type="text" class="validate" ></textarea>
                  <label for="textarea1">Deskripsi</label>
              </div>
            </div>
            <!--password end-->
            <!--username start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Price" id="Price" name="harga" type="text" class="validate">
              <label for="first_name">Harga</label>
            </div>
          </div>
          <!--username end-->

          </div>
        </div>
  <div style="text-align:center">
        <input type="submit" name="Submit" value="Simpan">
  </div>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
      </form>
    </div>
  </div>

@endsection
