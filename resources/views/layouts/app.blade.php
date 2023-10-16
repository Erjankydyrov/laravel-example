<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warhammer Store</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="wrapper">
        @include('layouts.nav')

        <main class="main container">
            @yield('main')
        </main>

        @include('layouts.footer')
    </div>
</body>

</html>
