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

        $p_nombre 			= '';
        $p_apellido 		= '';
        $p_usuario		  = '';
        $p_clave			  = '';
        $p_telefono = '';
        $p_correo = '';
        $p_direccion = '';
        $p_num_doc = '';
        $p_estado = '';
        $p_codigotipodocumento = '';
    

        $p_mensaje 			= '';

        $p_codigorpt    = '';
        $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

        If ($pboton)
        {

          $p_nombre 		          = stripslashes($_POST['nombre']);
          $p_apellido 		       = stripslashes($_POST['apellido']);
          $p_usuario		         = stripslashes($_POST['usuario']);
          $p_clave			         = stripslashes($_POST['clave']);
          $p_telefono            = stripslashes($_POST['telefono']);
          $p_correo              = stripslashes($_POST['correo']);
          $p_direccion           = stripslashes($_POST['direccion']);
          $p_num_doc             = stripslashes($_POST['num_doc']);
          $p_estado              = stripslashes($_POST['estado']);
          $p_codigotipodocumento = stripslashes($_POST['lista_tipodocumento']);
         
          // Adicionar el registro
          
          $postData = array(
            'cliente_id' => '',
            'nombres' => $p_nombre,
            'apellidos' => $p_apellido,
            'usuario' => $p_usuario,
            'clave' => $p_clave,
            'telefono' => $p_telefono,
            'correo' => $p_correo,
            'direccion' => $p_direccion,
            'num_doc' => $p_num_doc,
            'estado' => $p_estado,
            'tipodocumento' => array(
                                  'tipodocumento_id' => $p_codigotipodocumento)
 
            );          
            
      

          $objDB = new db_model();

          $p_rptJson = $objDB->cliente_registrar($postData);


          $p_adicionarCliente = json_decode($p_rptJson, true);

          $p_codigorpt    = $p_adicionarCliente['mensaje_id'];
          $p_mensajerpt   = $p_adicionarCliente['mensaje'];
          $p_mensaje 			= $p_mensajerpt;


          if ($p_codigorpt == 0)
          {
            // proceso OK

            $p_nombre 			= '';
            $p_apellido 		= '';
            $p_usuario		  = '';
            $p_clave			  = '';
            $p_telefono = '';
            $p_correo = '';
            $p_direccion = '';
            $p_num_doc = '';
            $p_estado = '';
            $p_codigotipodocumento = '';

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
          <h1 class="agregar__titulo">Agregar Cliente</h1>
          <div class="formulario-agregar">  
            <form action="vista-agregar.php?token=<?php echo encriptar_parametro("2|2"); ?>" method="POST">
             <section class="formulario-agregar-grid">

                <label for="num_doc">
                    <span>Nro: Documento</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="num_doc"
                      id="num_doc"
                      value="<?php echo $p_num_doc; ?>"
                      placeholder="num_doc"
                      minlength="2"
                      maxlength="11"
                      
                    />
                </label>

                <label for="tipodoc">
                    <span>Documento</span>

                    <select name="lista_tipodocumento" id="lista_tipodocumento" class="formulario-agregar__input">

                        <?php
                              $objDBLis = new db_model();
                              $p_rptJson = $objDBLis->tipodoc_listar();

                              $p_itemsTipodoc = json_decode($p_rptJson, true);

                              foreach ($p_itemsTipodoc as $p_itemTipodoc) 
                              {
                                  $p_lineaLista = "<option value=".$p_itemTipodoc['tipodocumento_id'].">".$p_itemTipodoc['descripcion']."</option>";
                                  if ($p_codigotipodocumento == $p_itemTipodoc['tipodocumento_id'] )
                                  {
                                    $p_lineaLista = "<option value=".$p_itemTipodoc['tipodocumento_id']." selected >".$p_itemTipodoc['descripcion']."</option>";
                                  }
                                  echo $p_lineaLista;
                              }
                        ?>
                    </select>
               </label>

                <label for="nombre">
                    <span>Nombre</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="nombre"
                      id="nombre"
                      value="<?php echo $p_nombre; ?>"
                      placeholder="nombre"
                      minlength="2"
                      maxlength="64"
                      
                    />
                </label>

                <label for="apellido">
                    <span>Apellido</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="apellido"
                      id="apellido"
                      value="<?php echo $p_apellido; ?>"
                      placeholder="apellido"
                      minlength="2"
                      maxlength="64"
                      
                    />
                </label>

              
                <label for="direccion">
                    <span>Direccion</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="direccion"
                      id="direccion"
                      value="<?php echo $p_direccion; ?>"
                      placeholder="direccion"
                      minlength="2"
                      maxlength="128"
                      
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
                    <span>Telefono</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="telefono"
                      id="telefono"
                      value="<?php echo $p_telefono; ?>"
                      placeholder="telefono"
                      minlength="9"
                      maxlength="9"
                      
                    />
                </label>

                <label for="usuario">
                    <span>Usuario</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="usuario"
                      id="usuario"
                      value="<?php echo $p_usuario; ?>"
                      placeholder="usuario"
                      minlength="4"
                      maxlength="16"
                      
                    />
                </label>

                <label for="clave">
                    <span>Contraseña</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="clave"
                      id="clave"
                      value="<?php echo $p_clave; ?>"
                      placeholder="clave"
                      minlength="4"
                      maxlength="16"
                      
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
                <a href="vista-listar.php?token=<?php echo encriptar_parametro("2|2"); ?>" class="boton boton-retornar">Retornar</a>
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
