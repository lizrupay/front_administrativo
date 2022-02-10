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


        $p_campo_buscar 		=  '';
        $p_campo_dato 			=  '';


        $pboton = isset($_POST['boton_buscar']) ? $_POST['boton_buscar'] : '';

        If ($pboton)
        {
              $p_campo_buscar 			= stripslashes($_POST['Campo_buscar']);
              $p_campo_dato    			= stripslashes($_POST['Campo_dato']);
              

        }
    ?>

    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="listar">
        <h1 class="agregar__titulo"> COMPRA </h1>
          <div class="listar__buscador">

            <form action=""  method="POST">
              <input type="text" class="listar__buscador--nombre" name="Campo_dato" id="Campo_dato" placeholder="Nombre" />

              <select class="listar__buscador--select" name="Campo_buscar" id="Campo_buscar">
                <option value="01">ID</option>
                <option value="02">Descripción</option>

              </select>

              <input class="boton" type="submit" name="boton_buscar" id="boton_buscar" value="Buscar" />

            </form>

            <div class="contenedor-boton-crear">
              <a class="boton-crear boton" href="vista-agregar.php?token=<?php echo encriptar_parametro("3|3"); ?>"><i class="fas fa-plus-circle"></i>Crear nuevo</a>
            </div>
          </div>
          <div class="listar__tabla">
            <table>
              <thead>
                <tr>
                  <th class="listar__tabla--id">Id</th>
                  <th class="listar__tabla--descripcion">Tipo Comprobante</th>
                  <th class="listar__tabla--descripcion">Nro. Documento</th>
                  <th class="listar__tabla--descripcion">Descripcion Compra</th>
				          <th class="listar__tabla--descripcion">Proveedor</th>
                  
                  <th class="listar__tabla--descripcion">Fecha</th>
                  <th class="listar__tabla--usuario">usuario</th>
                 <!-- <th class="listar__tabla--estado">Estado</th> -->
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
                          $p_rptJson = $objDB->compra_listar_porid($p_campo_dato);
                    }else
                    if (($p_campo_buscar =='02') && ($p_campo_dato <> ''))
                    {
                          //Descripcion
                          $p_rptJson = $objDB->compra_listar_pordescripcion($p_campo_dato);
                    }else  
                    {                 
                          //all
                          $p_rptJson = $objDB->compra_listar();
                    }

                    $p_itemsCompra = json_decode($p_rptJson, true);

                    foreach ($p_itemsCompra as $p_itemCompra) 
                    {
                        $pcodigo = $p_itemCompra['compra_id'];
              ?>

                        <tr>
                          <td class="listar__tabla--id"><?php echo $p_itemCompra['compra_id']; ?></td>
                          <td class="listar__tabla--descripcion"><?php echo $p_itemCompra['tipocom_compra']; ?></td>  
                          <td class="listar__tabla--nrodocumento"><?php echo $p_itemCompra['numDocumento_compra']; ?></td>
                          <td class="listar__tabla--descripcion"><?php echo $p_itemCompra['descripcion_compra']; ?></td>
                          <td class="listar__tabla--proveedor"><?php echo $p_itemCompra['proveedor_compra']; ?></td>
                                                 
                          <td class="listar__tabla--fecha"><?php echo $p_itemCompra['fecha_compra']; ?></td>
                          <td class="listar__tabla--usuario"><?php echo $p_itemCompra['usuario_compra']; ?></td>
                         
                          <td class="listar__tabla--acciones">    
                            <div class="boton-aciones"><a href="vista-editar.php?token=<?php echo encriptar_parametro("3|3|".$pcodigo); ?>" class="boton-aciones__editar">Visualizar</a>
                            </div>                  
                          </td>
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
