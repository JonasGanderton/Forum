<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        /* #081B33 #152642 #2F4562 #506680 #767D92 #353C51
         */
        .main {
            color: #767D92;
            background-color: #081B33;
        }
        .postListItem {
            color: #B6BDC2;
            background-color: #2F4562;
        }
    </style>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
        <title>Forum - @yield('title') {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        </head>
    <body class="main">
        <h1><font color="blue">Forum</font> - @yield('title')</h1>
        
        @if (session('message'))
            <font color="green">
            <p><b>{{ session('message') }}</b></p>
            </font>
        @endif
        
        @if (session('errors'))
            <div>
                <font color="red">Errors:
                <ul>
                    @foreach (session('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </font>
            </div>
        @endif

        <div>
            @yield('content')
        </div>
    </body>
</html>
