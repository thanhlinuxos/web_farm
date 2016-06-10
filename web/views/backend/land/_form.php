<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
    <div class="col-xs-12">
        <div class="form-group <?php if(form_error('branch_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="branch_id"><?php echo $this->lang->line('branch_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="branch_id" name="branch_id">
                    <option value="">Please select branch</option>
                <?php
                    foreach($branchs as $branch) {
                ?>
                    <option value="<?php echo $branch['id'];?>" <?php echo set_select('branch_id', $branch['id'], $row['branch_id'] == $branch['id']); ?>><?php echo $branch['name'];?></option>
                <?php
                    }
                ?>    
                </select>
                <?php echo form_error('branch_id', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('name')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="name"><?php echo $this->lang->line('land_name'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name', $row['name']); ?>" placeholder="Enter Name">
                <?php echo form_error('name', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('axis_x')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="axis_x"><?php echo $this->lang->line('land_axis_x'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="axis_x" class="form-control" id="axis_x" value="<?php echo set_value('axis_x', $row['axis_x']); ?>" placeholder="Enter Axis_x">
                <?php echo form_error('axis_x', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('axis_y')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="axis_y"><?php echo $this->lang->line('land_axis_y'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="axis_y" class="form-control" id="axis_y" value="<?php echo set_value('axis_y', $row['axis_y']); ?>" placeholder="Enter Axis_y">
                <?php echo form_error('axis_y', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(isset($image_error)) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="image"><?php echo $this->lang->line('land_image'); ?>:</label>
            <div class="col-sm-2">
                <img src="<?php echo $row['image_'];?>" width="120" />
            </div>
            <div class="col-sm-7">
                <input name="image" type="file" class="form-control">
                <?php
                if(isset($image_error)) {
                    echo "<small class='help-block'>".$image_error."</small>";
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save'); ?></button>
                <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
            </div>
        </div>
    </div>
    </form>
</div>

