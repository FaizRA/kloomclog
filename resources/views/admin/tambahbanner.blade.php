@section('title')
Tambah banner
@endsection

@extends('admin.menu')
@section('content')
  <h2 align="center">Form Tambah banner</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Tambah banner</span>

          <form action="aksitambahbanner" method="post" enctype="multipart/form-data">
            <!--username start-->

          <!--username end-->
            <!--password start-->

          <!--password end-->
<div class="input-field col s12">
          <div class="row">

            <div class="input-field col s6">
              <input type="file" id="inputbanner" name="banner[]" multiple class="validate"/ >
            </div>
          </div>
        </div>

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
      <input type="submit"  name="Submit" value="Tambah" >
    </div>

      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
    </form>
    </div>
  </div>

@endsection
