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
  <link rel="stylesheet" href="css/vista-generar-comprobante.css" />

  <script src="https://kit.fontawesome.com/1ab79fe3ab.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400&amp;display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <?php include 'componentes/header.php'; ?>
  <!-- Sidebar -->
  <?php include 'componentes/sidebar.php'; ?>


  <!-- conexion db-api -->

  <?php include 'db/db_model.php'; ?>

  <!-- Guardar Información -->

  <?php

 
  $p_estado       = '1';
  $p_codigoUsuario      = '1';

  $p_codigoCompra       = '';
  $p_codigotcomprobante = '';
  $p_nrodocumento       = '';
  $p_descripcion        = '';
  $p_codigoproveedor    = '';
  $p_codigoproducto     = '';
  $p_cantidad           = '';
  $p_precio             = '';


  $p_mensaje            = '';





  $pboton = isset($_POST['boton_guardar']) ? $_POST['boton_guardar'] : '';

  $pbotonagregar = isset($_POST['boton_agregar']) ? $_POST['boton_agregar'] : '';

  //echo "botonos01 ............: ".$pboton."<br>";
  //echo "botonos02 .............: ".$pbotonagregar."<br>";

  if ($pbotonagregar) {  
    // Adicionar un registro detalle
    $p_codigoCompra       = stripslashes($_POST['codigo_compra']);
    $p_codigotcomprobante = stripslashes($_POST['lista_tcomprobante']);
    $p_nrodocumento       = stripslashes($_POST['nro_documento']);
    $p_descripcion        = stripslashes($_POST['descripcion']);
    $p_codigoproveedor    = stripslashes($_POST['lista_proveedor']);
    $p_codigoproducto     = stripslashes($_POST['lista_producto']);
    $p_cantidad           = stripslashes($_POST['cantidad']);
    $p_precio             = stripslashes($_POST['precio']);   

    //echo "dato : ".$p_codigoCompra ;
    //si es el primer detalle a registrar
    if ($p_codigoCompra == '')
    {


            $p_itemsDetalleCompra     = array();

            $postDataDetalleCompra    = array(
                                            'producto' => array(
                                                        'producto_id' => $p_codigoproducto),
                                            'cantidad_compradetalle' => $p_cantidad ,
                                            'precio_compradetalle' => $p_precio,
                                            'estado' => '1'); 

            $p_itemsDetalleCompra[] = $postDataDetalleCompra;
            
            $postData = array(

              'tipocomprobante' => array(
                                    'tipocomprobante_id' => $p_codigotcomprobante),             
              'numDocumento_compra' => $p_nrodocumento,
              'descripcion_compra' => $p_descripcion,
              'estado' => $p_estado,
              'proveedor' => array(
                      'proveedor_id' => $p_codigoproveedor),
                    
              'usuario' => array(
                      'usuario_id' => $p_codigoUsuario),

              'itemsdetalleCompracarritos' => $p_itemsDetalleCompra
            );



            //echo "informacion :".json_encode($postData);

        
            $objDB = new db_model();

            $p_rptJson = $objDB->compracarrito_registrar($postData);


            $p_adicionarCompra = json_decode($p_rptJson, true);

            $p_codigorpt    = $p_adicionarCompra['mensaje_id'];
            $p_mensajerpt   = $p_adicionarCompra['mensaje'];
            $p_mensaje      = $p_mensajerpt;


            $p_rptJsonCompraUlt = $objDB->compracarrito_buscar_ultimacompra($p_codigoUsuario);

            $p_itemCompra = json_decode($p_rptJsonCompraUlt, true);
            $p_codigoCompra = $p_itemCompra['compra_id'];


            if ($p_codigorpt == '0')
            {
              $p_codigoproducto     = '';
              $p_cantidad           = '';
              $p_precio             = '';
              $p_mensaje            = '¡registro de detalle exitoso!'; 
            }


    }else
    {

            $postData = array(

              'compracarrito' => array('compra_id' => $p_codigoCompra),
                  
              'producto' => array(
                          'producto_id' => $p_codigoproducto),
              'cantidad_compradetalle' => $p_cantidad ,
              'precio_compradetalle' => $p_precio,
              'estado' => '1'
            ); 
            
            // echo "informacion :".json_encode($postData);

    //si es detalle adicional para registrar


            
            $objDB = new db_model();

            $p_rptJson = $objDB->compradetallecarrito_registrar($postData);


            $p_adicionarDetalleCompra = json_decode($p_rptJson, true);

            $p_codigorpt    = $p_adicionarDetalleCompra['mensaje_id'];
            $p_mensajerpt   = $p_adicionarDetalleCompra['mensaje'];
            $p_mensaje       = $p_mensajerpt;

            if ($p_codigorpt == '0')
            {
              $p_codigoproducto     = '';
              $p_cantidad           = '';
              $p_precio             = '';
              $p_mensaje            = '¡registro de detalle exitoso!';
            }      
          

    }




  }else
  {
  
        if ($pboton)
        {

            // guardar la orden de compra

            $p_codigoCompra       = stripslashes($_POST['codigo_compra']);


            // consulta detalle de Carrito de Compra

            $objDB = new db_model();
            $p_rptJson = $objDB->compracarrito_buscar($p_codigoCompra);
            $p_itemCompra = json_decode($p_rptJson, true); 
            $p_itemsCompraDetalleCarrito = $p_itemCompra['itemsCompradetallellecarritoMapear'];

            // generar detalle de compra
            $p_itemsDetalleCompra     = array();
            foreach ($p_itemsCompraDetalleCarrito as $p_itemCompraDetalleCarrito) 
            {

                $postDataDetalleCompra    = array(
                                                'producto' => array(
                                                            'producto_id' => $p_itemCompraDetalleCarrito['producto_id']),
                                                'cantidad_compradetalle' => $p_itemCompraDetalleCarrito['cantidad_compradetalle'] ,
                                                'precio_compradetalle' => $p_itemCompraDetalleCarrito['precio_compradetalle'],
                                                'estado' => '1'); 
    
                $p_itemsDetalleCompra[] = $postDataDetalleCompra;


            }

    


            // echo "detalle : ".json_encode($p_itemsDetalleCompra)."<br>";

            $postData = array(

              'tipocomprobante' => array(
                                    'tipocomprobante_id' => $p_itemCompra['tipocomprobante_id']),             
              'numDocumento_compra' => $p_itemCompra['numDocumento_compra'],
              'descripcion_compra' => $p_itemCompra['descripcion_compra'],
              'estado' => $p_itemCompra['estado'],
              'proveedor' => array(
                      'proveedor_id' => $p_itemCompra['proveedor_id']),
                    
              'usuario' => array(
                      'usuario_id' => $p_itemCompra['usuario_id']),

              'itemsdetalleCompras' => $p_itemsDetalleCompra
            );

            echo "total cabecera : ".json_encode($postData)."<br>";

            $p_rptJson = $objDB->compra_registrar($postData);

            $p_itemCompraRpt = json_decode($p_rptJson, true); 



            $p_codigorpt    = $p_itemCompraRpt['mensaje_id'];
            $p_mensajerpt   = $p_itemCompraRpt['mensaje'];
            $p_mensaje      = $p_mensajerpt;
            
            /*
            $p_codigorpt    = '1';
            $p_mensajerpt   = '';
            $p_mensaje      = '';
             */ 

            if ($p_codigorpt == 0) 
            {
              // proceso OK

              $p_codigoCompra       = '';
              $p_codigotcomprobante = '';
              $p_nrodocumento       = '';
              $p_descripcion        = '';
              $p_codigoproveedor    = '';
              $p_codigoproducto     = '';
              $p_cantidad           = '';
              $p_precio             = '';

              $p_mensaje            = '¡registro de compra exitoso!';

            } else {
              // error en la información enviada.
              $p_mensaje       = $p_mensajerpt;
            }
        }else
        {
          // Primera vez que ingresa

        }
  }
  ?>
  <!-- Main contenedor -->
  <main class="main">
    <div class="main__contenido">

      <!-- Contenido interior variable -->
      <section class="generar-comprobante">
        <h1 class="generar-comprobante__titulo">Adicionar Compra</h1>
        <div class="formulario-generar-comprobante">

          <form  action="vista-agregar.php?token=<?php echo encriptar_parametro("3|3"); ?>" method="POST">
            <section class="top-generar-comprobante">

            <label for="tipo-documento">
              <span>N° Orden Compra</span>

              <input 
                    type="text" 
                    class="formulario-generar-comprobante__input" 
                    name="codigo_compra" 
                    id="codigo_compra" 
                    value="<?php echo $p_codigoCompra; ?>" 
                    placeholder="N° Orden Compra"
                    readonly
                    />

            </label>

            <label for="tipo-documento">
              <span>Tipo de comprobante</span>

                  <select name="lista_tcomprobante" id="lista_tcomprobante" class="formulario-generar-comprobante__input">

                      <?php
                            $objDBLis = new db_model();
                            $p_rptJson = $objDBLis->tipocom_listar();

                            $p_itemsTComprobante = json_decode($p_rptJson, true);

                            foreach ($p_itemsTComprobante as $p_itemTComprobante) 
                            {
                                $p_lineaLista = "<option value=".$p_itemTComprobante['tipocomprobante_id'].">".$p_itemTComprobante['descripcion']."</option>";
                                if ($p_codigotcomprobante == $p_itemTComprobante['tipocomprobante_id'] )
                                {
                                  $p_lineaLista = "<option value=".$p_itemTComprobante['tipocomprobante_id']." selected >".$p_itemTComprobante['descripcion']."</option>";
                                }
                                echo $p_lineaLista;
                            }
                      ?>


                  </select>     
                  
                  
            </label>

            

            <label for="nro_documento">
              <span>N° de Comprobante</span>
              <input 
                type="text" 
                class="formulario-generar-comprobante__input" 
                name="nro_documento" 
                id="nro_documento" 
                value="<?php echo $p_nrodocumento; ?>" 
                placeholder="N° de Comprobante"
                />
            </label>
    
            <label for="descripcion">
              <span>Descripción</span>
              <input 
                  type="text" 
                  class="formulario-generar-comprobante__input" 
                  name="descripcion" 
                  id="descripcion" 
                  value="<?php echo $p_descripcion; ?>" 
                  placeholder="Descripción" 
                />
            </label>


            <label for="proveedor">
              <span>Proveedor</span>

              <select class="formulario-generar-comprobante__select" name="lista_proveedor" id="lista_proveedor">
 
 
                      <?php
                            $objDBLis = new db_model();
                            $p_rptJson = $objDBLis->proveedor_listar();

                            $p_itemsProveedor = json_decode($p_rptJson, true);

                            foreach ($p_itemsProveedor as $p_itemProveedor) 
                            {
                                $p_lineaLista = "<option value=".$p_itemProveedor['proveedor_id'].">".$p_itemProveedor['nombre_empresa']."</option>";
                                if ($p_codigoproveedor == $p_itemProveedor['proveedor_id'] )
                                {
                                  $p_lineaLista = "<option value=".$p_itemProveedor['proveedor_id']." selected >".$p_itemProveedor['nombre_empresa']."</option>";
                                }
                                echo $p_lineaLista;
                            }
                      ?>

              </select>              


            </label>
          
            </section>
          <!-- </form> -->
          <section class="contenedor-detalle-generar-comprobante" >
          <!-- <form class="contenedor-detalle-generar-comprobante" action="vista-agregar.php?token=<?php echo encriptar_parametro("3|3"); ?>"  method="POST"> -->
                 
            <h4>Detalle</h4>




            <section class="top-detalle-generar-comprobante">

              <label for="producto">
                <span>Producto</span>

                    <select name="lista_producto" id="lista_producto" class="formulario-generar-comprobante__select">

                    <?php
                          $objDBLis = new db_model();
                          $p_rptJson = $objDBLis->producto_listar();

                          $p_itemsProducto = json_decode($p_rptJson, true);

                          foreach ($p_itemsProducto as $p_itemProducto) 
                          {
                              $p_lineaLista = "<option value=".$p_itemProducto['producto_id'].">".$p_itemProducto['nombre']."</option>";
                              if ($p_codigoproducto == $p_itemProducto['producto_id'] )
                              {
                                $p_lineaLista = "<option value=".$p_itemProducto['producto_id']." selected >".$p_itemProducto['nombre']."</option>";
                              }
                              echo $p_lineaLista;
                          }
                    ?>
                    
                    </select>                 

              </label>

              <label for="cantidad">
                <span>Cantidad</span>
                <input 
                    type="text" 
                    class="formulario-generar-comprobante__input" 
                    name="cantidad" 
                    id="cantidad" 
                    value="<?php echo $p_cantidad; ?>" placeholder="Cantidad " 
                />
              </label>

              <label for="precio">
                <span>Precio S/.</span>
                <input type="number" 
                    class="formulario-generar-comprobante__input" 
                    name="precio" 
                    id="precio" 
                    value="<?php echo $p_precio; ?>" 
                    placeholder="Precio" 
                />
              </label>

              <input class="boton-agregar boton" type="submit" name="boton_agregar" id="boton_agregar" value="Agregar" />
            </section>
            <section class="generar-comprobante__tabla">
              <table>
                <thead class="gc__tabla--encabezado">
                  <tr>
                    <th class="gc__tabla--id">Id</th>
                    <th class="gc__tabla--producto">Producto</th>
                    <th class="gc__tabla--cantidad">Cantidad</th>
                    <th class="gc__tabla--precio">Precio</th>
                    <th class="gc__tabla--precio">Total</th>
                  </tr>
                </thead>
                <tbody>

                <?php

                      // Verificar el detalle a imprimir.

                      $objDB = new db_model();
                      $p_rptJson = $objDB->compracarrito_buscar($p_codigoCompra);
                      $p_itemCompra = json_decode($p_rptJson, true);
                      //echo "hoal :" .$p_itemCompra;
                      if (isset($p_itemCompra['compra_id']) == null)
                      {

                       // echo "........... vacia"."<br>";
                        $p_itemsCompraDetalle = array();
                      }else
                      {
                       // echo "........... llena"."<br>";
                          $p_itemsCompraDetalle = $p_itemCompra['itemsCompradetallellecarritoMapear'];
                      }

                      

                      foreach ($p_itemsCompraDetalle as $p_itemCompraDetalle) 
                      {
                          $pcodigo = $p_itemCompraDetalle['compra_id'];        
                          

                ?>
                  <tr>
                    <td class="gc__tabla--id"><?php echo $p_itemCompraDetalle['compradetalle_id']; ?></td>
                    <td class="gc__tabla--producto"><?php echo $p_itemCompraDetalle['producto_nombre']; ?></td>
                    <td class="gc__tabla--cantidad"><?php echo $p_itemCompraDetalle['cantidad_compradetalle']; ?></td>
                    <td class="gc__tabla--precio"><?php echo $p_itemCompraDetalle['precio_compradetalle']; ?></td>
                    <td class="gc__tabla--precio"><?php echo $p_itemCompraDetalle['total_compradetalle']; ?></td>
                  </tr>
                <?php
                    }
                ?>
                </tbody>
              </table>
            </section>
            <div class="botones-generar-comprobante">
              <a href="vista-listar.php?token=<?php echo encriptar_parametro("3|3"); ?>" class="boton-gh boton"">Retornar</a>
             
              <input class="boton-gh boton" type="submit" name="boton_guardar" id="boton_guardar" value="Guardar" />
            </div>
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