@section('title')
Ukuran
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Ukuran</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Ukuran</th>
            <th>Keterangan</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($ukurans as $ukuran)
            <tr>
              <td>{{$ukuran->id}}</td>
              <td>{{$ukuran->ukuran}}</td>
              <td>{{$ukuran->keterangan}}</td>

              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editukuran/{{$ukuran->id}}">EDIT</a></p>
                <!--DELETE-->
                <form action="hapusukuran/{{$ukuran->id}}" method="post">
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
      {{ $ukurans->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahukuran">Tambah Ukuran</a>
</div>


</div>
@endsection
