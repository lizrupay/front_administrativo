<?php

  //$p_menu  = $_GET["m"];
  //$p_submenu  = $_GET["s"];


  include 'componentes/seguridad.php';
 
  $p_token  = $_GET["token"];
  $dato_desencriptado = desencriptar_parametro($p_token);
  $separador = "|";
  $separada = explode($separador, $dato_desencriptado);

  $p_menu     = $separada[0];
  $p_submenu  = $separada[1];



  //Mantenimiento
  if ($p_menu == "1")
  {

    //Mantenimiento
    if ($p_submenu == "1")
    {

      include 'vista/vista-marca-agregar.php';

    }else
    if ($p_submenu == "2")
    {

      include 'vista/vista-categoria-agregar.php';

    }else
    if ($p_submenu == "3")
    {

      include 'vista/vista-subcategoria-agregar.php';

    }else
    if ($p_submenu == "4")
    {

      include 'vista/vista-tipodoc-agregar.php';

    }else
    if ($p_submenu == "5")
    {

      include 'vista/vista-tipocom-agregar.php';

    } else
    if ($p_submenu == "6")
    {

      include 'vista/vista-usuario-agregar.php';

    }    

  }else
  {
    // Venta
    if ($p_menu == "2")
    {

            // Sub Opciones de Ventas
            if ($p_submenu == "1")
            {
        
              include 'vista/vista-rventa-agregar.php';
        
            }else
            if ($p_submenu == "2")
            {
        
              include 'vista/vista-cliente-agregar.php';
        
            } else
            if ($p_submenu == "3")
            {
        
              include 'vista/vista-cstock-agregar.php';
        
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
                  include 'vista/vista-producto-agregar.php';
            
                }else
                if ($p_submenu == "2")
                {
                  //registo de compra
                  include 'vista/vista-proveedor-agregar.php';
            
                }else
                if ($p_submenu == "3")
                {
                  //registo de compra
                  include 'vista/vista-rcompra-agregar.php';
            
                }         
          }      
       }
  }
?>