<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido</title>

    <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/sweetalert2/sweetalert.css">

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/proccess.js"></script>
    <script src="assets/js/dom.js"></script>
    <script src="assets/vendor/sweetalert2/sweetalert.js"></script>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Bienvenido seleccione un servicio</div>
            <div class="card-body">
                <form action="<?php echo base_url('turns/insert')?>" id="form-data">
                    <div class="modal-response"></div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label for="serviceId">Seleccione un tipo de servicio</label>
                            <br>
                            <select name="serviceId" id="serviceId" class="form-control">
                                <option value="0"> Seleccione una opci&oacute;n</option>
                                <?php foreach($this->services AS $service):?>
                                <option value="<?php echo $service->serviceId?>" data-prefix="<?php echo $service->prefix?>"><?php echo $service->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" id="submit-modal">Guardar</button>
                </form>
                <div class="text-center" style="padding-top: 15px">
                    <hr>
                    <p style="margin-bottom: 0px !important;">Si tiene un usuario en el sistema <a class="d-block small" target="_blank" href="<?php echo base_url('login')?>">Click Aqui!</a></p>
                </div>
            </div>
        </div>
        <br>

        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <i class="fas fa-table"></i> Listado de tickets en proceso
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>#.Ticket</th>
                                <th>Codigo</th>
                                <th>Ventanilla</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($turns AS $turn):?>
                            <tr>
                                <td><?php echo $turn->turnId?></td>
                                <td><?php echo $turn->code?></td>
                                <td><?php echo $turn->ventanilla?></td>
                                <td><?php echo $turn->name?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                DOM.getAppend({method : 'get', url : '<?php echo base_url('home/table')?>', selector : '.table-responsive', action : 'html'});
            }, 5000);
            var hora_disponible = '<?php echo $hora_available?>';
            var hora_cierre     = '<?php echo $this->hour_exit?>';

            if(hora_disponible >= hora_cierre)
            {
                swal('Atencion',"No puede generar mas ticket, pronto cerraremos.", 'warning');
                $('#submit-modal').attr('disabled', true);
                $('#form-data').removeAttr('action');
            }

            $('#submit-modal').click(function (e) {
                e.preventDefault();
                var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "redirect", messageError: ".modal-response", showAlert: true, titleResponse: "Exito!", textResponse: "Ticket Creado"};
                DOM.submit(data);
            });
        });
    </script>
</body>
</html>
