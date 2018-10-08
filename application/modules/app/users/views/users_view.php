<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Listado</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <i class="fas fa-table"></i> Listado de usuarios
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-primary modal_trigger" href="#" data-url="<?php echo base_url('users/add')?>" data-target="#users" data-toggle="modal"> Nuevo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Email</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users AS $user):?>
                            <tr>
                                <td><?php echo $user->full_name?></td>
                                <td><?php echo $user->type_name?></td>
                                <td><?php echo $user->email?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" id="showmore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="showmore">
                                            <a class="dropdown-item modal_trigger" href="#" data-url="<?php echo base_url('users/edit/'.$user->userId)?>" data-target="#users" data-toggle="modal">Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete-record" href="#" data-url="<?php echo base_url('users/delete/'.$user->userId);?>" data-return="<?php echo base_url('users')?>">Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"></div>
</div>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        var data = {selector: "#table", url: false};-->
<!--       loadDatatable(data);-->
<!--    });-->
<!--</script>-->

