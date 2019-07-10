<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOYOTER | REPUESTOS TOYOTA, MARCAS JAPONESAS y COREANAS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
    <!-- Bootstrap Select -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset('css/font-awesome.css')}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset('css/AdminLTE.min.css')}}>

    <link rel="stylesheet" href={{asset('css/_all-skins.min.css')}}>
    <link rel="apple-touch-icon" href={{asset('img/apple-touch-icon.png')}}>
    <link rel="shortcut icon" href={{asset('favicon/favicon.ico')}}>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/home" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>T</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>TOYOTER</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <small class="bg-red">Online</small>
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                <p>
                                    {{--www.incanatoit.com - Desarrollando Software--}}
                                    {{--<small>www.youtube.com/jcarlosad7</small>--}}
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    {{--<a href="{{route('/logout')}}" class="btn btn-default btn-flat">Cerrar</a>--}}
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"></li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-folder-open'></i> <span>Repuestos</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('repuesto/create') }}">Cargar Repuestos</a></li>
                        {{--<li><a href="{{ url('repuesto/actualizar') }}">Acualizar Repuestos</a></li>--}}
                    </ul>
                </li>
                <li class="treeview">
                    <a><i class='fa fa-link'></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('cliente') }}">Listar Clientes</a></li>
                        <li><a href="{{ url('cliente/create') }}">Cargar Cliente</a></li>
                        <li><a href="{{ url('cliente/listsincategorizar') }}">Activar Clientes</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i> <span>Precios</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('precio/create') }}">Cargar Precios</a></li>
                        {{--<li><a href="{{ url('ventas/venta?daterange') }}">Venta</a></li>--}}
                        {{--<li><a href="{{ url('ventas/venta/create') }}">Facturación</a></li>--}}
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i> <span>Presupuestos</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('presupuesto') }}">Listar Presupuestos</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{ url('admin/edit') }}"><i class='fa fa-link'></i> <span>ADMINISTRADOR</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!--Contenido-->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sistema de Repuestos</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Contenido-->
                                    @yield('contenido')
                                    <!--Fin Contenido-->
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div>
    <!--Fin-Contenido-->
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.19.3
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Alejandro Colautti</a>.</strong> Todos los derechos reservados.
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script>
    $('#lfm').filemanager('image');
</script>
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">


@stack('scripts')

<script src={{asset('js/bootstrap.min.js')}}></script>
<!-- AdminLTE App -->
<script src={{asset('js/app.min.js')}}></script>



</body>
</html>
