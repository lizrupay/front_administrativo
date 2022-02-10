<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actel</title>
   
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

        $p_codigo 			= '';
        $p_num_doc      = '';
        $p_nombre 			= '';
        $p_direccion    = '';

        $p_contacto 		= '';
        $p_correo       = '';
        $p_telefono     = '';
        
        $p_estado = '';
      
    

        $p_mensaje 			= '';

        $p_codigorpt    = '';
        $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

        If ($pboton)
        {

          $p_codigo 			       = '';
          $p_num_doc             = stripslashes($_POST['num_doc']);
          $p_nombre 		         = stripslashes($_POST['nombre']);
          $p_direccion           = stripslashes($_POST['direccion']);
          $p_contacto 		       = stripslashes($_POST['contacto']);
          $p_correo		           = stripslashes($_POST['correo']);
          $p_telefono            = stripslashes($_POST['telefono']);
          
                  
          $p_estado              = stripslashes($_POST['estado']);

         
          // Adicionar el registro
          
          $postData = array(
            'proveedor_id' => $p_codigo,
            'ruc' => $p_num_doc,
            'nombre_empresa' => $p_nombre,
            'direccion' => $p_direccion,
            'contacto' => $p_contacto,
            'correo' => $p_correo,
            'telefono' => $p_telefono,
            'estado' => $p_estado
 
            );          
            
 
          $objDB = new db_model();

          $p_rptJson = $objDB->proveedor_registrar($postData);


          $p_adicionarCliente = json_decode($p_rptJson, true);

          $p_codigorpt    = $p_adicionarCliente['mensaje_id'];
          $p_mensajerpt   = $p_adicionarCliente['mensaje'];
          $p_mensaje 			= $p_mensajerpt;


          if ($p_codigorpt == 0)
          {
            // proceso OK

              $p_num_doc      = '';
              $p_nombre 			= '';
              $p_direccion    = '';

              $p_contacto 		= '';
              $p_correo       = '';
              $p_telefono     = '';
              
              $p_estado = '';

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
          <h1 class="agregar__titulo">Agregar Proveedor</h1>
          <div class="formulario-agregar">  
            <form action="vista-agregar.php?token=<?php echo encriptar_parametro("3|2"); ?>" method="POST">
             <section class="formulario-agregar-grid">

                <label for="num_doc">
                    <span>Nro. de Documento</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="num_doc"
                      id="num_doc"
                      value="<?php echo $p_num_doc; ?>"
                      placeholder="Nro. de Documento"
                      minlength="2"
                      maxlength="11"
                      
                    />
                </label>


                <label for="nombre">
                    <span>Nombre</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="nombre"
                      id="nombre"
                      value="<?php echo $p_nombre; ?>"
                      placeholder="Nombre"

                      minlength="2"
                      maxlength="124"
                      
                    />
                </label>

              
                <label for="direccion">
                    <span>Dirección</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="direccion"
                      id="direccion"
                      value="<?php echo $p_direccion; ?>"
                      placeholder="Dirección"
                      minlength="2"
                      maxlength="128"
                      
                    />
                </label>


                <label for="contacto">
                    <span>Contacto</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="contacto"
                      id="contacto"
                      value="<?php echo $p_contacto; ?>"
                      placeholder="Contacto"
                      minlength="2"
                      maxlength="64"
                      
                    />
                </label>
                
                
                <label for="correo">
                    <span>Correo</span>
                    <input
                      type="email"
                      class="formulario-agregar__input"
                      name="correo"
                      id="correo"
                      value="<?php echo $p_correo; ?>"
                      placeholder="correo"
                      minlength="2"
                      maxlength="64"
                      
                    />
                </label>

                <label for="telefono">
                    <span>Telefóno</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="telefono"
                      id="telefono"
                      value="<?php echo $p_telefono; ?>"
                      placeholder="Telefóno"

                      
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
     
                      
                    />
                </label>

              </section>
             

              <section class="formulario-agregar-boton">
                <a href="vista-listar.php?token=<?php echo encriptar_parametro("3|2"); ?>" class="boton boton-retornar">Retornar</a>
                <input class="boton" type="submit" name="boton_guardar" id="" value="Agregar" />
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
