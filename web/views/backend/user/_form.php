<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" role="form" method="POST" autocomplete="off">
            <div class="form-group <?php if(form_error('fullname')) echo 'has-error'; ?>">
                <label class="control-label col-sm-2" for="fullname">Full Name:</label>
                <div class="col-sm-4">
                    <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo set_value('fullname', ''); ?>" placeholder="Enter Full Name">
                    <?php echo form_error('fullname', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="group">Group:</label>
                <div class="col-sm-4"> 
                    <label class="radio-inline">
                        <input type="radio" name="group_id" value="1" <?php echo set_radio('group_id', '1'); ?>>Admin
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group_id" value="0" <?php echo set_radio('group_id', '2'); ?>>Manager
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group_id" value="0" <?php echo set_radio('group_id', '3'); ?>>Technical
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group_id" value="0" <?php echo set_radio('group_id', '4'); ?>>Accountancy
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group_id" value="0" <?php echo set_radio('group_id', '5'); ?>>Employee
                    </label>
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender:</label>
                <div class="col-sm-4"> 
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="1" <?php echo set_radio('gender', '1', TRUE); ?>>Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="0" <?php echo set_radio('gender', '0'); ?>>Female
                    </label>
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone:</label>
                <div class="col-sm-4">
                    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo set_value('fullname', ''); ?>" placeholder="Enter Phone">
                </div>
            </div>
            <div class="form-group <?php if(form_error('email')) echo 'has-error'; ?>">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email', ''); ?>" placeholder="Enter email">
                    <?php echo form_error('email', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Address:</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="address" id="address" placeholder="Enter Address"><?php echo set_value('address', ''); ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="birthday">Birthday:</label>
                <div class="col-sm-2">
                    <div class='input-group date' >
                        <input type='text' name="birthday" class="form-control datepicker" name="birthday" id='birthday' value="<?php echo set_value('birthday', ''); ?>" placeholder="Chose birthday" readonly="readonly" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Status:</label>
                <div class="col-sm-4"> 
                    <label class="radio-inline">
                        <input type="radio" name="status" value="1" <?php echo set_radio('status', '1', TRUE); ?>>Active
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="0" <?php echo set_radio('status', '0'); ?>>Lock
                    </label>
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="note">Note:</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="note" id="note"><?php echo set_value('note', ''); ?></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group <?php if(form_error('username')) echo 'has-error'; ?>">
                <label class="control-label col-sm-2" for="username">Username:</label>
                <div class="col-sm-4">
                    <input type="text" name="username" class="form-control" id="username" value="<?php echo set_value('username', ''); ?>" placeholder="Enter Username">
                    <?php echo form_error('username', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-4">
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password', ''); ?>" placeholder="Enter Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
        </form>
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
        $.datepicker.setDefaults($.datepicker.regional[regional]);
    });
</script>