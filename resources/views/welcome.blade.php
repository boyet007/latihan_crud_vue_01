<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <style>
            html, body {

                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

        </style>
    </head>
    <body >
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <router-link to="/" class="navbar-brand">Laravel Vue Js</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <router-link to="/example">Example</router-link>
        <router-link to="/sample">Sample</router-link>
      </li>
      
  </div>
</nav>
    <router-view></router-view>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
