<?php

require '../configuracion/basedatos.php';

$id=$conn->real_escape_string($_POST['idcliente']);
$nombre=$conn->real_escape_string( $_POST["nombre"]);
$apellido_pat=$_POST["apaterno"];
$apellido_mat=$_POST["amaterno"];
$genero=$_POST["genero"];
$rfc=$_POST["rfc"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$fecha=$_POST["fechanaci"];
$calle=$_POST["calle"];
$numero=$_POST["numero"];
$colonia=$_POST["Colonia"];

$nombre= trim($nombre);
if ( strlen($nombre) ==0 ){
    echo "no se permite espaciados";
    exit;
}

$sql="UPDATE clientes SET nombre='$nombre', ap_paterno='$apellido_pat', ap_materno='$apellido_mat', genero='$genero', rfc='$rfc', telefono='$telefono', 
correo='$correo', fecha_nacimiento='$fecha', calle='$calle', numero='$numero', id_colonia=$colonia WHERE id_cliente=$id"; 


if ($conn->query($sql)) {
    $id= $conn->insert_id;
}

header('Location: Clientes.php');