<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actel</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/globales.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/main-contenedor.css" />
    <link rel="stylesheet" href="css/vista-agregar.css" />

    <script
      src="https://kit.fontawesome.com/1ab79fe3ab.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400&amp;display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Header -->
    <?php include 'componentes/header.php'; ?>
    <!-- Sidebar -->
    <?php include 'componentes/sidebar.php'; ?>
    <?php //include 'componentes/seguridad.php'; ?> 

    <!-- conexion db-api -->
    <?php //include 'dbapi/api_model.php'; ?>
    <?php include 'db/db_model.php'; ?>
    
    <!-- Guardar Información -->

    <?php 

        $p_nombre 			= '';
        $p_estado 			= '';

        $p_mensaje 			= '';


        $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

        If ($pboton)
        {


         

          $p_nombre 			= stripslashes($_POST['nombre']);
          $p_estado 			= stripslashes($_POST['estado']);

          // Adicionar el registro
          
          $postData = array(
            'tipocomprobante_id' => '',
            'descripcion' => $p_nombre,
            'imagen' => '',
            'estado' => $p_estado
            );          


          $objDB = new db_model();

          $p_rptJson = $objDB->tipocom_registrar($postData);


          $p_adicionarTipocom = json_decode($p_rptJson, true);

          $p_codigorpt    = $p_adicionarTipocom['mensaje_id'];
          $p_mensajerpt   = $p_adicionarTipocom['mensaje'];
          $p_mensaje 			= $p_mensajerpt;

          if ($p_codigorpt == 0)
          {
            // proceso OK

            $p_nombre 			= '';
            $p_estado 			= '';

          }else
          {
            // error en la información enviada.
            $p_mensaje 			= $p_mensajerpt;


          }

        }
    ?>
    <!-- Main contenedor -->
    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="agregar">
          <h1 class="agregar__titulo">Agregar Tipo Comprobante</h1>
          <div class="formulario-agregar">  
            <form action="vista-agregar.php?token=<?php echo encriptar_parametro("1|5"); ?>" method="POST">
            <section class="formulario-agregar-grid">

              <label for="nombre">
                  <span>Nombre</span>
                  <input
                    type="text"
                    class="formulario-agregar__input"
                    name="nombre"
                    id="nombre"
                    value="<?php echo $p_nombre; ?>"
                    placeholder="Nombre"
                    minlength="1"
                    maxlength="64"
                    
                  />
              </label>

              <label for="estado">
                  <span>Estado</span>
                  <input
                    type="text"
                    class="formulario-agregar__input"
                    name="estado"
                    id="estado"
                    value="<?php echo $p_estado; ?>"
                    placeholder="Estado"
                    minlength="1"
                    maxlength="2"
                    
                  />
              </label>
            </section>
            <section class="formulario-agregar-boton">
              <a href="vista-listar.php?token=<?php echo encriptar_parametro("1|5"); ?>" class="boton boton-retornar">Retornar</a>
              <input class="boton-agregar boton" type="submit" name="boton_guardar" id="" value="Agregar" />
            </section> 
            </form>

            <?php if ($p_mensaje <> "" )
            {  
              if ($p_codigorpt == '0')
              {
              ?>
                  <div class="mensaje-exitoso">
                  <i class="fas fa-check-square"></i>
                      <?php  print_r($p_mensaje);  ?>
                  </div>
            <?php 
              }else
              {
            ?>
                <div class="mensaje-alerta">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?php  print_r($p_mensaje);  ?>
                </div>              
            <?php
              }
              }
            ?>

          </div>
    
        </section>
         <!--FIN de Contenido interior variable -->
      </div>
    </main>
    <!-- FIN Main contenedor -->
    <footer></footer>
    <!-- Script -->
    <script src="js/menu.js"></script>
  </body>
</html>
