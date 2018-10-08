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
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/sweetalert2/sweetalert.css">

    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/proccess.js"></script>
    <script src="<?php echo base_url()?>assets/js/dom.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/sweetalert2/sweetalert.js"></script>
</head>
<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    Ticket de verificacion
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?php echo base_url()?>" class="btn btn-primary">Ir Atras</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" id="form-data">
                <div class="modal-response"></div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="serviceId">Nombre de servicio:</label>
                        <span><?php echo $turn->name?></span>
                    </div>
                    <div class="form-label-group">
                        <label for="serviceId">Codigo:</label>
                        <span><?php echo $turn->code?></span>
                    </div>
                    <div class="form-label-group">
                        <label for="serviceId">Hora de asignacion:</label>
                        <span><?php echo date("g:i a", strtotime(substr($turn->date_entry,10,10)))?></span>
                    </div>
                    <div class="form-label-group">
                        <label for="serviceId">Hora estimada para ser atendido:</label>
                        <?php
                            $date = $turn->date_entry;
                            if($count > 0 && $count < 5)
                            {
                                $minutes = "+20 minute";
                            }else if($count > 5 && $count < 10){
                                $minutes ="+40 minute";
                            }else if($count > 10)
                            {
                                $minutes = "+60 minute";
                            }else
                            {
                                $minutes = "+5 minute";
                            }
                            $new_date = strtotime($minutes, strtotime($date));
                            $new_date = date("Y-m-d H:i:s", $new_date);
                            ?>
                        <span><?php echo date("g:i a", strtotime(substr($new_date,10,10)))?></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <span>Pronto sera atendido. Pd: La hora estimada puede no ser exacta.</span>
        </div>
    </div>
</div>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submit-modal').click(function (e) {
            e.preventDefault();
            var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "redirect", messageError: ".modal-response", showAlert: true, titleResponse: "Exito!", textResponse: "Ticket Creado"};
            DOM.submit(data);
        });
    });
</script>
</body>
</html>
