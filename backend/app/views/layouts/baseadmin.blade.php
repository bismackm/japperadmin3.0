<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    @section('title') 
        <title>JApperAdmin v3.0</title> 
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="{{URL::to('/')}}/favicon.ico">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->

    <link href="{{URL::to('/')}}/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/plugins.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/style.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/plugins/font-awesome-animation/font-awesome-animation.min.css" rel="stylesheet">
        <!-- END  MANDATORY STYLE -->
    <script src="{{URL::to('/')}}/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- MODAL STYLE -->
    <link href="{{URL::to('/')}}/assets/plugins/modal/css/component.css" rel="stylesheet">
    <!-- UPLOAD STYLE -->
    <link href="{{URL::to('/')}}/assets/plugins/bootstrap-upload/fileinput.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    @yield('head')
</head>

<body data-page="blank_page">
    <!-- BEGIN TOP MENU -->
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
                <a class="navbar-brand" href="index.html">
                    <img src="{{URL::to('/')}}/assets/img/logo.png" alt="logo" width="79" height="26">
                </a>
            </div>
            <div class="navbar-center">JApperAdmin v3.0</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown" id="notifications-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="glyph-icon flaticon-notifications faa-ring animated-hover"></i>
                            <span class="badge badge-danger badge-header">6</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header clearfix">
                                <p class="pull-left">Notifications</p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list withScroll" data-height="220">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                                            Steve have rated your photo
                                            <span class="dropdown-time">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                                            John added you to his favs
                                            <span class="dropdown-time">15 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-file-text p-r-10 f-18"></i>
                                            New document available
                                            <span class="dropdown-time">22 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                            New picture added
                                            <span class="dropdown-time">40 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                                            Meeting in 1 hour
                                            <span class="dropdown-time">1 hour</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell p-r-10 f-18"></i>
                                            Server 5 overloaded
                                            <span class="dropdown-time">2 hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                                            Bill comment your post
                                            <span class="dropdown-time">3 hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                            New picture added
                                            <span class="dropdown-time">2 days</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="#" class="pull-left">See all notifications</a>
                                <a href="#" class="pull-right">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN MESSAGES DROPDOWN -->
                    <li class="dropdown" id="messages-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="glyph-icon flaticon-email"></i>
                            <span class="badge badge-primary badge-header">
                             8
                        </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header clearfix">
                                <p class="pull-left">
                                    Messages
                                </p>
                            </li>
                            <li class="dropdown-body">
                                <ul class="dropdown-menu-list withScroll" data-height="220">
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="{{URL::to('/')}}/assets/img/avatars/avatar3.png" alt="avatar 3">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>Alexa Johnson</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="{{URL::to('/')}}/assets/img/avatars/avatar4.png" alt="avatar 4">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>John Smith</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="{{URL::to('/')}}/assets/img/avatars/avatar5.png" alt="avatar 5">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>Bobby Brown</strong>  
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="{{URL::to('/')}}/assets/img/avatars/avatar6.png" alt="avatar 6">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>James Miller</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="mailbox.html" class="pull-left">See all messages</a>
                                <a href="#" class="pull-right">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END MESSAGES DROPDOWN -->

                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            @if( Session::get('user_foto')!='' )
                                <img src="{{URL::to('/')}}/assets/img/admin/{{ Session::get('user') }}/{{Session::get('user_foto')}}" alt="{{Session::get('user_nombre')}}" height="25" width="30" class="p-r-5">
                            @else 
                                <img src="{{URL::to('/')}}/assets/img/avatars/avatar12.png" width="30" class="p-r-5">
                            @endif
                            <span class="username">{{Session::get('user_nombre')}}</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="btn-effect" data-modal="modal-perfil" onclick="admin.modalPerfil();">
                                    <div class="livicon" data-n="user" data-s="16"> Mi Perfil</div>
                                </a>
                            </li>
                            <li>
                                <a class="btn-effect" data-modal="modal-perfil" onclick="admin.modalPerfil();">
                                    <div class="livicon" data-n="gears" data-s="16"> Configuración</div>
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
                              <a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
                                <i class="glyph-icon flaticon-fullscreen3"></i>
                              </a>
                              <a href="lockscreen.html" title="Pantalla de bloqueo">
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
                <!-- END TOP NAVIGATION MENU -->
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
                            @if( Session::get('user_foto')!='' )
                                <img src="{{URL::to('/')}}/assets/img/admin/{{ Session::get('user') }}/{{Session::get('user_foto')}}" alt="{{Session::get('user_nombre')}}" width="120" class="p-r-5">
                            @else 
                                <img src="{{URL::to('/')}}/assets/img/avatars/avatar12_big.png" class="p-r-5">
                            @endif
                        </center>
                        <br>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-frontend"></i><span class="sidebar-text">Módulos</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="#"><span class="sidebar-text">Modulo Blog</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="glyph-icon flaticon-ui-elements2"></i><span class="sidebar-text">Frontend</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="/"><span class="sidebar-text">Inicio</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Configuración</span><span class="fa arrow"></span></a>
                          <ul class="submenu collapse">
                            <li>
                                <a href="profil.html"><span class="sidebar-text">User Profile</span></a>
                            </li>
                            <li>
                                <a href="login.html"><span class="sidebar-text">Login</span></a>
                            </li>
                            <li>
                                <a href="signup.html"><span class="sidebar-text">Signup</span></a>
                            </li>
                            <li>
                                <a href="password_forgot.html"><span class="sidebar-text">Password recover</span></a>
                            </li>
                            <li>
                                <a href="lockscreen.html"><span class="sidebar-text">Lockscreen</span></a>
                            </li>
                            <li>
                                <a href="session_timeout.html"><span class="sidebar-text">Session Timeout</span></a>
                            </li>
                        </ul>
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
    <script src="{{URL::to('/')}}/assets/plugins/jquery-migrate-1.2.1.js"></script>
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
    <!-- TrulyIcons -->
    <!-- END MANDATORY SCRIPTS --> 
    <script src="{{URL::to('/')}}/assets/js/application.js"></script>
    <!-- Upload -->
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap-upload/fileinput.js"></script>
    <!-- Modales -->
    <script src="{{URL::to('/')}}/assets/plugins/modal/js/classie.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/modal/js/modalEffects.js"></script>
    <!-- Modulo Admin Generales -->
    <script src="{{URL::to('/')}}/assets/js/modules/admin.js"></script>
    <script src="{{URL::to('/')}}/assets/js/modules/usuario.js"></script>
</body>
</html>
