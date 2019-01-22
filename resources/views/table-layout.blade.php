<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>{{config('constants.site_name')}} | Admin</title>

        <link rel='stylesheet' href='/css/bootstrap.min.css'>
        <link href="/css/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="/css/AdminLTE.min.css" rel="stylesheet">
        <link href="/css/_all-skins.min.css" rel="stylesheet">
        <style>
            /*body {
                margin-top: 5%;
            }*/
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        @yield('content')
        </div>
          
                <!-- jQuery 3 -->
        <script src="/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script> 
        <script src="/js/adminlte.min.js"></script>
    </body> 
</html>
