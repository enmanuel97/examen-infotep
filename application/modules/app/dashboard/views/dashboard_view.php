<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>
        <?php if ($this->session->userdata('typeId') == 1):?>
        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Cantidad de ticket por hora
            </div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
        </div>
        <?php endif;?>
    </div>
    <!-- /.container-fluid -->
</div>
<?php if ($this->session->userdata('typeId') == 1):?>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Bar Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["8AM", "9AM", "10AM", "11AM", "12AM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM"],
            datasets: [{
                label: "Tickets Generados",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: [
                    '<?php echo $grafico[0]?>',
                    '<?php echo $grafico[1]?>',
                    '<?php echo $grafico[2]?>',
                    '<?php echo $grafico[3]?>',
                    '<?php echo $grafico[4]?>',
                    '<?php echo $grafico[5]?>',
                    '<?php echo $grafico[6]?>',
                    '<?php echo $grafico[7]?>',
                    '<?php echo $grafico[8]?>',
                    '<?php echo $grafico[9]?>',
                    '<?php echo $grafico[10]?>'
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'hour'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: true
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });

</script>
<?php endif;?>
