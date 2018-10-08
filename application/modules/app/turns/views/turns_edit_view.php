<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ticket</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url('turns/update/'.$row->turnId)?>" id="form-data">
            <div class="modal-response"></div>
            <div class="form-group">
                <div class="form-label-group">
                    <label for="serviceId">Seleccione un tipo de servicio</label>
                    <br>
                    <?php echo form_dropdown('serviceId', $this->services, $row->serviceId,"id='serviceId' class='form-control'")?>
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
        var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "redirect", messageError: ".modal-response", showAlert: true, titleResponse: "Exito!", textResponse: "Datos Actualizados"};
        DOM.submit(data);
    });
</script>