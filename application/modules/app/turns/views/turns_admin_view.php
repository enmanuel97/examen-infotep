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
                        <i class="fas fa-table"></i> Listado de tickets en cola
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
                                <th>Hora de creacion</th>
<!--                                <th>Tiempo en espera</th>-->
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($turns AS $turn):?>
                            <tr>
                                <td><?php echo $turn->turnId?></td>
                                <td><?php echo $turn->code?></td>
                                <td><?php echo $turn->name?></td>
                                <td><?php echo date("g:i a", strtotime($turn->date_entry))?></td>
<!--                                <td>--><?php //echo date("g:i a", strtotime($turn->date_entry))?><!--</td>-->
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

