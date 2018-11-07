<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ config('app.name', 'Laravel') }} | @yield('title','Inicio')</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Styles Bootstrap-->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.min.css') }}">
<!-- Google Font -->
<link rel="stylesheet" href="{{ asset('fonts/SourceSansPro/fonts.css') }}">
<!--DataTables-->
<link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- Theme style AdminLTE -->
<link rel="stylesheet" href="{{ asset('adminLTE/css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/css/skins/_all-skins.min.css') }}">
<!--Estilos cargados dinamicamente por otras vistas-->
@yield('css')
<!-- Estilos personalizados -->
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->



