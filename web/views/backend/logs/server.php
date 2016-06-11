<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('logs_server'); ?></h4>
</div>
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('acp/logs/server'); ?>">
        <div class="col-sm-2">
            <input type="text" name="date" class="form-control datepicker" value="<?php echo $row['date']; ?>" placeholder="Chose date" readonly>
        </div>
        <div class="col-sm-2">
            <button type="submit" name="submit" value="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> <?php echo $this->lang->line('btn_search');?>
            </button>
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
        </div>
    </form>
</div>
<?php echo $row['logs']; ?>
<div class="row">
    <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/logs'); ?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
    </div> 
</div>
<script type="text/javascript">
    $(function () {
        
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: '0',
            changeMonth: true,
            changeYear: true
        });
        $.datepicker.setDefaults($.datepicker.regional[REGIONAL]);
    });
</script>