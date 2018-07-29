@section('title')
Kategori
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar kategori</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>kategori</th>
            <th>Heel</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($kategoris as $kategori)
            <tr>
              <td>{{$kategori->id}}</td>
              <td>{{$kategori->kategori}}</td>
              <td>{{$kategori->heel}}</td>

              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editkategori/{{$kategori->id}}">EDIT</a></p>
                <!--DELETE-->
                <form action="hapuskategori/{{$kategori->id}}" method="post">
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
      {{ $kategoris->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahkategori">Tambah kategori</a>
</div>


</div>
@endsection
