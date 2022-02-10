<?php

include 'dbapi/api_model.php';

$p_nombre = 'luana bustillos11';
$p_estado = '';

$postData = array(
    'categoria_id' => '',
    'descripcion' => $p_nombre,
    'imagen' => '',
    'estado' => $p_estado
);          




  $objapi = new api_model();

  $p_rptJson = $objapi->categoria_registrar($postData);

  $p_itemsCategoria = json_decode($p_rptJson, true);

  print_r("respuesta");
  echo $p_itemsCategoria['mensaje_id'];
  echo $p_itemsCategoria['mensaje'];



?>