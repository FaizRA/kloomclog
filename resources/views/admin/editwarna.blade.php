@section('title')
Edit Warna Bahan
@endsection
@extends('admin.menu')
@section('content')
  <h2 align="center">Form Edit Warna</h2>
  <div class="container">
    <div class="col s4">
      <div class="card black">
        <div class="card-content white-text">
          <span class="card-title">Edit Warna</span>

          <form action="../aksieditwarna/{{$warnas->id}}" method="post">
            <!--username start-->
            <div class="row">
             <div class="input-field col s12">
              <input placeholder="Warna" id="Warna" name="warna" type="text" class="validate" value="{{$warnas->warna}}">
              <label for="first_name">Warna</label>
            </div>
          </div>
          <!--username end-->
            <!--password start-->
            <div class="input-field col s12">
            <select id='persediaan' v-model='persediaan' name="persediaan">
              <option disabled selected >Choose your option</option>
              <option value='1'>READY</option>
              <option value='0'>NOT READY</option>
            </select>
            <label>Materialize Select</label>
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
