<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('libs/font-awesome/css/all.css') }}">
    </head>

    <body>

        @include('header')

        @yield('content')

      
        
       
    </body>
    
</html>
