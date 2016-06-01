<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('logs_info'); ?></h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_username'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo '['.$row['id'].'] '.$row['username']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_fullname'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['fullname']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('logs_action_key'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['action_key_'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('logs_content'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['content'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('logs_ip'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['ip'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('logs_browser'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['browser'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('logs_created_at'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['created_at_'];?></td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/logs'); ?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
    </div> 
</div>