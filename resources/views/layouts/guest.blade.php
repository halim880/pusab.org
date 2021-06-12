<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Pusab</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
  <link href="{{asset('bootstrap/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="bg-light">

  @include('layouts.header')

  <div class="container" style="height: 100vh">
    @yield('content')
  </div>

  @include('layouts.footer')

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.bundle.js')}}"></script>
  </body>
</html>


