@section('title')
Model Clog
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Clog</h2>
<div class="container">


  <div class="card-panel black">
          <form action="aksicariclog" method="post">
            Cari Clog
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="search" v-model='search' name="search">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($cari as $clog)
                  <option value='{{$clog->nama}}'>{{$clog->nama}}</option>
                  @endforeach

                </select>
                <label>Pilih Clog</label>
              </div>
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
            <th>Nama</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Harga</th>

          </tr>
        </thead>

        <tbody>

            @foreach ($clogs as $clog)
            <tr>
              <td>{{$clog->id}}</td>
              <td>{{$clog->nama}}</td>
              <td>{{$clog->kategori}}</td>
              <td>
                  <img src="{{ asset('image')}}/{{$clog->gambar}}" id="showgambar" style="max-width:200px;max-height:200px;center;" />
              </td>
              <td>{{$clog->deskripsi}}</td>
              <td>{{$clog->harga}}</td>
              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editclog/{{$clog->id}}">EDIT</a></p>
                <!--DELETE-->
                <form action="hapusclog/{{$clog->id}}" method="post">
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
      {{ $clogs->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahclog">Tambah clog</a>
</div>


</div>
@endsection
