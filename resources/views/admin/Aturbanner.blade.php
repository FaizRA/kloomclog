@section('title')
Banner Toko
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar banner</h2>
<div class="container">





      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Banner</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($banners as $banner)
            <tr>
              <td>{{$banner->id}}</td>
              <td>
                  <img src="{{ asset('image')}}/{{$banner->banner}}" id="showbanner" style="max-width:200px;max-height:200px;center;" />
              </td>
              <td>

                <!--DELETE-->
                <form action="hapusbanner/{{$banner->id}}" method="post">
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
      {{ $banners->links() }}
</div>
<div style="text-align:center">

<a class="waves-effect waves-light black btn-large" href="tambahbanner">Tambah banner</a>
</div>


</div>
@endsection
