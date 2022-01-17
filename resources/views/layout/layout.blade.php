<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Binder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href={{URL::asset('css/app.css')}} rel="stylesheet">
    <script src={{URL::asset('js/app.js')}}></script>
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-expand-sm navbar-light bg-primary p-3">
                <a class="navbar-brand font-weight-bold text-white" href="home">Binder</a>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        @yield('navigations')
                    </ul>
                    <li class="nav-item list-unstyled text-white">
                        @php echo date("D, d-M-Y") @endphp
                    </li>
            </div>
        </nav>
        <div class="container mt-5 bg-transparent">
            @yield('content')
        </div>
    </body>
</html>
