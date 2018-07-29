@section('title')
Warna Bahan
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Warna</h2>
<div class="container">

  <div class="card-panel black">
          <form action="aksicariwarna" method="post">
            Cari Warna
              <div style="text-align:right">

                <div class="input-field col s12">
                <select id="search" v-model='search' name="search">
                  <option disabled selected >Choose your option</option>
                  <@foreach ($cari as $warna)
                  <option value='{{$warna->warna}}'>{{$warna->warna}}</option>
                  @endforeach

                </select>
                <label>Pilih Warna</label>
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
            <th>Warna</th>
            <th>Persediaan</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($warnas as $warna)
            <tr>
              <td>{{$warna->id}}</td>
              <td>{{$warna->warna}}</td>
              <td>
                @if ($warna->persediaan > 0)
                  READY
                @else
                    NOT READY
                @endif



              </td>
              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editwarna/{{$warna->id}}">EDIT</a></p>
                <!--DELETE-->
                <form action="hapuswarna/{{$warna->id}}" method="post">
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
      {{ $warnas->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahwarna">Tambah warna</a>
</div>


</div>
@endsection
