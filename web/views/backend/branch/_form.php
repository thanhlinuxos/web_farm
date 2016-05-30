<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="col-xs-12">

            <div class="form-group ">
                <label class="control-label col-sm-3" for="fullname"><?php echo $this->lang->line('branch_name');?></label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name', $row['name']); ?>" placeholder="Enter Name">
                    <?php echo form_error('name', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="phone"><?php echo $this->lang->line('branch_address');?>:</label>
                <div class="col-sm-9">
                    <input type="text" name="address" class="form-control" id="address" value="<?php echo set_value('address', $row['address']); ?>" placeholder="Enter Address">
                </div>
            </div>
            <div class="form-group ">
                <label class="control-label col-sm-3" for="phone"><?php echo $this->lang->line('branch_phone');?> :</label>
                <div class="col-sm-9">
                    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo set_value('phone', $row['phone']); ?>" placeholder="Enter Phone">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save');?></button>
                </div>
            </div>
        </div>
    </form>
</div>
