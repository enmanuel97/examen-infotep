<div class="table-responsive" style="padding-top: 30px">
    <div class="col-md-3" style="padding-bottom: 10px">
        <a href="<?php echo base_url('reports/turno_en_cola_report/TRUE')?>" class="btn btn-dark" target="_blank"><i class="fa fa-print"></i>Imprimir</a>
    </div>
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