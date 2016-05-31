<!-- Form -->
<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
    <div class="col-xs-4">
        <div class="form-group <?php if(form_error('branch_id')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="branch_id"><?php echo $this->lang->line('branch_name'); ?>:</label>
            <div class="col-sm-9">
                <select class="form-control" id="branch_id" name="branch_id">
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
            <?php
                $groups = $this->config->item('groups');
                foreach($groups as $group)
                {
            ?>
                    <label class="radio-inline">
                        <input type="radio" name="group" value="<?php echo $group;?>" <?php echo set_radio('group', $group, $row['group'] == $group); ?> onchange="ajax_get_group_permission(this.value);">
                        <?php echo $group;?>
                    </label>
            <?php    
                }
            ?>
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
        <div class="form-group <?php if(isset($image_error)) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="phone"><?php echo $this->lang->line('user_image'); ?>:</label>
            <div class="col-sm-4">
                <img src="<?php echo $row['image_'];?>" width="120" />
            </div>
            <div class="col-sm-5">
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
                <input type="text" name="username" class="form-control" id="username" value="<?php echo set_value('username', $row['username']); ?>" placeholder="Enter Username" autocomplete="off">
                <?php echo form_error('username', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group <?php if(form_error('password')) echo 'has-error'; ?>">
            <label class="control-label col-sm-3" for="password"><?php echo $this->lang->line('user_password'); ?>:</label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password', ''); ?>" placeholder="Enter Password" autocomplete="off">
                <?php echo form_error('password', "<small class='help-block'>", '</small>'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save'); ?></button>
            </div>
        </div>
            
        
    </div>
    <div class="col-xs-8" id="user_permission">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('user_permission_module'); ?></th>
                    <th><?php echo $this->lang->line('user_permission_action'); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $permission = $this->config->item('permission');
                foreach($permission['list'] as $k => $v)
                {
            ?>
                    <tr>
                        <td><?php echo $k; ?></td>
                        <td>
                        <?php 
                            $actions = explode('|', $v);
                            foreach ($actions as $action)        
                            {
                                $checked = '';
                                $disabled = (in_array($k, array('permission')) && in_array($action, array('index','add','show'))) ? 'disabled' : '';
                                if(isset($permission_group[$k]))
                                {
                                    $action_group = explode('|', $permission_group[$k]);
                                    if(in_array($action, $action_group))
                                    {
                                        $checked = 'checked';
                                    }
                                }
                                switch ($action)
                                {
                                    case 'index':
                                        $onstyle = 'info';
                                        break;
                                    case 'add':
                                        $onstyle = 'success';
                                        break;
                                    case 'edit':
                                        $onstyle = 'warning';
                                        break;
                                    case 'show':
                                        $onstyle = 'info';
                                        break;
                                    case 'delete':
                                        $onstyle = 'danger';
                                        break;
                                    default :
                                        $onstyle = 'default';
                                }
                        ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="permissions[]" data-toggle="toggle" data-onstyle="<?php echo $onstyle; ?>" data-size="mini" value="<?php echo $k.'-'.$action; ?>" <?php echo $checked; ?> <?php echo $disabled; ?>>
                                    <?php echo $this->lang->line('permission_'.$action); ?>
                                </label>
                        <?php    
                            }
                        ?>    
                        </td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    </form>
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