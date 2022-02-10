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
        $p_descripcion 		= '';
        $p_precio			  = '0';
        $p_descuento			  = '0';
        $p_estado 			= '';
        $p_codigocategoria = '';
        $p_codigosubcategoria = '';
        $p_codigomarca = '';

        $p_mensaje 			= '';

        $p_codigorpt    = '';
        $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

        If ($pboton)
        {

          $p_nombre 			  = stripslashes($_POST['nombre']);
          $p_descripcion 		= stripslashes($_POST['descripcion']);
          $p_precio			    = stripslashes($_POST['precio']);
          $p_descuento			= stripslashes($_POST['descuento']);
    
          $p_estado 			  = stripslashes($_POST['estado']);
          $p_codigocategoria = stripslashes($_POST['lista_categoria']);
          $p_codigosubcategoria = stripslashes($_POST['lista_subcategoria']);
          $p_codigomarca = stripslashes($_POST['lista_marca']);

          // Adicionar el registro
          
          $postData = array(
            'producto_id' => '',
            'nombre' => $p_nombre,
            'descripcion' => $p_descripcion,
            'imagen' => '',
            'stock' => '',
            'precio' => $p_precio,
            'descuento' => $p_descuento,
            'estado' => $p_estado,
            'subcategoria' => array(
                                  'subcategoria_id' => $p_codigosubcategoria),
 
          
            'marca' => array(
                                    'marca_id' => $p_codigomarca)

            );          


          $objDB = new db_model();

          $p_rptJson = $objDB->producto_registrar($postData);


          $p_adicionarProducto = json_decode($p_rptJson, true);

          $p_codigorpt    = $p_adicionarProducto['mensaje_id'];
          $p_mensajerpt   = $p_adicionarProducto['mensaje'];
          $p_mensaje 			= $p_mensajerpt;


          if ($p_codigorpt == 0)
          {
            // proceso OK

            $p_nombre 			  = "";
            $p_descripcion 			  = "";
            $p_precio 			  = "";
            $p_descuento = "";
            $p_estado 			  = "";
            $p_codigosubcategoria = "";
            $p_codigomarca 			  = "";
           
  

          }else
          {
            // error en la información enviada.
            $p_mensaje 			= $p_mensajerpt;
            $p_mensaje 			= "!Problema de conexión con la DB, comunicarse con el administrador¡";

          }

        }
    ?>
    <!-- Main contenedor -->
    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="agregar">
          <h1 class="agregar__titulo">Agregar Producto</h1>
          <div class="formulario-agregar">  
            <form action="vista-agregar.php?token=<?php echo encriptar_parametro("3|1"); ?>" method="POST">
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

                <label for="descripcion">
                    <span>Descricion</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="descripcion"
                      id="descripcion"
                      value="<?php echo $p_descripcion; ?>"
                      placeholder="Descripcion"
                      
                    />
                </label>
              
                <label for="categoria">
                    <span>Categoria</span>

                    <select name="lista_categoria" id="lista_categoria" class="formulario-agregar__input">

                        <?php
                              $objDBLis = new db_model();
                              $p_rptJson = $objDBLis->categoria_listar();

                              $p_itemsCategoria = json_decode($p_rptJson, true);

                              foreach ($p_itemsCategoria as $p_itemCategoria) 
                              {
                                  $p_lineaLista = "<option value=".$p_itemCategoria['categoria_id'].">".$p_itemCategoria['descripcion']."</option>";
                                  if ($p_codigocategoria == $p_itemCategoria['categoria_id'] )
                                  {
                                    $p_lineaLista = "<option value=".$p_itemCategoria['categoria_id']." selected >".$p_itemCategoria['descripcion']."</option>";
                                  }
                                  echo $p_lineaLista;
                              }
                        ?>


                    </select>

                    
                </label>

                <label for="subcategoria">
                    <span>Subcategoria</span>



                    <select name="lista_subcategoria" id="lista_subcategoria" class="formulario-agregar__input">

                        <?php
                              $objDBLis = new db_model();
                              $p_rptJson = $objDBLis->subcategoria_listar();

                              $p_itemsSubCategoria = json_decode($p_rptJson, true);

                              foreach ($p_itemsSubCategoria as $p_itemSubCategoria) 
                              {
                                  $p_lineaLista = "<option value=".$p_itemSubCategoria['subcategoria_id'].">".$p_itemSubCategoria['descripcion']."</option>";
                                  if ($p_codigosubcategoria == $p_itemSubCategoria['subcategoria_id'] )
                                  {
                                    $p_lineaLista = "<option value=".$p_itemSubCategoria['subcategoria_id']." selected >".$p_itemSubCategoria['descripcion']."</option>";
                                  }
                                  echo $p_lineaLista;
                              }
                        ?>


                    </select>
                  
                  </label>

                <label for="marca">
                    <span>Marca</span>



                    <select name="lista_marca" id="lista_marca" class="formulario-agregar__input">

                        <?php
                              $objDBLis = new db_model();
                              $p_rptJson = $objDBLis->marca_listar();

                              $p_itemsMarca = json_decode($p_rptJson, true);

                              foreach ($p_itemsMarca as $p_itemMarca) 
                              {
                                  $p_lineaLista = "<option value=".$p_itemMarca['marca_id'].">".$p_itemMarca['descripcion']."</option>";
                                  if ($p_codigomarca == $p_itemMarca['marca_id'] )
                                  {
                                    $p_lineaLista = "<option value=".$p_itemMarca['marca_id']." selected >".$p_itemMarca['descripcion']."</option>";
                                  }
                                  echo $p_lineaLista;
                              }
                        ?>


                    </select>

                    
                </label>
                <label for="precio">
                    <span>Precio</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="precio"
                      id="precio"
                      value="<?php echo $p_precio; ?>"
                      placeholder="Precio"
                      
                    />
                </label>

                <label for="descuento">
                    <span>Descuento</span>
                    <input
                      type="text"
                      class="formulario-agregar__input"
                      name="descuento"
                      id="descuento"
                      value="<?php echo $p_descuento; ?>"
                      placeholder="Descuento"
                      
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
                <a href="vista-listar.php?token=<?php echo encriptar_parametro("3|1"); ?>" class="boton boton-retornar">Retornar</a>
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
