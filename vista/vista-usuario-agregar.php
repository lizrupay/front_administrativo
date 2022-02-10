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
 
        $p_apellido 		= '';
        $p_direccion 		= '';
        $p_telefono 		= '';
        $p_correo 			= '';
        $p_login 			  = '';
        $p_contrasena  	= ''; 
        $p_estado      	= ''; 

        $p_mensaje 			= '';

        $arrayRoles   = array();
        $p_codigoroles  = '';


        $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

        If ($pboton)
        {

          $p_nombre 		= stripslashes($_POST['nombre']);
          $p_apellido 	= stripslashes($_POST['apellido']);
          $p_direccion	= stripslashes($_POST['direccion']);
          $p_telefono		= stripslashes($_POST['telefono']);
          $p_correo     = stripslashes($_POST['correo']);
          $p_login      = stripslashes($_POST['login']);
          $p_contrasena = stripslashes($_POST['contrasena']);

          $p_estado     = stripslashes($_POST['estado']);

          // Lista de roles seleccionado

          $pcomboMulti  = isset($_POST['lista_roles']) ? $_POST['lista_roles'] : '';
          
          If ($pcomboMulti)
          {
              
              $p_itemsRoles    = array();


              $p_itemsRoles  = $_POST["lista_roles"]; 
              

              foreach($p_itemsRoles as $p_itemRoles)
              {

                $postDataRoles = array(
                  'id_role' => $p_itemRoles
                  ); 
                
                $arrayRoles[] = $postDataRoles;

              }


          }

          // Adicionar el registro
          
          $postData = array(
            'usuario_id' => '',
            'nombres' => $p_nombre,
            'apellidos' => $p_apellido,
            'usuario' => $p_login,
            'clave' => $p_contrasena,
            'telefono' => $p_telefono,
            'correo' => $p_correo,
            'direccion' => $p_direccion,
            'estado' => $p_estado,

            'itemsRole' => $arrayRoles

            );          

           // echo "info : ".json_encode($postData)."<br>";

            
          $objDB = new db_model();

          $p_rptJson = $objDB->usuario_registrar($postData);


          $p_adicionarProducto = json_decode($p_rptJson, true);

          $p_codigorpt    = $p_adicionarProducto['mensaje_id'];
          $p_mensajerpt   = $p_adicionarProducto['mensaje'];
          $p_mensaje 			= $p_mensajerpt;

     
          if ($p_codigorpt == 0)
          {
            // proceso OK

            $p_nombre 			= "";
            $p_apellido 		= "";
            $p_direccion 		= "";
            $p_telefono     = "";
            $p_correo 			= "";
            $p_login        = "";
            $p_contrasena 	= "";

            $p_estado       = "";
            $arrayRoles     = null;
  

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
          <h1 class="agregar__titulo">Agregar Usuario</h1>
          <div class="formulario-agregar">  
            <form action="vista-agregar.php?token=<?php echo encriptar_parametro("1|6"); ?>" method="POST">
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
                        placeholder="Apellido"
                        
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
        

                  <label for="correo">
                      <span>Correo</span>
                      <input
                        type="text"
                        class="formulario-agregar__input"
                        name="correo"
                        id="correo"
                        value="<?php echo $p_correo; ?>"
                        placeholder="Correo"
                        
                      />
                  </label>

                  <label for="login">
                      <span>Login</span>
                      <input
                        type="text"
                        class="formulario-agregar__input"
                        name="login"
                        id="login"
                        value="<?php echo $p_login; ?>"
                        placeholder="Login"
                        
                      />
                  </label>


                  <label for="contrasena">
                      <span>Contraseña</span>
                      <input
                        type="text"
                        class="formulario-agregar__input"
                        name="contrasena"
                        id="contrasena"
                        value="<?php echo $p_contrasena; ?>"
                        placeholder="Contraseña"
                        
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
                  

                  <label for="roles">
                      <span>Roles</span>



                      <select multiple="multiple" name="lista_roles[]" id="lista_roles[]" class="formulario-agregar__combomultiple">

                          <?php
                                $objDBLis = new db_model();
                                $p_rptJson = $objDBLis->roles_listar();

                                //echo "infom : ".$p_rptJson;

                                $p_itemsRoles = json_decode($p_rptJson, true);

                                foreach ($p_itemsRoles as $p_itemRoles) 
                                {
                                    $p_lineaLista = "<option value=".$p_itemRoles['id_role'].">".$p_itemRoles['descripcion']."</option>";
                                    if ($p_codigoroles == $p_itemRoles['id_role'] )
                                    {
                                      $p_lineaLista = "<option value=".$p_itemRoles['id_role']." selected >".$p_itemRoles['descripcion']."</option>";
                                    }
                                    echo $p_lineaLista;
                                }
                          ?>


                      </select>
                    
                  </label>

            </section>
            <section class="formulario-agregar-boton">
              <a href="vista-listar.php?token=<?php echo encriptar_parametro("1|6"); ?>" class="boton boton-retornar">Retornar</a>
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
