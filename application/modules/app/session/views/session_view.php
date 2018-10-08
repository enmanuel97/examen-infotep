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
        <div class="card-header">Bienvenido</div>
        <div class="card-body">
            <form action="<?php echo base_url('session/auth')?>" id="form-data">
                <div class="modal-response"></div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="email">Email address</label>
                        <input type="text" id="email" class="form-control" required="required" name="email" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" required="required">
                    </div>
                </div>
                <button class="btn btn-primary" type="button" id="submit-modal">Iniciar Sesion</button>
            </form>
        </div>
    </div>
</div>
<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submit-modal').click(function (e) {
            e.preventDefault();
            var data = {type: "post", url: $('#form-data').attr('action'), form: "#form-data", doAfter: "redirect", messageError: ".modal-response", showAlert: true, titleResponse: "Exito!", textResponse: "Usuario Logueado"};
            DOM.submit(data);
        });
    });

</script>
</body>
</html>
