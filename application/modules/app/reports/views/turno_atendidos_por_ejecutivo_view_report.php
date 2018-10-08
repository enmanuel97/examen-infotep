<div class="table-responsive" style="padding-top: 30px">
    <div class="col-md-3" style="padding-bottom: 10px">
        <a href="<?php echo base_url('reports/turno_atendidos_por_ejecutivo_report/TRUE/'.$userId)?>" class="btn btn-dark" target="_blank"><i class="fa fa-print"></i>Imprimir</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#.Ticket</th>
            <th>Codigo</th>
            <th>Tipo</th>
            <th>Ejecutivo</th>
            <th>Tiempo de atenci&oacute;n</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($turns AS $turn):?>
            <tr>
                <td><?php echo $turn->turnId?></td>
                <td><?php echo $turn->code?></td>
                <td><?php echo $turn->name?></td>
                <td><?php echo $turn->user_name?></td>
                <?php
                    $date1 = new DateTime($turn->date_entry);
                    $date2 = new DateTime($turn->date_exit);
                    $result = $date1->diff($date2);

                    if($result->h == 0)
                    {
                        if($result->i != 0)
                        {
                            $diferencia = ($result->i > 1) ? $result->i." minutos" : $result->i." minuto";
                        }
                        else
                        {
                            $diferencia = "En proceso";
                        }
                    }
                    else
                    {
                        $minutos = ($result->i > 1) ? $result->i." minutos" : $result->i." minuto";
                        $diferencia   = ($result->h > 1) ? $result->h." horas y ".$minutos : $result->h." hora y ".$minutos;
                    }
                ?>
                <td><?php echo $diferencia;?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>