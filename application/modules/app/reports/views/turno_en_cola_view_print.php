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
    <div class="card mx-auto mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    Tickets en cola
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="padding-top: 30px">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#.Ticket</th>
                        <th>Codigo</th>
                        <th>Tipo</th>
                        <th>Hora de creacion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($turns AS $turn):?>
                        <tr>
                            <td><?php echo $turn->turnId?></td>
                            <td><?php echo $turn->code?></td>
                            <td><?php echo $turn->name?></td>
                            <td><?php echo date("g:i a", strtotime($turn->date_entry))?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Core plugin JavaScript-->
<script>
    window.print();
</script>
</body>
</html>
