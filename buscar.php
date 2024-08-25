<?php

require '../configuracion/basedatos.php';
if (isset($_POST['query'])) {
    $query = $conn->real_escape_string($_POST['query']);
    $sql = "SELECT * FROM clientes WHERE nombre LIKE '%$query%' OR ap_paterno LIKE '%$query%'";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
}

$conn->close();
?>