<!-- Form -->
<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
    <div class="col-xs-12">
        <div class="form-group <?php if(form_error('fullname')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="fullname"><?php echo $this->lang->line('user_fullname'); ?>:</label>
            <div class="col-sm-6">
                <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo set_value('fullname', $row['fullname']); ?>" placeholder="Enter Full Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="gender"><?php echo $this->lang->line('user_gender'); ?>:</label>
            <div class="col-sm-6"> 
                <label class="radio-inline">
                    <input type="radio" name="gender" value="1" <?php echo set_radio('gender', 1, $row['gender'] == 1); ?>><?php echo $this->lang->line('user_gender_1'); ?>
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="0" <?php echo set_radio('gender', 0, $row['gender'] == 0); ?>><?php echo $this->lang->line('user_gender_0'); ?>
                </label>
            </div>  
        </div>
        <div class="form-group <?php if(isset($image_error)) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="phone"><?php echo $this->lang->line('user_image'); ?>:</label>
            <div class="col-sm-2">
                <img src="<?php echo $row['image_'];?>" width="120" />
            </div>
            <div class="col-sm-4">
                <input name="image" type="file" class="form-control">
                <?php
                if(isset($image_error)) {
                    echo "<small class='help-block'>".$image_error."</small>";
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="phone"><?php echo $this->lang->line('user_phone'); ?>:</label>
            <div class="col-sm-6">
                <input type="text" name="phone" class="form-control" id="phone" value="<?php echo set_value('phone', $row['phone']); ?>" placeholder="Enter Phone">
            </div>
        </div>
        <div class="form-group <?php if(form_error('email')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="email"><?php echo $this->lang->line('user_email'); ?>:</label>
            <div class="col-sm-6">
                <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email', $row['email']); ?>" placeholder="Enter email">
                <?php echo form_error('email', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="address"><?php echo $this->lang->line('user_address'); ?>:</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="address" id="address" placeholder="Enter Address"><?php echo set_value('address', $row['address']); ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="birthday"><?php echo $this->lang->line('user_birthday'); ?>:</label>
            <div class="col-sm-6">
                <div class='input-group date' >
                    <input type='text' name="birthday" class="form-control datepicker" id='birthday' value="<?php echo set_value('birthday', $row['birthday']); ?>" placeholder="Chose birthday" readonly="readonly" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="status"><?php echo $this->lang->line('user_status'); ?>:</label>
            <div class="col-sm-6"> 
                <label class="radio-inline">
                    <input type="radio" name="status" value="1" <?php echo set_radio('status', 1, $row['status'] == 1); ?>><?php echo $this->lang->line('user_status_1'); ?>
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" value="0" <?php echo set_radio('status', 0, $row['status'] == 0); ?>><?php echo $this->lang->line('user_status_0'); ?>
                </label>
            </div>  
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="note"><?php echo $this->lang->line('user_note'); ?>:</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="note" id="note"><?php echo set_value('note', $row['note']); ?></textarea>
            </div>
        </div>
        <hr>
        <div class="form-group <?php if(form_error('username')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="username"><?php echo $this->lang->line('user_username'); ?>:</label>
            <div class="col-sm-6">
                <input type="text" name="username" class="form-control" id="username" value="<?php echo set_value('username', $row['username']); ?>" placeholder="Enter Username" autocomplete="off">
                <?php echo form_error('username', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('password')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="password"><?php echo $this->lang->line('user_password'); ?>:</label>
            <div class="col-sm-6">
                <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password', ''); ?>" placeholder="Enter Password" autocomplete="off">
                <?php echo form_error('password', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save'); ?></button>
                <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
            </div>
        </div> 
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var dateToday = new Date();
        var yrRange = (dateToday.getFullYear() - 80) + ":" + (dateToday.getFullYear() - 10);
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: '-3650',
            changeMonth: true,
            changeYear: true,
            yearRange : yrRange
        });
        $.datepicker.setDefaults($.datepicker.regional[REGIONAL]);
    });
</script>