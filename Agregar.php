<?php
require '../configuracion/basedatos.php';
    $sqlColonia = "SELECT id_colonia, nombre_colonia FROM colonia";
    $nuevaColonia = $conn->query($sqlColonia);
    ?>

<div class="modal fade" id="nuevocliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoclienteModal">Agregar cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAgregar" action="Guardar.php" method="post" enctype="multipart/form-data" class="was-validated">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required pattern="[A-Za-z\s]+" title="El nombre solo debe contener letras y espacios">
            <!--<div class="valid-feedback">Valid.</div>-->
            <div class="invalid-feedback">Introduzca un nombre válido</div>
          </div>

          <div class="mb-3">
            <label for="apaterno" class="form-label">Apellido Paterno:</label>
            <input type="text" name="apaterno" id="apaterno" class="form-control" required pattern="[A-Za-z\s]+" title="El nombre solo debe contener letras y espacios">
            <div class="invalid-feedback">Introduzca un nombre válido</div>
          </div>

          <div class="mb-3">
            <label for="amaterno" class="form-label">Apellido Materno: </label>
            <input type="text" name="amaterno" id="amaterno" class="form-control" required pattern="[A-Za-z\s]+" title="El nombre solo debe contener letras y espacios">
            <div class="invalid-feedback">Introduzca un nombre válido</div>
          </div>

          <div class="mb-3">
            <label for="genero" class="form-label">Género:</label>
            <input type="text" id="genero" name="genero" class="form-control" required pattern="[A-Za-z\s]+" title="El nombre solo debe contener letras y espacios">
            <div class="invalid-feedback">Introduzca un nombre válido</div>
  
          </div>

          <div class="mb-3">
            <label for="rfc" class="form-label">RFC: </label>
            <input type="text" name="rfc" id="rfc" class="form-control" pattern="[A-ZÑ&]{3,4}\d{6}[A-Z0-9]{3}" title="Por favor, ingresa un RFC válido">
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono: </label>
            <input type="phone" name="telefono" id="telefono" class="form-control" pattern="\d{10}" title="Por favor, ingrese un número de teléfono de 10 dígitos">
          </div>

          <div class="mb-3">
            <label for="correo" class="form-label">Correo: </label>
            <input type="email" name="correo" id="correo" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="fechanaci" class="form-label">Fecha de nacimiento: </label>
            <input type="date" name="fechanaci" id="fechanaci" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="calle" class="form-label">Calle: </label>
            <input type="text" name="calle" id="calle" class="form-control" required pattern="[A-Za-z\s]+" title="El nombre solo debe contener letras y espacios">
            <div class="invalid-feedback">Introduzca un nombre válido</div>
          </div>

          <div class="mb-3">
            <label for="numero" class="form-label">Número: </label>
            <input type="number" name="numero" id="numero" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="Colonia" class="form-label"> Colonia </label>
            <select name="Colonia" id="Colonia" class="form-select" required>
              <option value="">Seleccionar..</option>
              <?php while ($row_colonia = $nuevaColonia->fetch_assoc()) { ?>
                <option value="<?php echo $row_colonia["id_colonia"]; ?>"><?= $row_colonia["nombre_colonia"] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit"  onclick="fnguardar()" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar cambios </button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


</script>