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
        $p_estado 			= '';
        $p_codigocategoria = '';

        $p_mensaje 			= '';


        $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

        If ($pboton)
        {

              // esta registrando di aceptar

            
              $p_codigo 			= stripslashes($_POST['codigo']);
              $p_nombre 			= stripslashes($_POST['nombre']);
              $p_estado 			= stripslashes($_POST['estado']);
              $p_codigocategoria = stripslashes($_POST['lista_categoria']);

              // Adicionar el registro
              
              $postData = array(
                'subcategoria_id' => $p_codigo,
                'descripcion' => $p_nombre,
                'imagen' => '',
                'estado' => $p_estado,
                'categoria' => array(
                                      'categoria_id' => $p_codigocategoria)
     
                );         


             // echo json_encode($postData);
              $objDB = new db_model();

              $p_rptJson = $objDB->subcategoria_editar($postData);


              $p_editarCategoria = json_decode($p_rptJson, true);

              $p_codigorpt    = $p_editarCategoria['mensaje_id'];
              $p_mensajerpt   = $p_editarCategoria['mensaje'];
              $p_mensaje 			= $p_mensajerpt;

              if ($p_codigorpt == 0)
              {
                // proceso OK

                // direccionar a la pagina de listado

                //<% response.sendRedirect("vista-listar.php?m=1&s=2"); %>

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

            $p_rptJson = $objDB->subcategoria_buscar($p_codigo);



            $p_editarSubCategoria = json_decode($p_rptJson, true);

            $p_codigo   = $p_editarSubCategoria['subcategoria_id'];
            $p_nombre   = $p_editarSubCategoria['descripcion'];
            $p_estado   = $p_editarSubCategoria['estado'];

            $p_codigocategoria = $p_editarSubCategoria['categoria_id'];
            

        }
    ?>

    <!-- Main contenedor -->
    <main class="main">
      <div class="main__contenido">

        <!-- Contenido interior variable -->
        <section class="editar">
          <h1 class="editar__titulo">Editar SubCategoria</h1>
          <div class="formulario-editar">  
            <form action="vista-editar.php?token=<?php echo encriptar_parametro("1|3|".$p_codigo); ?>" method="POST">
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
                      minlength="1"
                      maxlength="64"
                      
                    />
                </label>
                

                <label for="categoria">
                    <span>Categoria</span>



                    <select name="lista_categoria" id="lista_categoria" class="formulario-editar__input">

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

                <label for="estado">
                    <span>Estado</span>
                    <input
                      type="text"
                      class="formulario-editar__input"
                      name="estado"
                      id="estado"
                      value="<?php echo $p_estado; ?>"
                      placeholder="Estado"
                      minlength="1"
                      maxlength="2"
                      
                    />
                </label>
              </section>
              <section class="formulario-editar-boton">
                  <a href="vista-listar.php?token=<?php echo encriptar_parametro("1|3"); ?>" class="boton boton-retornar">Retornar</a>
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
