<div class="row">
    <div class="col-xs-7">
        <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group <?php if(form_error('fullname')) echo 'has-error'; ?>">
                <label class="control-label col-sm-3" for="fullname"><?php echo $this->lang->line('user_fullname'); ?>:</label>
                <div class="col-sm-9">
                    <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo set_value('fullname', $row['fullname']); ?>" placeholder="Enter Full Name">
                    <?php echo form_error('fullname', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="group"><?php echo $this->lang->line('user_group'); ?>:</label>
                <div class="col-sm-9"> 
                    <label class="radio-inline">
                        <input type="radio" name="group" value="admin" <?php echo set_radio('group', 'admin', $row['group'] == 'admin'); ?>> Admin
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group" value="manager" <?php echo set_radio('group', 'manager', $row['group'] == 'manager'); ?>> Manager
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group" value="technical" <?php echo set_radio('group', 'technical', $row['group'] == 'technical'); ?>> Technical
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group" value="accountancy" <?php echo set_radio('group', 'accountancy', $row['group'] == 'accountancy'); ?>> Accountancy
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="group" value="employee" <?php echo set_radio('group', 'employee', $row['group'] == 'employee'); ?>> Employee
                    </label>
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="gender"><?php echo $this->lang->line('user_gender'); ?>:</label>
                <div class="col-sm-9"> 
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="1" <?php echo set_radio('gender', 1, $row['gender'] == 1); ?>><?php echo $this->lang->line('user_gender_1'); ?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="0" <?php echo set_radio('gender', 0, $row['gender'] == 0); ?>><?php echo $this->lang->line('user_gender_0'); ?>
                    </label>
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="phone"><?php echo $this->lang->line('user_phone'); ?>:</label>
                <div class="col-sm-9">
                    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo set_value('phone', $row['phone']); ?>" placeholder="Enter Phone">
                </div>
            </div>
            <div class="form-group <?php if(form_error('email')) echo 'has-error'; ?>">
                <label class="control-label col-sm-3" for="email"><?php echo $this->lang->line('user_email'); ?>:</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email', $row['email']); ?>" placeholder="Enter email">
                    <?php echo form_error('email', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="address"><?php echo $this->lang->line('user_address'); ?>:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="address" id="address" placeholder="Enter Address"><?php echo set_value('address', $row['address']); ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="birthday"><?php echo $this->lang->line('user_birthday'); ?>:</label>
                <div class="col-sm-9">
                    <div class='input-group date' >
                        <input type='text' name="birthday" class="form-control datepicker" name="birthday" id='birthday' value="<?php echo set_value('birthday', $row['birthday']); ?>" placeholder="Chose birthday" readonly="readonly" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="status"><?php echo $this->lang->line('user_status'); ?>:</label>
                <div class="col-sm-9"> 
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
                <div class="col-sm-9">
                    <textarea class="form-control" name="note" id="note"><?php echo set_value('note', $row['note']); ?></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group <?php if(form_error('username')) echo 'has-error'; ?>">
                <label class="control-label col-sm-3" for="username"><?php echo $this->lang->line('user_username'); ?>:</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="username" value="<?php echo set_value('username', $row['username']); ?>" placeholder="Enter Username">
                    <?php echo form_error('username', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group <?php if(form_error('password')) echo 'has-error'; ?>">
                <label class="control-label col-sm-3" for="password"><?php echo $this->lang->line('user_password'); ?>:</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password', ''); ?>" placeholder="Enter Password">
                    <?php echo form_error('password', "<small class='help-block'>", '</small>'); ?>
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
    <div class="col-xs-5" >
        <div id="short-list">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('user_fullname'); ?></th>
                        <th><?php echo $this->lang->line('user_username'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($rows as $row)
                    {
                ?>
                        <tr>
                            <td><a href="<?php echo base_url('acp/user/show/'.$row['id']); ?>"><?php echo $row['fullname']?></a></td>
                            <td><?php echo $row['username']?></td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
            </table> 
        <?php
            if($show_more)
            {
        ?>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button onclick="ajax_short_list('user', 2);" class="btn btn-primary">&gt;&gt;</button>
                </div>
             </div>
        <?php
            }
        ?> 
        </div>
        <div id="loading_short_list" style="width: 100%; height: 40%; text-align: center; display: none; padding-top: 150px;">
            <img src="<?php echo base_url('assets/backend/img/loading-circle.gif');?>" />
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