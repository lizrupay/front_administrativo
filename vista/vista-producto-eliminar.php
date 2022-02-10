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

              // esta registrando di aceptar

            
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
                'producto_id' => $p_codigo,
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
    

             // echo json_encode($postData);
              $objDB = new db_model();

              $p_rptJson = $objDB->producto_eliminar($p_codigo);


              $p_editarProducto = json_decode($p_rptJson, true);

              $p_codigorpt    = $p_editarProducto['mensaje_id'];
              $p_mensajerpt   = $p_editarProducto['mensaje'];
              $p_mensaje 			= $p_mensajerpt;

              if ($p_codigorpt == 0)
              {
                // proceso OK


                $p_nombre 			= '';
                $p_descripcion 		= '';
                $p_precio			  = '0';
                $p_descuento			  = '0';
                $p_estado 			= '';
                $p_codigocategoria = '';
                $p_codigosubcategoria = '';
                $p_codigomarca = '';
                                
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

            $p_rptJson = $objDB->producto_buscar($p_codigo);



            $p_editarProducto = json_decode($p_rptJson, true);

            $p_codigo               = $p_editarProducto['producto_id'];
            $p_nombre               = $p_editarProducto['nombre'];
            $p_descripcion               = $p_editarProducto['descripcion'];
            $p_precio			          = $p_editarProducto['precio'];
            $p_descuento		      	= $p_editarProducto['descuento'];
            $p_codigocategoria      = $p_editarProducto['categoria_id'];
            $p_codigosubcategoria   = $p_editarProducto['subcategoria_id'];
            $p_codigomarca          = $p_editarProducto['marca_id'];
            $p_estado               = $p_editarProducto['estado'];

            
            

        }
    ?>

    <!-- Main contenedor -->
    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="editar">
          <h1 class="editar__titulo">Eliminar Producto</h1>
          <div class="formulario-editar">  
            <form action="vista-eliminar.php?token=<?php echo encriptar_parametro("3|1|".$p_codigo); ?>" method="POST">
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

                      
                      <label for="nombre">
                          <span>Nombre</span>
                          <input
                            type="text"
                            class="formulario-editar__input"
                            name="nombre"
                            id="nombre"
                            value="<?php echo $p_nombre; ?>"
                            placeholder="Nombre"
                            readonly
                          />
                      </label>

                      <label for="descripcion">
                          <span>Descricion</span>
                          <input
                            type="text"
                            class="formulario-editar__input"
                            name="descripcion"
                            id="descripcion"
                            value="<?php echo $p_descripcion; ?>"
                            placeholder="Descripcion"
                            readonly
                          />
                      </label>
                      

                      <label for="categoria">
                          <span>Categoria</span>

                          <select readonly name="lista_categoria" id="lista_categoria" class="formulario-editar__input">

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

                              
                      </label>

                      <label for="subcategoria">
                          <span>Subcategoria</span>



                          <select readonly name="lista_subcategoria" id="lista_subcategoria" class="formulario-editar__input">

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



                          <select readonly name="lista_marca" id="lista_marca" class="formulario-editar__input">

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
                            class="formulario-editar__input"
                            name="precio"
                            id="precio"
                            value="<?php echo $p_precio; ?>"
                            placeholder="Precio"
                            readonly
                          />
                      </label>

                      <label for="descuento">
                          <span>Descuento</span>
                          <input
                            type="text"
                            class="formulario-editar__input"
                            name="descuento"
                            id="descuento"
                            value="<?php echo $p_descuento; ?>"
                            placeholder="Descuento"
                            readonly
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
                            readonly
                          />
                      </label>

              </section>

              <section class="formulario-editar-boton">

                    <a href="vista-listar.php?token=<?php echo encriptar_parametro("3|1"); ?>" class="boton boton-retornar">Retornar</a>
                    <input class="boton-editar boton" type="submit" name="boton_guardar" id="" value="Eliminar" />
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
