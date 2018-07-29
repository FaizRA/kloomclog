@section('title')
Welcome To Admin Page
@endsection
@extends('mainmenu')
@section('content')
  
<h2 align="center">Daftar Ukuran</h2>
<div class="container">




      <table class="centered bordered highlight responsive-table">
        <thead>
          <tr>

            <th>Ukuran</th>
            <th>Keterangan</th>


          </tr>
        </thead>

        <tbody>

            @foreach ($ukurans as $ukuran)
            <tr>

              <td>{{$ukuran->ukuran}}</td>
              <td>{{$ukuran->keterangan}}</td>

            </tr>
            @endforeach




        </tbody>
      </table>
<div style="text-align:center">
      {{ $ukurans->links() }}
</div>



</div>
@endsection
