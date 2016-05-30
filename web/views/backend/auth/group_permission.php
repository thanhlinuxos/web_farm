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

