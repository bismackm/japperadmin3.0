<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>JApperAdmin v3.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="{{URL::to('/')}}/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/plugins.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/style.min.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="{{URL::to('/')}}/assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="{{URL::to('/')}}/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="{{URL::to('/')}}/assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="{{URL::to('/')}}" target="_blank">
                            <img src="{{URL::to('/')}}/assets/img/account/login-logo.png" alt="Company Logo">
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                    @if(Session::get('error')!='')
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            {{Session::get('error')}}
                        </div>
                        {{Session::forget('error')}}
                    @endif
                    @if(Session::get('check')!='')
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Listo!</h4>
                            {{Session::get('check')}}
                        </div>
                        {{Session::forget('check')}}
                    @endif
                        <!-- END ERROR BOX -->
                        <form action="{{URL::to('/login')}}" method="post">
                            <input type="email" name="user" placeholder="@mail" class="input-field form-control user" required/>
                            <input type="password" name="pass" placeholder="Contraseña" class="input-field form-control password"  required/>
                            <button type="submit" class="btn btn-login">Ingresar</button>
                        </form>
                        <div class="login-links">
                            <a href="{{URL::to('/recuperar-cuenta-admin')}}">¿Olvidaste la Clave?</a>
                        </div>
                    </div>
                </div>
                <div class="social-login row">
                    <div class="fb-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-facebook btn-block"><strong>Facebook</strong></a>
                    </div>
                    <div class="twit-login col-lg-6 col-md-12 animated flipInX">
                        <a href="{{URL::to('/')}}" class="btn btn-twitter btn-block"><strong>Frontend</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOCKSCREEN BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="{{URL::to('/')}}/assets/plugins/jquery-1.11.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{URL::to('/')}}/assets/plugins/backstretch/backstretch.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/account.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
