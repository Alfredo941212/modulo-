<?php

require '../configuracion/basedatos.php';

$id=$conn->real_escape_string($_POST['idcliente']);


$sql="DELETE FROM clientes WHERE id_cliente=$id"; 


if ($conn->query($sql)) {
}

header('Location: Clientes.php');