<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.header')
    <link rel="icon" type="image/png" href="{{ asset('icono.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black-light sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            @include('layouts.partials.logo')
            <!-- Header Navbar -->
            @include('layouts.partials.navbar-header')
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            @include('layouts.partials.navbar-sider')
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('head-content')
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                @include('layouts.partials.notificacion')
                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Footer content -->
        @include('layouts.partials.footer')
        <!-- Ayuda content -->
        @include('layouts.partials.help')
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    @include('layouts.partials.scripts')
    @yield('javascript')
</body>
</html>