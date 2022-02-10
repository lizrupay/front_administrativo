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
    <link rel="stylesheet" href="css/vista-editar.css" />

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
    <?php // include 'dbapi/api_model.php'; ?>
    <?php include 'db/db_model.php'; ?>
    
    <!-- Guardar Información -->

    <?php 

        //$p_codigo 			= '';
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

              // esta registrando di aceptar

            
              $p_codigo 			       = stripslashes($_POST['codigo']);
              $p_num_doc             = stripslashes($_POST['num_doc']);
              $p_nombre 		         = stripslashes($_POST['nombre']);
              $p_direccion           = stripslashes($_POST['direccion']);
              $p_contacto 		       = stripslashes($_POST['contacto']);
              $p_correo		           = stripslashes($_POST['correo']);
              $p_telefono            = stripslashes($_POST['telefono']);
              
                      
              $p_estado              = stripslashes($_POST['estado']);

              // Editar el registro
              
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
                  
              echo "dato :".json_encode($postData)."<br>";

              $objDB = new db_model();

              $p_rptJson = $objDB->proveedor_editar($postData);


              $p_editarCategoria = json_decode($p_rptJson, true);

              $p_codigorpt    = $p_editarCategoria['mensaje_id'];
              $p_mensajerpt   = $p_editarCategoria['mensaje'];
              $p_mensaje 			= $p_mensajerpt;

              if ($p_codigorpt == 0)
              {
                // proceso OK

                $p_codigo 			= '';
                $p_nombre 			= '';
                $p_estado 			= '';

              }else
              {
                // error en la información enviada.
                $p_mensaje 			= $p_mensajerpt;


              }

        } else
        {
            // PRIMERA VEZ QUE INGRESA

           // $p_codigo  = $_GET["c"];

           // $p_codigo
           //echo "codigo : ".$p_codigo."<br>";

            $objDB = new db_model();

            $p_rptJson = $objDB->proveedor_buscar($p_codigo);



            $p_editarProveedor = json_decode($p_rptJson, true);

            
            $p_codigo 			       = $p_editarProveedor['proveedor_id'];
            $p_num_doc             = $p_editarProveedor['ruc'];
            $p_nombre 		         = $p_editarProveedor['nombre_empresa'];
            $p_direccion           = $p_editarProveedor['direccion'];
            $p_contacto 		       = $p_editarProveedor['contacto'];
            $p_correo		           = $p_editarProveedor['correo'];
            $p_telefono            = $p_editarProveedor['telefono'];
                    
            $p_estado              = $p_editarProveedor['estado'];



        }            

 
    ?>

    <!-- Main contenedor -->
    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="editar">
          <h1 class="editar__titulo">Editar Categoria</h1>
          <div class="formulario-editar">  
            <form action="vista-editar.php?token=<?php echo encriptar_parametro("3|2|".$p_codigo); ?>" method="POST">
                  <section class="formulario-editar-grid">
                    <label for="codigo">
                        <span>Código</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
                          name="codigo"
                          id="codigo"
                          value="<?php echo $p_codigo; ?>"
                          placeholder="Codigo"
                          readonly
                        />
                    </label>

                    <label for="num_doc">
                        <span>Nro. de Documento</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
                          name="num_doc"
                          id="num_doc"
                          value="<?php echo $p_num_doc; ?>"
                          placeholder="Nro. de Documento"
                          
                        />
                    </label>              
                    
                    <label for="nombre">
                        <span>Nombre</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
                          name="nombre"
                          id="nombre"
                          value="<?php echo $p_nombre; ?>"
                          placeholder="Nombre"
                          
                        />
                    </label>


                    
                    <label for="direccion">
                        <span>Dirección</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
                          name="direccion"
                          id="direccion"
                          value="<?php echo $p_direccion; ?>"
                          placeholder="Dirección"
                          
                        />
                    </label>

                    
                    <label for="contacto">
                        <span>Contacto</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
                          name="contacto"
                          id="contacto"
                          value="<?php echo $p_contacto; ?>"
                          placeholder="Contacto"
                          
                        />
                    </label>
                    
                    
                    <label for="correo">
                        <span>Correo</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
                          name="correo"
                          id="correo"
                          value="<?php echo $p_correo; ?>"
                          placeholder="Correo"
                          
                        />
                    </label>              

                    <label for="telefono">
                        <span>Telefóno</span>
                        <input
                          type="text"
                          class="formulario-editar__input"
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
                          class="formulario-editar__input"
                          name="estado"
                          id="estado"
                          value="<?php echo $p_estado; ?>"
                          placeholder="Estado"
                          
                        />
                    </label>
                  </section>
             

                  <section class="formulario-editar-boton">            
                      <a href="vista-listar.php?token=<?php echo encriptar_parametro("3|2"); ?>"  class="boton boton-retornar">Retornar</a>
                      <input class="boton-editar boton" type="submit" name="boton_guardar" id="" value="Guardar" />
                      
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
