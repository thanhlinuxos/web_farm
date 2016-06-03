<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off">
    <div class="col-xs-12">
        <div class="form-group <?php if(form_error('duple_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="duple_id"><?php echo $this->lang->line('duple_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="duple_id" name="duple_id">
                    <option value="">Please select duple</option>
                <?php
                    foreach($duples as $duple) {
                ?>
                    <option value="<?php echo $duple['id'];?>" <?php echo set_select('duple_id', $duple['id'], $row['duple_id'] == $duple['id']); ?>><?php echo $duple['name'];?></option>
                <?php
                    }
                ?>    
                </select>
                <?php echo form_error('duple_id', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('name')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="name"><?php echo $this->lang->line('row_name'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name', $row['name']); ?>" placeholder="Enter Name">
                <?php echo form_error('name', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('ordinal')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="axis_x"><?php echo $this->lang->line('row_ordinal'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="ordinal" class="form-control" id="axis_x" value="<?php echo set_value('ordinal', $row['ordinal']); ?>" placeholder="Enter Ordinal">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save'); ?></button>
            </div>
        </div>
    </div>
    </form>
</div>

