@section('title')
Ongkir Bahan
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Ongkir</h2>
<div class="container">

  <div class="card-panel black">
          <form action="aksicariongkir" method="post">
            Cari Ongkir
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="search" v-model='search' name="search">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($cari as $ongkir)
                  <option value='{{$ongkir->kota}}'>{{$ongkir->kota}}</option>
                  @endforeach

                </select>
                <label>Pilih Ongkir</label>
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
            <th>Kota</th>
            <th><a href="ongkirturun">[[-]]</a> Harga <a href="ongkirnaik">[[+]]</a></th>
            <th>Aksi</th>

          </tr>
        </thead>

        <tbody>

            @foreach ($ongkirs as $ongkir)
            <tr>
              <td>{{$ongkir->id}}</td>
              <td>{{$ongkir->kota}}</td>
              <td>{{$ongkir->harga}}</td>
              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editongkir/{{$ongkir->id}}">EDIT</a></p>
                <!--DELETE-->
                <form action="hapusongkir/{{$ongkir->id}}" method="post">
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
      {{ $ongkirs->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahongkir">Tambah ongkir</a>
</div>


</div>
@endsection
