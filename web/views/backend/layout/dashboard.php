<script type="text/javascript" src="<?php echo base_url('vendor/rgraph/libraries/RGraph.common.core.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('vendor/rgraph/libraries/RGraph.common.key.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('vendor/rgraph/libraries/RGraph.pie.js'); ?>"></script>
<script type="text/javascript">
    function chart_users(input)
    {
        var data = [];
        var labels = [];
        input.forEach(function(item){
            data.push(item.y);
            labels.push(item.indexLabel);
        });
        // Create the Pie chart object
        var pie = new RGraph.Pie({
            id: 'cvs',
            data: data
        })
        // Append the number to the labels
        for (var i=0; i<data.length; ++i) {
            labels[i] = labels[i] + ': ' + RGraph.numberFormat(pie, data[i]) + ' (người)';
        }
        pie.set({
            labels: labels,
            labelsSticksList: true,
            strokestyle: 'white',
            linewidth: 1,
            textAccessible: true
        }).draw();
    };
    
    $(document).ready(function(){
        $.ajax({
            url: BASE_URL + '/acp/dashboard/charts',
            method: 'POST',
            data: {type: 'user'},
            success: function(response, status){
                chart_users(JSON.parse(response));
            }
        });
    });
</script>
<div class="row">
    <div class="col-xs-12">
        <canvas id="cvs" width="700" height="325">[No canvas support]</canvas>
    </div>
</div>