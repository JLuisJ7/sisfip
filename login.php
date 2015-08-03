<?php $ruta ="themes/classic";?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CERTIPETRO | Ingreso</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo $ruta;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $ruta;?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo $ruta;?>/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Certipetro</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos para iniciar sesion</p>
        <form action="index.php?r=login/AuthenticationUser" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="username" placeholder="Usuario" name="username" 
            value="<?php if( !empty($_GET['l'])){ echo $_GET['l'];} ?>"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Recuerdame
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" id="btnIngresar" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>
        <div style="width:100%; text-align: center;margin-top:5px;color: #900000; font-size: 14px;"><?php if( !empty($_GET['message'])){ echo $_GET['message'];} ?></div>
        <div class="social-auth-links text-center">
          <p>- O -</p>
          <!-- <a href="registrar.php" class="btn btn-block btn-social btn-facebook btn-flat">Registrarse</a>
 -->          
        </div><!-- /.social-auth-links -->

        <!-- <a href="#">Recuperar mi contraseña</a><br> -->
        <!--a href="register.html" class="text-center">Register a new membership</a-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo $ruta;?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $ruta;?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo $ruta;?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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

<script>
  $("#btnIngresar").click(function(event) {
    console.log("dd");
      var username=$("#username").val();
      var password=$("#password").val();
      
      $.ajax({
        url: 'index.php?r=login/AjaxAuthenticationUser',
        type: 'POST',     
        data: {
          username: username,
          password: password
        },
      })
      .done(function(response) {
        console.log(response);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
  });
</script>