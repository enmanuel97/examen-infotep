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