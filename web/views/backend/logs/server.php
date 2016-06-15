<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('logs_server'); ?></h4>
</div>
<div class="row">
    <div class="col-sm-9">
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
    </div>
    <div class="col-sm-3">
        <nav>
            <ul class="nav">
                <li>
                    <a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="true"><strong>2016</strong><span class="caret"></span></a>
                    <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
                        <li>
                            <a href="#" id="btn-2" data-toggle="collapse" data-target="#submenu2" aria-expanded="false"><strong>--- 06</strong><span class="caret"></span></a>
                            <ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="btn-2">
                                <li><a href="#"><strong>------ log-2016-06-10</strong></a></li>
                                <li><a href="#">------ log-2016-06-11</a></li>
                                <li><a href="#">------ log-2016-06-12</a></li>
                            </ul>
                        </li>
                        <li><a href="#">--- 07</a></li>
                        <li><a href="#">--- 08</a></li>
                    </ul>
                </li>
                <li><a href="#">2017</a></li>
                <li><a href="#">2018</a></li>
            </ul>
        </nav>
    </div>
</div>



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