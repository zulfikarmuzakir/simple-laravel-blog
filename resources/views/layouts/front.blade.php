<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/darkmode.css') }}">
  @stack('card-styles')
</head>
<body>
  <header>  
    @include('layouts.navbar')
   
  </header>
    @yield('content')

  <footer>
    @include('layouts.footer')
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/darkmode.js') }}"></script>
  <script src="https://kit.fontawesome.com/a45d877ac0.js" crossorigin="anonymous"></script>
</body>
</html>