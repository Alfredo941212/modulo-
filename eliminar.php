<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminaModalLabel">Eliminar cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Desea eliminar el cliente?
          </div>
          <div class="modal-footer">
              <form action="delete.php" method="post">
                <input type="hidden" name="idcliente" id="idcliente">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Eliminar </button>
              </form>
          </div>
       

          <div class="modal-footer">

          </div>
        </div>
      </div>
</div>