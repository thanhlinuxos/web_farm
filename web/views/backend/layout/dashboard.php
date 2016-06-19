<script type="text/javascript" src="<?php echo base_url('vendor/canvasjs/canvasjs.min.js'); ?>"></script>
<script type="text/javascript">
    function chartUsers(data){
        var chart = new CanvasJS.Chart("chartUsers",
            {
                theme: "theme3",
                title: {
                    text: "Biểu đồ tổng quát nhân viên"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{y} - #percent %",
                        yValueFormatString: "#0.# người",
                        legendText: "{indexLabel}",
                        dataPoints: data
                    }
                ]
            });
        chart.render();
        $('.canvasjs-chart-credit').hide();
    }
    $(document).ready(function(){
        $.ajax({
            url: BASE_URL + '/acp/dashboard/charts',
            method: 'POST',
            data: {type: 'user'},
            success: function(response, status){
                chartUsers(JSON.parse(response));
            }
        });
    });
</script>
<div class="row">
    <div class="col-xs-12">
        <div id="chartUsers" style="height: 400px; width: 100%;"></div>
    </div>
</div>