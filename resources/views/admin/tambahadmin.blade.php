
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah Admin</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Login Admin</span>

          <form action="aksitambah" method="post">
            <!--username start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Username" id="Username" name="nama" type="text" class="validate" >
              <label for="first_name">Username</label>
            </div>
          </div>
          <!--username end-->
            <!--password start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Password" id="Password" name="pass" type="text" class="validate" >
              <label for="first_name">Password</label>
            </div>
          </div>
          <!--password end-->

        </div>
      </div>
<div style="text-align:center">
      <input type="submit"  name="Submit" value="Tambah" >
    </div>

      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    </form>
    </div>
  </div>

@endsection
