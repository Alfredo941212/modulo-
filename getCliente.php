<?php

require '../configuracion/basedatos.php';

$id= $_POST["idcliente"];

$sql="SELECT id_cliente, nombre, ap_paterno, ap_materno, genero, rfc, telefono, correo, fecha_nacimiento, calle, numero, id_colonia FROM clientes WHERE id_cliente=$id";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$cliente = [];
#print_r($cliente);
if($rows > 0){
    $cliente = $resultado->fetch_array();
}

echo json_encode($cliente ,JSON_UNESCAPED_UNICODE);