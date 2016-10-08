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
                <?php
                foreach ($logs_map as $key => $values) {
                    if(is_string($key)) {
                        echo "<li>";
                        echo "<a href='#' id='btn-".str_replace('\\', '', $key)."' data-toggle='collapse' data-target='#submenu-".str_replace('\\', '', $key)."' aria-expanded='true'>".str_replace('\\', '/', $key)."</a>";
                        if(count($values)) {
                            echo "<ul class='nav collapse' id='submenu-".str_replace('\\', '', $key)."' role='menu' aria-labelledby='btn-".str_replace('\\', '', $key)."'>";
                            foreach ($values as $k => $v) {
                                if(is_string($k)) {
                                    echo "<li>";
                                    echo "<a href='#' id='btn-".str_replace('\\', '', $key)."-".str_replace('\\', '', $k)."' data-toggle='collapse' data-target='#submenu-".str_replace('\\', '', $key)."-".str_replace('\\', '', $k)."' aria-expanded='false'>--- ".str_replace('\\', '/', $k)."</a>";
                                    if(count($v)) {
                                        echo "<ul class='nav collapse' id='submenu-".str_replace('\\', '', $key)."-".str_replace('\\', '', $k)."' role='menu' aria-labelledby='btn-".str_replace('\\', '', $key)."-".str_replace('\\', '', $k)."'>";
                                        foreach ($v as $file) {
                                            $date = str_replace(array('.txt','log-'), '', $file);
                                            echo "<li><a href='".  base_url('acp/logs/server?date='. nice_date($date, 'd-m-Y')) ."'>------ ".$file."</a></li>";
                                        }
                                        echo "</ul>";
                                    }
                                    echo "</li>";
                                }
                            }
                            echo "</ul>";
                        }                        
                        echo "</li>";
                    }
                }
                ?>
               
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