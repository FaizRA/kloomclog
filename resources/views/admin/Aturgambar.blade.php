@section('title')
Gambar Produk
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Gambar</h2>
<div class="container">

  <div class="card-panel black">
          <form action="aksicarigambar" method="post">
            Cari Clog
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="model" v-model='model' name="model">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($caric as $clog)
                  <option value='{{$clog->nama}}'>{{$clog->nama}}</option>
                  @endforeach

                </select>
                <label>Pilih Clog</label>
              </div>
              </div>
        
                <div style="text-align:right">


                <input type="submit" name="Submit" value="Cari">
                </div>
                     {{ csrf_field() }}
                     <input type="hidden" name="_method" value="PUT">
                   </form>

    </div>



      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Model</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Status</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($gambars as $gambar)
            <tr>
              <td>{{$gambar->id}}</td>
              <td>{{$gambar->model}}</td>
              <td>{{$gambar->kategori}}</td>
              <td>
                  <img src="{{ asset('image')}}/{{$gambar->gambar}}" id="showgambar" style="max-width:200px;max-height:200px;center;" />
              </td>
              <td>
                @if ($gambar->status > 0)
                  MAIN
                @else
                  SECONDARY
                @endif
              </td>
              <td>
                @if ($gambar->status > 0)
                  MAIN
                @else
                  <form action="editgambar/{{$gambar->id}}" method="post">
                  <input type="submit" class ="btn waves-effect waves-light black" name="Submit" value="Jadikan MAIN">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  </form>
                @endif
                <!--EDIT-->

                <!--DELETE-->
                <form action="hapusgambar/{{$gambar->id}}" method="post">
                <input type="submit" class ="btn waves-effect waves-light black" name="Submit" value="delete">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                </form>
              </td>
            </tr>
            @endforeach




        </tbody>
      </table>
<div style="text-align:center">
      {{ $gambars->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="carivaluegambar">Tambah Gambar</a>
</div>


</div>
@endsection
