<?php

  include 'componentes/seguridad.php';
 
  $p_token  = $_GET["token"];
  $dato_desencriptado = desencriptar_parametro($p_token);
  $separador = "|";
  $separada = explode($separador, $dato_desencriptado);

  $p_menu  = $separada[0];
  $p_submenu  = $separada[1];

  //Mantenimiento
  if ($p_menu == "1")
  {

    //Mantenimiento
    if ($p_submenu == "1")
    {

      include 'vista/vista-marca-listar.php';

    }else
    if ($p_submenu == "2")
    {

      include 'vista/vista-categoria-listar.php';

    }else
    if ($p_submenu == "3")
    {

      include 'vista/vista-subcategoria-listar.php';

    }else
    if ($p_submenu == "4")
    {

      include 'vista/vista-tipodoc-listar.php';

    } else
    if ($p_submenu == "5")
    {

      include 'vista/vista-tipocom-listar.php';

    }else
    if ($p_submenu == "6")
    {

      include 'vista/vista-usuario-listar.php';

    }       

  }else
  {
    // Venta
    if ($p_menu == "2")
    {

            // Sub Opciones de Ventas
            if ($p_submenu == "1")
            {
        
              include 'vista/vista-rventa-listar.php';
        
            }else
            if ($p_submenu == "2")
            {
        
              include 'vista/vista-cliente-listar.php';
        
            } else
            if ($p_submenu == "3")
            {
        
              include 'vista/vista-cstock-listar.php';
        
            }      

    }else
    {
          // Compra
          if ($p_menu == "3")
          {

                // Sub Opciones de Compra
                if ($p_submenu == "1")
                {
                  //Producto
                  include 'vista/vista-producto-listar.php';
            
                }else
                if ($p_submenu == "2")
                {
                  //registo de compra
                  include 'vista/vista-proveedor-listar.php';
            
                }else
                if ($p_submenu == "3")
                {
                  //registo de compra
                  include 'vista/vista-rcompra-listar.php';
            
                }          
          }      
    }

  }
?>

