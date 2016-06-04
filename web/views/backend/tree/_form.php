<!-- Form -->
<div class="row">
    <div class="col-xs-12">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group <?php if(form_error('branch_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="branch_id"><?php echo $this->lang->line('branch_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="branch_id" name="branch_id" onchange="get_land_li(this.value);">
                    <option value=""><?php echo $this->lang->line('branch_please_select'); ?></option>
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
        <div class="form-group <?php if(form_error('land_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="land_id"><?php echo $this->lang->line('land_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="land_id" name="land_id" onchange="get_duple_li(this.value)">
                    <option value=""><?php echo $this->lang->line('branch_please_select'); ?></option>
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
        <div class="form-group <?php if(form_error('duple_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="duple_id"><?php echo $this->lang->line('duple_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="duple_id" name="duple_id" onchange="get_row_li(this.value)">
                    <option value=""><?php echo $this->lang->line('branch_please_select'); ?></option>
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
        <div class="form-group <?php if(form_error('row_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="row_id"><?php echo $this->lang->line('row_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="row_id" name="row_id">
                    <option value=""><?php echo $this->lang->line('branch_please_select'); ?></option>
                <?php
                    foreach($rows as $r) {
                ?>
                    <option value="<?php echo $r['id'];?>" <?php echo set_select('row_id', $r['id'], $row['row_id'] == $r['id']); ?>><?php echo $r['name'];?></option>
                <?php
                    }
                ?>    
                </select>
                <?php echo form_error('row_id', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('quantity')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="quantity"><?php echo $this->lang->line('tree_quantity'); ?>:</label>
            <div class="col-sm-9">
                <input type="text" name="quantity" class="form-control" id="quantity" value="<?php echo set_value('quantity', $row['quantity']); ?>" placeholder="Enter Quantity">
                <?php echo form_error('quantity', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
       
        <div class="form-group">
            <label class="control-label col-sm-3" for="gender"><?php echo $this->lang->line('tree_status'); ?>:</label>
            <div class="col-sm-9"> 
                <label class="radio-inline">
                    <input type="radio" name="status" value="0" <?php echo set_radio('status', 0, $row['status'] == 0); ?>><?php echo $this->lang->line('tree_status_0'); ?>
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" value="1" <?php echo set_radio('status', 1, $row['status'] == 1); ?>><?php echo $this->lang->line('tree_status_1'); ?>
                </label>
            </div>  
        </div>
        
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save'); ?></button>
            </div>
        </div>
        </form>
    </div>
</div>