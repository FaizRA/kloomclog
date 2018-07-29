@section('title')
Atur Admin
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Edit Admin</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Login Admin</span>

          <form action="aksieditadminlupa/{{$admins->id}}" method="post">
            <!--username start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Username" id="Username" name="nama" type="text" class="validate" value="{{$admins->nama}}">
              <label for="first_name">Username</label>
            </div>
          </div>
          <!--username end-->
            <!--password start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Password" id="Password" name="pass" type="text" class="validate" value="{{$admins->pass}}">
              <label for="first_name">Password</label>
            </div>
          </div>
          <!--password end-->

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
<div style="text-align:center">
      <input type="submit" name="Submit" value="Edit">
</div>
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    </form>
    </div>
  </div>

@endsection
