<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link href="{{ URL::asset('style/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('style/assets/css/themify-icons/themify-icons.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('style/assets/css/user.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ URL::asset('style/assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body>
<div class="wrapper ">
    <div class="main-panel">
      @include('user.partials.navbar')
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            @yield('content')
          </div>
        </div>
      </div>
      @include('user.partials.footer')
    </div>
</div>
  <!--   Core JS Files   -->
  <script src="{{ URL::asset('style/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('style/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ URL::asset('style/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('style/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ URL::asset('style/assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ URL::asset('style/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>
    $(".delete").on("submit", function () {
      return confirm ("Are you sure?");
    });
  </script>


</body>

</html>
