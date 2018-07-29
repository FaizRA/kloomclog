@section('title')
Atur Admin
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Admin</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($admins as $admin)
            <tr>
              <td>{{$admin->id}}</td>
              <td>{{$admin->nama}}</td>
              <td>
                <!--EDIT-->
                <p><a class ="btn waves-effect waves-light black" href="editadmin/{{$admin->id}}">EDIT</a></p>
                <!--
                DELETE

                <form action="hapusadmin/{{$admin->id}}" method="post">
                <input type="submit" class ="btn waves-effect waves-light black" name="Submit" value="delete">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                </form>
                -->
              </td>
            </tr>
            @endforeach




        </tbody>
      </table>
<div style="text-align:center">
      {{ $admins->links() }}
</div>
<!--
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahadmin">Tambah admin</a>
</div>
-->


</div>
@endsection
