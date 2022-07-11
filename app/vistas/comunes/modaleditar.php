
<!-- Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title" id="editModalLabel">Editar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Esta seguro que desea editar el registro ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                <a href="#" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('edit-form').submit();">Aceptar</a>
                <span id="spanEdit">&nbsp;</span>
            </div>
        </div>
    </div>
</div>