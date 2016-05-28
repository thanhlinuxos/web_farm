<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th><?php echo $this->lang->line('user_fullname'); ?></th>
            <th><?php echo $this->lang->line('user_username'); ?></th>
            <th><?php echo $this->lang->line('user_group'); ?></th>
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
                <td><?php echo $row['group']?></td>
            </tr>
    <?php
        }
    ?>
    </tbody>
</table> 
<div class="row">
    <div class="col-sm-12 text-center">
        <?php
            if($btn_prev != FALSE)
            {
        ?>
                <button onclick="ajax_short_list('acp/user/short_list', <?php echo $btn_prev;?>);" class="btn btn-primary">&lt;&lt;</button>
        <?php
            }
        ?>
        <?php
            if($btn_next != FALSE)
            {
        ?>
                <button onclick="ajax_short_list('acp/user/short_list', <?php echo $btn_next;?>);" class="btn btn-primary">&gt;&gt;</button>
        <?php
            }
        ?>

    </div>
 </div>
