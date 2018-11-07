<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name', 'Laravel') }} | @yield('title','Inicio')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.0 -->
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<!-- Google Font -->
	<link rel="stylesheet" href="{{ asset('fonts/SourceSansPro/fonts.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('adminLTE/css/AdminLTE.min.css') }}">
	<!-- iCheck -->
	<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition login-page">
	
	@yield('content')


<!-- jQuery 2.1.4 -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>

</html>
