<?php
    $logs_search = $this->session->userdata('logs_search');
?>
<!-- Search Form -->
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('acp/logs/search'); ?>">
        <div class="col-sm-1">
            <select class="form-control" id="table_name" name="table_name">
                <?php
                foreach ($table_list as $table) {
                ?>
                    <option value="<?php echo $table ?>" <?php echo set_select('table_name', $table, $logs_search['table_name'] == $table); ?>>
                        <?php echo str_replace('logs_', '', $table) ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>    
        <div class="col-sm-2">
            <select class="form-control" id="action_key" name="action_key">
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
            <select class="form-control" id="user_id" name="user_id">
                <option value="">---</option>
            <?php 
            foreach ($users as $u)
            {
            ?>    
                <option value="<?php echo $u['user_id']?>" <?php echo set_select('user_id', $u['user_id'], $logs_search['user_id'] == $u['user_id']); ?>>
                    <?php echo '['.$u['username'].'] '.$u['fullname'];?>
                </option>
            <?php
            }
            ?>    
            </select>
        </div>
        <div class="col-sm-2">
            <input type='text' name="from_date" class="form-control datepicker" id='from_date' value="<?php echo $logs_search['from_date']; ?>" placeholder="From" readonly="readonly" />
        </div>
        <div class="col-sm-2">
            <input type='text' name="to_date" class="form-control datepicker" id='to_date' value="<?php echo $logs_search['to_date']; ?>" placeholder="To" readonly="readonly" />
        </div>
        <div class="col-sm-2">
            <button type="submit" name="submit" value="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> <?php echo $this->lang->line('btn_search');?>
            </button>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#action_key").select2({
            placeholder: "Chon hanh dong",
            allowClear: true
        });
        $("#user_id").select2({
            placeholder: "Chon nhan vien",
            allowClear: true
        });
    });
        
</script>
<script type="text/javascript">
    $(function () {
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            beforeShow: customRange
        });
        $.datepicker.setDefaults($.datepicker.regional[REGIONAL]);
    });
    
    function customRange(){
        var dateMin = null;
	var dateMax = 0;
        
        if(this.id == 'from_date') {
            var to_data = $("#to_date").datepicker('getDate');
            if(to_data !== null) {
                dateMax = Math.ceil((to_data - new Date())/86400000);
            }
        }
        
        if(this.id == 'to_date') {
            var from_data = $("#from_date").datepicker('getDate');
            if(to_data !== null) {
                dateMin = Math.ceil((from_data - new Date())/86400000);
            }
        }
        
        return {
            minDate: dateMin,
            maxDate: dateMax
        }; 
    }
    
</script>