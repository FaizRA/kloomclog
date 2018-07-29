@section('title')
Atur Lokasi
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Lokasi</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Lokasi</th>
            <th>Periode</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($lokasis as $lokasi)
            <tr>
              <td>{{$lokasi->id}}</td>
              <td>{{$lokasi->lokasi}}</td>
              <td>{{$lokasi->periode}}</td>
              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editlokasi/{{$lokasi->id}}">EDIT</a></p>
                <!--
                DELETE
-->
                <form action="hapuslokasi/{{$lokasi->id}}" method="post">
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
      {{ $lokasis->links() }}
</div>

<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahlokasi">Tambah lokasi</a>
</div>


</div>
@endsection
