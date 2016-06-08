<?php
    $logs_search = $this->session->userdata('logs_search');
?>
<!-- Search Form -->
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('acp/logs/search'); ?>">
        <div class="col-sm-2">
            <select class="form-control select2" id="action_key" name="action_key">
                <option value="">---</option>
            <?php 
            foreach ($actions as $action)
            {
            ?>    
                <option value="<?php echo $action['action_key']?>" <?php echo set_select('action_key', $action['action_key'], $logs_search['action_key'] == $action['action_key']); ?>>
                    <?php echo $this->lang->line($action['action_key']);?>
                </option>
            <?php
            }
            ?>    
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control select2" id="action_key" name="username">
                <option value="">---</option>
            <?php 
            foreach ($users as $u)
            {
            ?>    
                <option value="<?php echo $u['username']?>" <?php echo set_select('username', $u['username'], $logs_search['username'] == $u['username']); ?>>
                    <?php echo $u['username'];?>
                </option>
            <?php
            }
            ?>    
            </select>
        </div>
        <div class="col-sm-2">
            <input type='text' name="from_date" class="form-control datepicker" id='from_date' value="" placeholder="From" readonly="readonly" />
        </div>
        <div class="col-sm-2">
            <input type='text' name="to_date" class="form-control datepicker" id='to_date' value="" placeholder="To" readonly="readonly" />
        </div>
        <div class="col-sm-2">
            <button type="submit" name="submit" value="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> <?php echo $this->lang->line('btn_search');?>
            </button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(".select2").select2({
        placeholder: "Chon hanh dong",
        allowClear: true
    });
</script>
<script type="text/javascript">
    $(function () {
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: 0,
            changeMonth: true,
            changeYear: true
        });
        $.datepicker.setDefaults($.datepicker.regional[REGIONAL]);
    });
    
    $(function () {
        $("#from_date").on("change", function (e) {
            var from_data = $("#from_date").datepicker('getDate');
            var day = Math.ceil((from_data - new Date())/86400000);
            console.log(day);
            
        });
        $("#to_date").on("change", function (e) {
            
        });
    });
    
</script>