<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off">
    <div class="col-xs-12">
        <div class="form-group <?php if(form_error('land_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="land_id"><?php echo $this->lang->line('land_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="land_id" name="land_id">
                    <option value="">Please select land</option>
                <?php
                    foreach($lands as $land) {
                ?>
                    <option value="<?php echo $land['id'];?>" <?php echo set_select('land_id', $land['id'], $row['land_id'] == $land['id']); ?>><?php echo $land['name'];?></option>
                <?php
                    }
                ?>    
                </select>
                <?php echo form_error('land_id', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('name')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="name"><?php echo $this->lang->line('duple_name'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name', $row['name']); ?>" placeholder="Enter Name">
                <?php echo form_error('name', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('ordinal')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="axis_x"><?php echo $this->lang->line('duple_ordinal'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="ordinal" class="form-control" id="axis_x" value="<?php echo set_value('ordinal', $row['ordinal']); ?>" placeholder="Enter Ordinal">
                <?php echo form_error('ordinal', "<small class='help-block'>", '</small>'); ?>
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

