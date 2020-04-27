<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script>
    window.App = {
        errors: {!! json_encode($errors->toArray()) !!},
        miusuario: {!! json_encode(auth()->user()) !!}
    }
</script>
</head>

<body class="hold-transition sidebar-mini">
<div id="app">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" ><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                </li>
                <li class="nav-item">

                    <a class="nav-link text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">        
                        {{ __('Salir') }}<i class="fa fa-sign-out"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="img/zoom.png" alt="Zoom" class="brand-image img-circle elevation-1" style="opacity: .7">
                <span class="brand-text font-weight-light">Zoom</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        @can('products.index')
                        <li class="nav-item">
                            <router-link  class="nav-link" 
                                :to="{name: 'components'}">
                                <i class="nav-icon fa fa-archive"></i>
                                <p>Productos</p>
                            </router-link>
                        </li>
                        @endcan
                        @can('users.index')
                        <li class="nav-item">
                            <router-link  class="nav-link" 
                                :to="{name: 'users'}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Usuarios</p>
                            </router-link>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item">
                            <router-link  class="nav-link" 
                                :to="{name: 'roles'}">
                            <i class="nav-icon fa fa-wrench"></i>
                                <p>Roles</p>
                            </router-link>
                        </li>
                        @endcan
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                    Consultar
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <router-link  class="nav-link" 
                                :to="{name: '#'}">
                                <i class="nav-icon fa fa-wrench"></i>
                                    <p>Guia/Cliente/Casillero</p>
                                    <span class="right badge badge-danger">Nuevo</span>
                                </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                    Administración
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: '#'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Registrar Casillero por Archivo</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: '#'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Inicializar Rangos de Prepagadas</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'menu-adm-act-adm'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Actualización Administrativa</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'menu-adm-not-pag'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Notificaciones de Pagos</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                    Operaciones &nbsp;
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'liquidar'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Liquidar</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: '#'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Modificar Mensajerias (Entregas y Recolectas)&nbsp;</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'ope-adm-war'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Administración del Warehouse&nbsp;</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'ope-zon-no-ser'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Zonas No Servidas</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'ope-saliendo'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Saliendo</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    Reportes
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'reporte-ope'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Operaciones</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'reporte-adm'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Administración</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'reporte-ges-cal'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Gestión de Calidad</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'reporte-mov'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Movimientos</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: 'rep-ope-wer'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Reportes wherehouse</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-tree"></i>
                                <p>
                                Contingencia
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: '#'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Carga de data Syncher</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: '#'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Maestros y Tarifas</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  class="nav-link" 
                                    :to="{name: '#'}">
                                    <i class="nav-icon fa fa-wrench"></i>
                                    <p>Envios Entrando por Oficina</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Mas opciones pronto</li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header"></div>
                <!-- Content Header (Page header)
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Titulo principal</h1>
                            </div>
                        </div>
                    </div>
                </div>  -->
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <router-view></router-view>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </section>
            </div><!-- /.container-fluid -->
        <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 Zoom.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
</div>
    <script src="js/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.js"></script>
</body>

</html>
