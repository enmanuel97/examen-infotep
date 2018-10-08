<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuarios</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url('users/insert')?>" id="form-data">
            <div class="modal-response"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email/Usuario</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="typeId">Tipo</label>
                        <?php echo form_dropdown('typeId', $this->types, '2', "id='typeId' class='form-control'")?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="button" id="submit-modal">Guardar</button>
    </div>
</div>

<script>
    $('#submit-modal').click(function (e) {
        e.preventDefault();
        var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "datatable", messageError: ".modal-response", showAlert: true, titleResponse: "Exito!", textResponse: "Usuario Registrado"};
        DOM.submit(data);
    });
</script>