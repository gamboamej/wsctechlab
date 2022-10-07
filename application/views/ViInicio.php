<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Documentos - techlab </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="<?php base_url();?>web/Dark-Admin-Bootstrap-4/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php base_url();?>web/Dark-Admin-Bootstrap-4/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php base_url();?>web/Dark-Admin-Bootstrap-4/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php base_url();?>web/img/logo-techlab-32x32.png">
    <link rel="icon" href="<?php base_url();?>web/img/logo-techlab-32x32.png" sizes="32x32">
    <link rel="icon" href="<?php base_url();?>web/img/logo-techlab-180x180.png" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php base_url();?>web/img/logo-techlab--192x192.png">
      <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.css">
    <script type="text/javascript">var baseurl = '<?php base_url();?>'; //home de la web</script>
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Documentos - techlab</h1>
                  </div>
                  <p>Portal de descarga de documentos.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="get" class="form-validate" id="frmingreso">
                  <input type="hidden" name="tx_token" value="<?php echo $tx_token;?>">
                    <div class="form-group">
                      <input id="rutuser" type="text" name="rutuser" required data-msg="Please enter your username" class="input-material">
                      <label for="rutuser" class="label-material">RUT</label>
                    </div>
                    <div class="form-group">
                      <input id="rutuser-password" type="password" name="rutuser-password" required data-msg="Ingrese su contraseña" class="input-material">
                      <label for="rutuser-password" class="label-material">Contraseña</label>
                    </div><button id="login" class="btn btn-primary">Ingreso</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">Olvido su Contraseña?</a><br><small>Necesita una cuenta? </small><a class="signup">Registro</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
         <p>2022 &copy; TechLab. Todos los derechos reservados</p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Jquery-Validation -->
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/jquery-validation/additional-methods.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/vendor/sweetalert2/sweetalert2.min.js"></script>
    <!-- Front -->
    <script src="<?php base_url();?>web/Dark-Admin-Bootstrap-4/js/front.js"></script>
    <!-- IuViInicio -->
    <script src="<?php base_url();?>web/js/IuViInicio.js"></script>
</body>
</html>