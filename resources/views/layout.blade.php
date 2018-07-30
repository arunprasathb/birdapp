<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>@yield('title') | Admin</title>

        <link rel='stylesheet' href='/css/bootstrap.min.css'>
        <link href="/css/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="/css/AdminLTE.min.css" rel="stylesheet">
        <link href="/css/_all-skins.min.css" rel="stylesheet">
        <style>
            /*body {
                margin-top: 5%;
            }*/
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        @yield('content')
        </div>
          
                <!-- jQuery 3 -->
        <script src="/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/adminlte.min.js"></script>
    </body> 
</html>
