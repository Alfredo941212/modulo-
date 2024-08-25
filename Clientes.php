<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['username'];
if ($varsesion == null || $varsesion = '') {
    header('Location: ../../pagina/iniciar_sesion.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../../info/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../info/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../pagina/principal.php">Regresar</a>
                </li>
            </ul>
        </div>

    </nav>
    <main>
        <div class="container py-3">
            <div class="row">
                <h1 class="text-center">Clientes</h1>
                <form class="row g-3 mb-6 d-flex justify-content-center">
                    <div class="col-auto col-lg-4 ">
                        <label for="searchInput" class="visually-hidden ">Buscar</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar">
                        <div id="result"></div>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#nuevocliente">
                            <i class="fa-solid fa-circle-plus"></i>
                            Agregar registro</a>
                    </div>
                    <div class="col-auto text-right">
                        <a class="btn btn-success" href="../../fpdf2/PruebaH.php" target="_blank">
                            <i class="fa-solid fa-file-pdf"></i>
                            Reportes</a>
                    </div>

                </form>

                <div class="table-responsive">
                    <h2 class="text-center mb-4 text-white">Nombre del Cliente </h2>
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Genero</th>
                                <th>RFC</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Calle</th>
                                <th>Número</th>
                                <th>Id Colonia</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../configuracion/basedatos.php';
                            $sqlClientes = "SELECT * from clientes";
                            $clientes = $conn->query($sqlClientes);

                            while ($informacion = $clientes->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $informacion['id_cliente']; ?></td>
                                    <td><?= $informacion['nombre']; ?></td>
                                    <td><?= $informacion['ap_paterno']; ?></td>
                                    <td><?= $informacion['ap_materno']; ?></td>
                                    <td><?= $informacion['genero']; ?></td>
                                    <td><?= $informacion['rfc']; ?></td>
                                    <td><?= $informacion['telefono']; ?></td>
                                    <td><?= $informacion['correo']; ?></td>
                                    <td><?= $informacion['fecha_nacimiento']; ?></td>
                                    <td><?= $informacion['calle']; ?></td>
                                    <td><?= $informacion['numero']; ?></td>
                                    <td><?= $informacion['id_colonia']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editaCliente"
                                                data-bs-id="<?= $informacion['id_cliente']; ?>"><i
                                                    class="fa-solid fa-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#eliminaModal"
                                                data-bs-id="<?= $informacion['id_cliente']; ?>"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </div>

                                    </td>
                                </tr>
                            <?php }
                            ?>

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </main>
    <?php
    $sqlColonia = "SELECT id_colonia, nombre_colonia FROM colonia";
    $nuevaColonia = $conn->query($sqlColonia);
    ?>
    <?php include 'Agregar.php'; ?>
    <?php include 'editar.php'; ?>
    <?php include 'eliminar.php'; ?>

    <script>
        //Modal de editar Cliente
        let editarModal = document.querySelector('#editaCliente');
        let eliminarModal = document.querySelector('#eliminaModal');


        editarModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-bs-id');

            let inpuID = editarModal.querySelector('.modal-body #idcliente');
            let nombre = editarModal.querySelector('.modal-body #nombre');
            let aPaterno = editarModal.querySelector('.modal-body #apaterno');
            let aMaterno = editarModal.querySelector('.modal-body #amaterno');
            let genero = editarModal.querySelector('.modal-body #genero');
            let rfc = editarModal.querySelector('.modal-body #rfc');
            let telefono = editarModal.querySelector('.modal-body #telefono');
            let correo = editarModal.querySelector('.modal-body #correo');
            let fechaNacimiento = editarModal.querySelector('.xmodal-body #fechanaci');
            let calle = editarModal.querySelector('.modal-body #calle');
            let numero = editarModal.querySelector('.modal-body #numero');
            let colonia = editarModal.querySelector('.modal-body #Colonia');

            let url = "getCliente.php"
            let formData = new FormData()
            formData.append('idcliente', id)

            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
                .then(data => {
                    inpuID.value = data.id_cliente;
                    nombre.value = data.nombre ? data.nombre.trim() : '';;
                    aPaterno.value = data.ap_paterno.trim();
                    aMaterno.value = data.ap_materno.trim();
                    genero.value = data.genero.trim();
                    rfc.value = data.rfc.trim();
                    telefono.value = data.telefono.trim();
                    correo.value = data.correo.trim();
                    fechaNacimiento.value = data.fecha_nacimiento.trim();
                    calle.value = data.calle.trim();
                    numero.value = data.numero.trim();
                    //colonia.value = data.id_colonia
                    document.ready = document.getElementById("Colonia").value = data.id_colonia;
                    // console.log('inputID');

                }).catch(err => console.log(err))

        });//fin de editar cliente
        eliminarModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-bs-id');
            eliminarModal.querySelector('.modal-footer #idcliente').value = id
        });

        const searchInput = document.querySelector('#searchInput');
        searchInput.addEventListener('input', function () {
            let query = this.value.toLowerCase();
            let rows = document.querySelectorAll('tbody tr');

            rows.forEach(function (row) {
                let cells = row.querySelectorAll('td');
                let match = Array.from(cells).some(function (cell) {
                    return cell.textContent.toLowerCase().includes(query);
                });
                row.style.display = match ? '' : 'none';
            });
        });
        function fnguardar() {
            //validar los inputs del form formAgregar
            let editarModal = document.querySelector('#nuevocliente');
            let editarModal = document.querySelector('#editaCliente');
            // let inpuID = editarModal.querySelector('.modal-body #idcliente');
            let nombre = editarModal.querySelector('.modal-body #nombre').value.trim();
            let aPaterno = editarModal.querySelector('.modal-body #apaterno').value.trim();
            let aMaterno = editarModal.querySelector('.modal-body #amaterno').value.trim();
            let genero = editarModal.querySelector('.modal-body #genero').value.trim();
            let rfc = editarModal.querySelector('.modal-body #rfc').value.trim();
            let telefono = editarModal.querySelector('.modal-body #telefono').value.trim();
            let correo = editarModal.querySelector('.modal-body #correo').value.trim();
            let fechaNacimiento = editarModal.querySelector('.modal-body #fechanaci').value.trim();
            let calle = editarModal.querySelector('.modal-body #calle').value.trim();
            let numero = editarModal.querySelector('.modal-body #numero').value.trim();
            let colonia = editarModal.querySelector('.modal-body #Colonia').value.trim();

            if (nombre.length == 0) {
                alert("Introduzca un nombre válido"); return;
            }
            if (aPaterno.length == 0) {
                alert("Introduzca un apellido válido"); return;
            }
            if (aMaterno.length == 0) {
                alert("Introduzca un apellido válido"); return;
            }
            if (genero.length == 0) {
                alert("Introduzca un Genero válido"); return;
            }
            if (calle.length == 0) {
                alert("Introduzca un Calle válido"); return;
            }
         
            // hacer el submit si ya no hay errores 
            document.getElementById(formAgregar).submit();

        }

    </script>

    <script src="../../info/js/bootstrap.bundle.min.js"></script>
</body>

</html>