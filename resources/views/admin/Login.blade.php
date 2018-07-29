  <!DOCTYPE html>
  <html>

    <head>
      <title>@yield('title')</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css')}}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{URL::asset('css/foot.css')}}"/>
      <link type="text/css" rel="stylesheet" href="{{URL::asset('css/app.css')}}"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style>

      </style>
    </head>

    <body>
                  <!--Import jQuery before materialize.js-->
                  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                  <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>

                  <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>
                  <script type="text/javascript" src="{{ asset('public/js/materialize.min.js') }}"></script>
                  <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

                  <script type="text/javascript" src="{{URL::asset('js/materialize.js')}}"></script>
                  <script type="text/javascript" src="{{ asset('public/js/materializen.js') }}"></script>
                  <script type="text/javascript" src="{{ asset('/js/materialize.js') }}"></script>

                  <main>



      <h1 align="center">WELCOME TO </br> KLOOM CLOGSHOP </br> ADMIN PAGE</h1>
      <div class="section">
      </div>
      <div class="row">
      <div class="col s4">
        <!-- filler -->
      </div>
      <form action="aksilogin" method="post">
        <div class="col s4">
          <div class="card black">
            <div class="card-content white-text">
              <span class="card-title">Login Admin</span>
                <!--username start-->
                <div class="row">
                 <div class="input-field col s12">
                  <input placeholder="Username" id="Username" type="text" class="validate" name="user">
                  <label for="first_name">Username</label>
                </div>
              </div>
              <!--username end-->
                <!--password start-->
                <div class="row">
                 <div class="input-field col s12">
                  <input placeholder="Password" id="Password" type="password" class="validate" name="pass">
                  <label for="first_name">Password</label>
                </div>
              </div>
              <!--password end-->
              <div style="text-align:center">
                    <input type="submit" style="color: black;" name="Submit" value="Login">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                  </form>
              </div>
            </div>
            <h6 align="right">
            <a class="waves-effect waves-light btn-large black" href="lupapassword">Lupa Password</a>
            </h6>
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

        </div>
      <div class="col s4">
      <!-- filler -->
      </div>


      </div>

            </main>
      <!-- FOOTER START -->
          <footer class="page-footer black">
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright by Faiz Razzak Adiyatma 14.12.7815
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>

            </div>
          </div>
        </footer>



      <!-- FOOTER END -->

  </body>
</html>
