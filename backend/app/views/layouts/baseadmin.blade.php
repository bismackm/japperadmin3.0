<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js sidebar-large"> <!--<![endif]-->

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    @section('title') 
        <title>Eventos</title>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="icon" type="image/png" href="<?php echo URL::to('favicon.png'); ?>" />
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="{{URL::to('/')}}/assets/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/animations.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/plugins.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/style.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/plugins/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet">
        <!-- END  MANDATORY STYLE -->
    <script src="{{URL::to('/')}}/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- MODAL STYLE -->
    <link href="{{URL::to('/')}}/assets/plugins/modal/css/component.css" rel="stylesheet">
    <!-- UPLOAD STYLE -->
    <link href="{{URL::to('/')}}/assets/plugins/bootstrap-upload/fileinput.css" rel="stylesheet">
    <!--EDITOR-->
    <script src="{{URL::to('/')}}/assets/plugins/cheditor/ckeditor.js"></script>
    
    <!-- END PAGE LEVEL STYLE -->
    @yield('head')

</head>

<body data-page="blank_page" host="{{URL::to('/')}}">
    <!-- BEGIN TOP MENU -->
<div id="messages">
</div>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="menu-medium" class="sidebar-toggle tooltips">
                    <i class="fa fa-outdent"></i>
                </a>
<!--                 <a class="navbar-brand" href="{{URL::to('/')}}" target="blank">
                    <img src="{{URL::to('/')}}/images/logo.jpg" alt="logo" width="79" height="26">
                </a> -->
            </div>
            <div class="navbar-center">Administración</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            @if( Session::get('user_foto')!='' )
                                <img src="{{URL::to('/')}}/assets/img/usuarios/{{ Session::get('user') }}/{{Session::get('user_foto')}}" alt="{{Session::get('user_responsable')}}" height="25" width="30" class="p-r-5" id="user_foto">
                            @else
                                <img src="{{URL::to('/')}}/assets/img/usuarios/default.png" width="30" class="p-r-5">
                            @endif
                            <span class="username">{{Session::get('user_responsable')}}</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
{{--                            <li>--}}
{{--                                <a class="btn-effect" data-modal="modal-general" onclick="usuario.profile();">--}}
{{--                                    <div class="livicon" data-n="user" data-s="16"> Mi Perfil</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li>
                                <a class="btn-effect" data-modal="modal-general" onclick="usuario.password();">
                                    <div class="livicon" data-n="gears" data-s="16"> Contraseña</div>
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
                              <a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
                                <i class="glyph-icon flaticon-fullscreen3"></i>
                              </a>
                              <a href="{{URL::to('/administration')}}" title="Pantalla de bloqueo">
                                <i class="glyph-icon flaticon-padlock23"></i>
                              </a>
                              <a href="{{URL::to('/salir')}}" title="Cerrar Sesión">
                                <i class="fa fa-power-off"></i>
                              </a>
                            </li>
                        </ul>
                    </li>

                    <!-- END USER DROPDOWN -->
                </ul>

            </div>

        </div>

    </nav>
    <!-- END TOP MENU -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <li>
                        <br>
                        <center>
                            <img src="{{URL::to('/')}}/assets/img/logo.png" class="p-r-5" height="105>">
                        </center>
                        <br>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-edit"></i>
                            <span class="sidebar-text">Gestor</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="{{ URL::to('/admin') }}"><span class="sidebar-text">Compradores</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="glyph-icon flaticon-settings21"></i>
                            <span class="sidebar-text">Configuración</span>
                            <span class="fa arrow"></span>
                        </a>
                          <ul class="submenu collapse">
                            <li>
                                <a href="javascript:void(0)" data-modal="modal-general" onclick="usuario.password()"><span class="sidebar-text">Cambiar Contraseña</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{URL::to('/')}}" target="_blank">
                            <i class="glyph-icon flaticon-frontend"></i>
                            <span class="sidebar-text">Página Web</span>
                        </a>
                    </li>

                </ul>

            </div>

        </nav>



        <!-- END MAIN SIDEBAR -->
        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">

            @yield('content')

            <!-- MODAL - the overlay elements -->
            <div id="content-modal"></div>
            <!-- MODAL - the overlay elements -->

        </div>
        <!-- END MAIN CONTENT -->

    </div>

    <!-- END WRAPPER -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="{{URL::to('/')}}/assets/plugins/jquery-1.11.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/icheck/icheck.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/nprogress/nprogress.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/charts-sparkline/sparkline.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/breakpoints/breakpoints.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/numerator/jquery-numerator.js"></script>

    <script src="{{URL::to('/')}}/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/datatables/dynamic/jquery.dataTables.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/datatables/dataTables.tableTools.js"></script>
    <script src="{{URL::to('/')}}/assets/js/table_dynamic.js"></script>

    <!-- END MANDATORY SCRIPTS --> 
    <script src="{{URL::to('/')}}/assets/js/application.js"></script>
    <!-- Upload -->
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap-upload/fileinput.js"></script>
    <!-- Modales -->
    <script src="{{URL::to('/')}}/assets/plugins/modal/js/classie.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/modal/js/modalEffects.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/happy/happy.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/happy/happy.methods.js"></script>
    <!-- Modulo Admin Generales -->
    <script src="{{URL::to('/')}}/assets/js/modules/usuario.js"></script>

    <script src="{{URL::to('/')}}/assets/plugins/mustache/mustache.js"></script>
    <script src="{{URL::to('/')}}/assets/js/general.js"></script>

    <script src="{{URL::to('/')}}/assets/js/modules/album.js"></script>

    @yield('code_footer')

</body>
</html>