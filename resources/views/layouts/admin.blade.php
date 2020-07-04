<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SisCol</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
  <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="{{asset('index2.html')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SCo</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SisCol</b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Navegación</span>Sistema de Visualización y Seguimiento Academico</a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                aria-haspopup="true">
                 {{ Auth::user()->name }}<span class="caret"></span>
              </a>
              
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                  <p>
                  <small>D.N.I. : {{ Auth::user()->DNI }}</small>
                  <small>Tipo de usuario : {{ Auth::user()-> TIPOUSU }}</small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                      class="btn btn-default btn-flat">Cerrar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
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
        @if(Auth::user()->TIPOUSU == 'superadmin'){
        <ul class="sidebar-menu">
          <li class="header"></li>

          <li class="treeview active">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Colegios</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu active">
              <li><a href="{{url('colegio/anescolar')}}"><i class="fa fa-circle-o"></i>Años Escolares</a></li>
              <li><a href="{{url('colegio/instituciones')}}"><i class="fa fa-circle-o"></i> Instituciones</a></li>
              <li><a href="{{url('personaldocente/docentes')}}"><i class="fa fa-circle-o"></i>Docentes</a></li>
              <li><a href="{{url('distribucionacademica/alumnos')}}"><i class="fa fa-circle-o"></i><button class="btn btn-link">Alumnos</button></a></li>
            
            </ul>
            <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Acceso</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <form class="form-horizontal" method="GET" action="{{ route('registrare') }}">
                        {{ csrf_field() }}
              <li><a><i class="fa fa-circle-o"></i><button class="btn btn-link">Nuevo Usuario</button></a></li>  </form>
              <form class="form-horizontal" method="GET" action="{{ route('usuario.index') }}">
                        {{ csrf_field() }}
              <li><a><i class="fa fa-circle-o"></i><button class="btn btn-link">Usuarios</button></a>
              </li></form>

            </ul>
          </li>
        }@else
        @if(Auth::user()->TIPOUSU == 'admincol')
        <ul class="sidebar-menu">
          <li class="header"></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Colegios</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li>{{Form::Open(array('action'=> array('NivelController@index','null','null',Auth::user()->colegioadmin),'method'=>'POST'))}}
                {{ csrf_field() }}<a> <i class="fa fa-circle-o"></i>

                  <button class="btn btn-link ">Nivel Educativo</button></a>
                {{Form::close()}}
              <li>
            </ul>
          </li>

          <li class="treeview active">
            <a href="#">
              <i class="fa fa-th"></i>
              <span>Distribución De Aulas</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li>
                {!! Form::open(['route' => ['grado.index','null',Auth::user()->colegioadmin],
                'method' => 'POST']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Grados de Estudios
                </button>
                {!! Form::close() !!}</a></li>

              <li>
                {!! Form::open(['route' => ['secciones.index','null',Auth::user()->colegioadmin,'null','null'],
                'method' => 'POST']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Secciones
                </button>
                {!! Form::close() !!}</a></li>
            </ul>
          </li>
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Distribución Académica</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li>
                {!! Form::open(['route' => ['cursos.index','null',Auth::user()->colegioadmin,'null','null'],
                'method' => 'POST']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Cursos
                </button></a>
                {!! Form::close() !!}</li>
                <li>
                {!! Form::open(['route' => ['detallecursos.index','null','null',Auth::user()->colegioadmin,'null','null'],
                'method' => 'POST']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Asignación de Cursos
                </button>
                {!! Form::close() !!}</li></a>
              <li><a href="{{url('distribucionacademica/alumnos')}}"><i class="fa fa-circle-o"></i><button class="btn btn-link">Alumnos</button></a></li>
            
              <li>
                {!! Form::open(['route' => ['matriculas.index',Auth::user()->colegioadmin],
                'method' => 'POST']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Matrículas
                </button>
                {!! Form::close() !!}</a></li>
            </ul>
          </li>
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Personal Docente</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('personaldocente/docentes')}}"><i class="fa fa-circle-o"></i>Docentes</a></li>
              <li> {!! Form::open(['route' => ['contrato.index',Auth::user()->colegioadmin],
                'method' => 'GET']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Contratos
                </button>
                {!! Form::close() !!}</a></li>
            </ul>
          </li>
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Acceso</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu active">
            <form class="form-horizontal" method="GET" action="{{ route('registrare') }}">
                        {{ csrf_field() }}
              <li><a><i class="fa fa-circle-o"></i><button class="btn btn-link">Nuevo Usuario</button></a></li>  </form>
              <form class="form-horizontal" method="GET" action="{{ route('usuario.index') }}">
                        {{ csrf_field() }}
              <li><a><i class="fa fa-circle-o"></i><button class="btn btn-link">Usuarios</button></a>
              </li></form>

            </ul>
          </li>
          @else
          <ul class="sidebar-menu">
          <li class="header"></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Modulos</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li>{{Form::Open(array('action'=> array('NotaController@vistaprincipaldocente',Auth::user()->DNI),'method'=>'POST'))}}
                {{ csrf_field() }}<a> <i class="fa fa-circle-o"></i>

                  <button class="btn btn-link ">Soy Docente</button></a>
                {{Form::close()}}
              <li>
              {!! Form::open(['route' => ['apoderado.inicio'],
                'method' => 'GET']) !!}<a> <i class="fa fa-circle-o"></i>
                <button class="btn btn-link">
                  Ver notas de alumnos
                </button></a>
                {!! Form::close() !!}</li>


            </ul>
           
          </li>

          @endif
          @endif
          <!-- <li>
            <a href="#">
              <i class="fa fa-plus-square"></i> <span>Ayuda</span>
              <small class="label pull-right bg-red">PDF</small>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
              <small class="label pull-right bg-yellow">IT</small>
            </a>
          </li>
      !-->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>





    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">SIVISEAC</h3>
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
    </div><!-- /.col -->
  </div><!-- /.row -->

  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <script>
  $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
 });</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{asset('js/alumnodecurso.js')}}"></script>
  <script src="{{asset('js/matricula.js')}}"></script>
  <script src="{{asset('js/seccion.js')}}"></script>
  <script src="{{asset('js/idcurso.js')}}"></script>
  <script src="{{asset('js/cursos.js')}}"></script>
  <script src="{{asset('js/idgrado.js')}}"></script>
  <script src="{{asset('js/contrato.js')}}"></script>
  <script src="{{asset('js/colegio.js')}}"></script>
  <script src="{{asset('js/detallecurso.js')}}"></script>
  <script src="{{asset('js/nivel.js')}}"></script>
  <script src="{{asset('js/anescolar.js')}}"></script>
  <script src="{{asset('js/idsecciones.js')}}"></script>
  <script src="{{asset('js/asignaciondecurso.js')}}"></script>
  <script src="{{asset('js/grados.js')}}"></script>
  <!-- jQuery 2.1.4 -->
  <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>