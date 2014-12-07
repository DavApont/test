<!DOCTYPE html>
<html>
<head>
  <title>@yield('title', 'Sistema de Control De Insumos Hospitalario')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- Bootstrap --}}
  {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/css/custom.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/css/font-awesome.min.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/jquery-ui/css/ui-lightness/jquery-ui.min.css', array('media' => 'screen')) }}

  {{ HTML::script('assets/js/jquery-1.10.2.js') }}
  {{ HTML::script('assets/jquery-ui/js/jquery-ui.min.js') }}
  {{HTML::script('assets/js/combosEstadosMunicipiosParroquias.js')}}
  {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
<!--[if lt IE 9]>
{{ HTML::script('assets/js/html5shiv.js') }}
{{ HTML::script('assets/js/respond.min.js') }}
<![endif]-->
@section('javascript')
  <script type="text/javascript">
  $(document).ready(function(){
    comboMunicipio("{{url('municipios')}}");
    comboParroquia("{{ url('parroquias') }}");
  });
  </script>
@show

</head>
<body>
  {{-- Wrap all page content here --}}

  <div id="wrap">
    {{-- Begin page content --}}
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-navbar">
          <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('')}}">{{ HTML::image('assets/images/gobyaracuy.png', $alt="DRCSports", $attributes = array()) }} Insumos Hospitalario</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Desplegable <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Link</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Link</a></li>
                    </ul>
                  </li>
                </ul>
                <!--<form class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                  </div>
                  <button type="submit" class="btn btn-default">Busqueda Rapida</button>
                </form>-->
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Wilmar Linarez <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Editar Perfil</a></li>
                      <li><a href="#">Cambiar Clave</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Salir</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <div class="container menuV">
      <div class="row">
        <div class="row-content">
          <div class="col-sm-3 col-menuV">
            <div class="panel-group list-group" id="accordion1">
              <a href="{{ url('/pacientes')}}" class="itemMenuV list-group-item">Pacientes</a>
              <!--<a href="casos" class="itemMenuV list-group-item active">Activo Primer Item</a>-->
              <a href="{{ url('casos') }}" class="itemMenuV list-group-item"> Casos</a>
 		<div class="panel panel-default">
                <a class="panel-heading itemMenuV collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                  <span class="accordion-toggle">Busquedas</span>
                </a>
                <div class="panel-collapse collapse" id="collapse1">
                  <div class="list-group">
                    <a href="{{ url('busquedaservicio') }}" class="itemMenuV list-group-item">Busqueda Por Servicios</a>
                    <a href="#" class="itemMenuV list-group-item">Activo Segundo Subitem</a>
                    <a href="#" class="itemMenuV list-group-item">Segundo Subitem</a>
                    <a href="#" class="itemMenuV list-group-item">Segundo Subitem</a>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <a class="panel-heading itemMenuV collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse2">
                  <span class="accordion-toggle">Ejemplos</span>
                </a>
                <div class="panel-collapse collapse" id="collapse2">
                  <div class="list-group">
                    <a href="{{ url('ejemplo') }}" class="itemMenuV list-group-item">Form</a>
                    <a href="#" class="itemMenuV list-group-item">Activo Segundo Subitem</a>
                    <a href="#" class="itemMenuV list-group-item">Segundo Subitem</a>
                    <a href="#" class="itemMenuV list-group-item">Segundo Subitem</a>
                  </div>
                </div>
              </div>
              <a href="#" class="itemMenuV list-group-item"><span class="badge">12</span> Mensajes</a>
            </div>
          </div>
          <div class="col-sm-9">
            <ol class="breadcrumb">
              <li><a href="#">Inicio</a></li>
              <li><a href="#">Paciente</a></li>
              <li class="active">Ingresar</li>
            </ol>
            <div class="content">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
 {{--{{ HTML::script('assets/js/jquery.min.js') }}--}}
  {{-- Include all compiled plugins (below), or include individual files as needed --}}
  {{ HTML::script('assets/js/bootstrap.min.js') }}
</body>
</html>
