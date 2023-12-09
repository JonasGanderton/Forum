<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        .palette {
            /* Do not use this style, it is here temporarily so I can see the colours. */
            color: #081B33 #152642 #2F4562 #506680 #767D92 #353C51;
        }
        .main {
            color: #767D92;
            background-color: #081B33;
        }
        .postListItem {
            color: #B6BDC2;
            background-color: #2F4562;
            margin-left: 4%;
            margin-right: 4%;
        }

        a:link {
            color: #B6BDC2;
            text-decoration: none;
        }

        a:visited {
            color: #767D92;
            text-decoration: none;
        }

        a:hover {
            color: #abc3e3;
            background-color: #152642;
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
        <h1>
            <a href="{{ route('posts.index') }}">
            <span style="color:blue">Forum</span></a> - @yield('title')
        </h1>
        
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
