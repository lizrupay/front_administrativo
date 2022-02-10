
<?php 

include 'db/db_model.php'; 
include 'componentes/seguridad.php'; 

            

                $postData = array(
                  'menu' => '1',
                  'submenu' => '2',
                  'codigo' => '',
                  'buscardat' => '',
                  'buscarpos' => ''
                  ); 

                $p_parametro_decode = "1|2";
                $dato_encriptado = encriptar_parametro($p_parametro_decode);

                echo "Incriptado";
                echo "<br>";
                echo $dato_encriptado;
                echo "<br>";

                $dato_desencriptado = desencriptar_parametro($dato_encriptado);
                echo "Desincriptar";
                echo "<br>";
                echo $dato_desencriptado;
                echo "<br>";

                
                $separador = "|";
                $separada = explode($separador, $dato_desencriptado);


                echo "Menu:".$separada[0];
                echo "<br>";

                echo "SubMenu:".$separada[1];
                echo "<br>";

                echo "inicio llamada "."<br>";
                  
                $objdb = new db_model();

                $p_rptJson = $objdb->categoria_listar();


                $p_itemsCategoria = json_decode($p_rptJson, true);
 
                //echo $p_itemsCategoria;

                
                foreach ($p_itemsCategoria as $p_itemCategoria) {
                    echo '<pre>';
                    print_r($p_itemCategoria);
                  //  print_r($p_itemCategoria['descripcion']);
                    echo '</pre>';
                }
                

                echo "final llamada "."<br>";


              ?>