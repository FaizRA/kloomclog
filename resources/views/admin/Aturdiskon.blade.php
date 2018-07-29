@section('title')
Diskon Produk
@endsection
@extends('admin.menu')
@section('content')

<h2 align="center">Daftar Diskon</h2>
<div class="container">





      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Diskon (%)</th>
            <th><p>Aksi</p></th>

          </tr>
        </thead>

        <tbody>

            @foreach ($diskons as $diskon)
            <tr>
              <td>{{$diskon->id}}</td>
              <td>{{$diskon->diskon}}%</td>
              <td>

                  <p><a class ="btn waves-effect waves-light black" href="editdiskon/{{$diskon->id}}">EDIT</a></p>
                <!--EDIT-->

                <!--DELETE-->

              </td>
            </tr>
            @endforeach




        </tbody>
      </table>
<div style="text-align:center">
      {{ $diskons->links() }}
</div>



</div>
@endsection
