<div id="modal_confirma_elimina" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
               
        <h4 class="modal-title">CONFIRMACIÓN DE ELIMINACIÓN</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>¿De verdad quieres eliminar el item seleccionado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">NO</button>
        <button type="button" class="btn btn-danger" onclick="<?php echo $nomfuncioneliminar; ?>()">SI</button>
      </div>
    </div>
  </div>
</div>     