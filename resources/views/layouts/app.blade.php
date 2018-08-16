@push('scripts')
  <script src="js/app.min.js" ></script>
@endpush


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Workshop - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/app.min.css" rel="stylesheet">
    
    @stack('login-css')
    @stack('dashboard-css')

  </head>

  <body class="text-center">
    @yield('mainContent')
    @stack('scripts')
  </body>
</html>
