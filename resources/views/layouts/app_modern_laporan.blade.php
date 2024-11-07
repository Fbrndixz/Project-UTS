<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? '' }} :: {{ env('APP_NAME') }}</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('modern/src/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('modern/src/assets/css/styles.min.css') }}" />
</head>

<body>
        @yield('content')
</body>

</html>
