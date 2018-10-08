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
        <div class="card mx-auto mt-5">
            <div class="card-header">Bienvenido</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>Fecha de creacion</th>
                            <th>Tipo</th>
                            <th>Codigo</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($turns AS $turn):?>
                            <tr>
                                <td><?php echo $user->date_entry?></td>
                                <td><?php echo $user->serviceId?></td>
                                <td><?php echo $user->code?></td>
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
            $('#submit-modal').click(function (e) {
                e.preventDefault();
                var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "redirect", messageError: ".modal-response", showAlert: true, titleResponse: "Exito!", textResponse: "Ticket Creado"};
                DOM.submit(data);
            });
        });

    </script>
</body>
</html>
