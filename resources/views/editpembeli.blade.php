@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')

  <h2 align="center">Form Informasi Pembeli</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Isi Form Informasi Pembeli</span>

          <form action="aksieditpembeli" method="post" enctype="multipart/form-data">
              <!--username start-->
              <div class="row">
               <div class="input-field col s12">
                <input placeholder="Name" id="Name" name="nama" type="text" class="validate" value="{{$pembelis->nama}}">
                <label for="first_name">Nama</label>
              </div>
            </div>
            <!--username end-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="No.WA" id="nowa" name="nowa" type="text" class="validate" value="{{$pembelis->nowa}}">
              <label for="first_name">No. WA</label>
            </div>
            </div>
          <!--password start-->
          <!--password start-->
          <div class="input-field col s12">
          <select id="kota" v-model='kota' name="kota">
            <option value="{{$pembelis->kota}}" selected >{{$pembelis->kota}}</option>
            <@foreach ($ongkirs as $ongkir)
            <option value='{{$ongkir->kota}}'>{{$ongkir->kota}}</option>
            @endforeach

          </select>
          <label>Pilih kota</label>
          </div>
          <!--password start-->
          <div class="row">
           <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="alamat" type="text" class="validate" >{{$pembelis->alamat}}</textarea>
              <label for="textarea1">Alamat</label>
          </div>
        </div>
          <!--password start-->
          <div class="row">
           <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="keterangan" type="text" class="validate" >{{$pembelis->keterangan}}</textarea>
              <label for="textarea1">Keterangan</label>
          </div>
        </div>
              <!--password start-->
            <!--password end-->
            <!--username start-->

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
