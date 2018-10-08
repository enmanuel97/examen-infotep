<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Reportes</a>
            </li>
            <li class="breadcrumb-item active">Turnos en cola</li>
        </ol>

        <div class="card-body">
            <form action="<?php echo base_url('reports/turno_en_cola_report')?>" id="form-data">
                <div class="modal-response">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="button" id="submit-modal">Generar Reporte</button>
                    </div>
                </div>
            </form>

            <div class="report_view">

            </div>
        </div>
    </div>
</div>

<script>
    $('#submit-modal').click(function (e) {
        e.preventDefault();
        var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "html", selector:".report_view", messageError: ".modal-response"};
        DOM.submit(data);
    });
</script>
