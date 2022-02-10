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
    <link rel="stylesheet" href="css/vista-categoria-listar.css" />

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
    <!-- Main contenedor -->

        <!-- Guardar Información -->

    <?php 


        $p_campo_buscar 		   =  '';
        $p_campo_dato 		     =  '';


        $pboton = isset($_POST['boton_buscar']) ? $_POST['boton_buscar'] : '';

        If ($pboton)
        {
              $p_campo_buscar 		      	= stripslashes($_POST['Campo_buscar']);
              $p_campo_dato    		     	= stripslashes($_POST['Campo_dato']);
        }
    ?>

    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="listar">
        <h1 class="agregar__titulo"> CLIENTE </h1>
          <div class="listar__buscador">

            <form action=""  method="POST">
              <input type="text" class="listar__buscador--nombre" name="Campo_dato" id="Campo_dato" placeholder="Nombre" />

              <select class="listar__buscador--select" name="Campo_buscar" id="Campo_buscar">
                <option value="01">ID</option>
                <option value="02">Nombre</option>
                <option value="03">Apellido</option>
                <option value="04">DNI</option>

              </select>

              <input class="boton" type="submit" name="boton_buscar" id="boton_buscar" value="Buscar" />

            </form>

            <div class="contenedor-boton-crear">
              <a class="boton-crear boton" href="vista-agregar.php?token=<?php echo encriptar_parametro("2|2"); ?>"><i class="fas fa-plus-circle"></i>Crear nuevo</a>
            </div>
          </div>
          <div class="listar__tabla">
            <table>
              <thead>
                <tr>
                  <th class="listar__tabla--id">Id</th>
                  <th class="listar__tabla--descripcion">Tipo Documento</th>
                  <th class="listar__tabla--descripcion">Nro. Documento</th>
				          <th class="listar__tabla--descripcion">Nombres</th>
                  <th class="listar__tabla--descripcion">Apellidos</th>
                  <th class="listar__tabla--descripcion">Telefono</th>
				          <th class="listar__tabla--descripcion">Login</th>
                  <th class="listar__tabla--estado">Estado</th>
                  <th class="listar__tabla--acciones">Acciones</th>
                </tr>
              </thead>
              <tbody>

              <!-- Cargar detalle -->
              <?php


                    $objDB = new db_model();

                

                    if (($p_campo_buscar =='01') && ($p_campo_dato <> ''))
                    {
                          //ID
                          $p_rptJson = $objDB->cliente_listar_porid($p_campo_dato);
                    }else
                    if (($p_campo_buscar =='02') && ($p_campo_dato <> ''))
                    {
                          //Nombre
                          $p_rptJson = $objDB->cliente_listar_pornombre($p_campo_dato);
                    }else 
                    if (($p_campo_buscar =='03') && ($p_campo_dato <> ''))
                    {
                          //Apellido
                          $p_rptJson = $objDB->cliente_listar_porapellido($p_campo_dato);
                    }else 
                    if (($p_campo_buscar =='04') && ($p_campo_dato <> ''))
                    {
                          //Dni
                          $p_rptJson = $objDB->cliente_listar_pordni($p_campo_dato);
                    }else 
                    {                 
                          //all
                          $p_rptJson = $objDB->cliente_listar();
                    }

                    $p_itemsCliente = json_decode($p_rptJson, true);

                    foreach ($p_itemsCliente as $p_itemCliente) 
                    {
                        $pcodigo = $p_itemCliente['cliente_id'];
              ?>



                        <tr>
                          <td class="listar__tabla--id"><?php echo $p_itemCliente['cliente_id']; ?></td>
                          <td class="listar__tabla--tipodoc"><?php echo $p_itemCliente['nombre_documento']; ?></td>
                          <td class="listar__tabla--nrodoc"><?php echo $p_itemCliente['num_doc']; ?></td>
						  
                          <td class="listar__tabla--nombre"><?php echo $p_itemCliente['nombres']; ?></td>
                          <td class="listar__tabla--apellido"><?php echo $p_itemCliente['apellidos']; ?></td>
                          <td class="listar__tabla--telefono"><?php echo $p_itemCliente['telefono']; ?></td>
                          <td class="listar__tabla--login"><?php echo $p_itemCliente['usuario']; ?></td>
                          <td class="listar__tabla--estado"><?php echo $p_itemCliente['estado']; ?></td>
                          <td class="listar__tabla--acciones">    
                            <div class="boton-aciones"><a href="vista-editar.php?token=<?php echo encriptar_parametro("2|2|".$pcodigo); ?>" class="boton-aciones__editar">Editar</a>
                            <a href="vista-eliminar.php?token=<?php echo encriptar_parametro("2|2|".$pcodigo); ?>" class="boton-aciones__eliminar">Eliminar</a>
                        </tr>

              <?php
                    }
              ?>
             

              </tbody>
            </table>
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
