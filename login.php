<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>TecnoMarket-Login</title>

  <!-- Favicons -->
  <link href="images/favicon.png" rel="icon">
  <link href="images/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/css_v2/style.css" rel="stylesheet">
  <link href="css/css_v2/style-responsive.css" rel="stylesheet">
  
  <!--internal css-->
  <link rel="stylesheet" href="css/globales.css" />
  
 
</head>

<body>


 <div id="login-page">
    <div class="container">
      <form class="form-login" id="form1" name="form1"  method="post" action="index.php" >
        <h2 class="form-login-heading">Iniciar Sesión</h2>
        <div class="login-wrap">
          <input id="username" name="username" type="text" class="form-control" placeholder="User ID" autofocus>
          <br>
          <input id="passwort" name="passwort" type="password" class="form-control" placeholder="Password">
         
          <br>



          <button class="btn btn-theme btn-block"  id="btn_ingresa"  name="btn_ingresa" type="submit" value="Iniciar Sesión" ><i class="fa fa-lock"></i> Iniciar Sesión</button>
          <hr>

          <?php 

            if (isset($_SESSION['mensaje_id']) == null)
            {
              $p_mensaje = "";
              $p_codigorpt = "";
            }
            else
            {
              $p_mensaje = $_SESSION['mensaje'];
              $p_codigorpt = $_SESSION['mensaje_id'];             
            }

              if ($p_mensaje <> "" )
              {  
                if ($p_codigorpt == '0')
                {
            ?>
                    <div class="mensaje-exitoso">
                        <?php  print_r($p_mensaje);  ?>
                    </div>
            <?php 
                }else
                {
            ?>
                  <div class="mensaje-alerta">
                      <?php  print_r($p_mensaje);  ?>
                  </div>              
            <?php
                }
              }
            ?>   

          <!--
          <div class="registration">
            ¿Aún no tienes una cuenta?<br/>
            <a class="" href="#">
              Crea una cuenta
              </a>
          </div>
          -->
        </div>

      
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("images/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
