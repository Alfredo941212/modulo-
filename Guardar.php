<?php

require '../configuracion/basedatos.php';


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

$sql="INSERT into clientes(nombre, ap_paterno, ap_materno, genero, rfc, telefono, correo, fecha_nacimiento, calle, numero, id_colonia)values 
('$nombre', '$apellido_pat', '$apellido_mat', '$genero','$rfc', '$telefono', '$correo', '$fecha', '$calle','$numero', '$colonia')";

if ($conn->query($sql)) {
    $id= $conn->insert_id;
}

header('Location: Clientes.php');