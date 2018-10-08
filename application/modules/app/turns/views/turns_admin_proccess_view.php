<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Tickets</a>
            </li>
            <li class="breadcrumb-item active">Listado</li>
        </ol>

        <!-- DataTables Example -->
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
                                <th>Tipo</th>
                                <th>Ventanilla</th>
                                <th>Hora de Asignaci&oacute;n</th>
<!--                                <th>Tiempo en espera</th>-->
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($turns AS $turn):?>
                            <tr>
                                <td><?php echo $turn->turnId?></td>
                                <td><?php echo $turn->code?></td>
                                <td><?php echo $turn->name?></td>
                                <td><?php echo $turn->ventanilla?></td>
                                <td><?php echo date("g:i a", strtotime($turn->date_entry))?></td>
<!--                                <td>--><?php //echo date("g:i a", strtotime($turn->date_entry))?><!--</td>-->
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" id="showmore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="showmore">
                                            <a class="dropdown-item modal_trigger" href="#" data-url="<?php echo base_url('turns/edit/'.$turn->turnId)?>" data-target="#turns_modal" data-toggle="modal">Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete-record" href="#" data-url="<?php echo base_url('turns/complete/'.$turn->turnId);?>" data-return="<?php echo base_url('turns/turns_admin_proccess')?>">Completar</a>
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
<div class="modal fade" id="turns_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"></div>
</div>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        var data = {selector: "#table", url: false};-->
<!--       loadDatatable(data);-->
<!--    });-->
<!--</script>-->

