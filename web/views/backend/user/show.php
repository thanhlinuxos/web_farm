<div class="page-title">
  <h4><?php echo $this->lang->line('user_info'); ?></h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_fullname'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['fullname']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_username'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['username']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_group'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['group']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_phone'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['phone']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_image'); ?>:</strong></td>
            <td class="col-sm-10">
                <img src="<?php echo $row['image_']; ?>" width="150" />
            </td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_email'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_address'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['address']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_gender'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['gender_']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_birthday'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['birthday']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_status'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['status_']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_note'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['note']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('user_created_at'); ?>:</strong></td>
            <td class="col-sm-10"><?php echo $row['created_at_']; ?></td>
        </tr>
        
    </tbody>
</table>
<div class="row">
   <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/user');?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
        <a href="<?php echo base_url('acp/user/edit/'.$row['id']);?>" class="btn btn-warning btn-md"><?php echo $this->lang->line('btn_edit'); ?></a>
        <a href="<?php echo base_url('acp/user/delete/'.$row['id']);?> " class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');"><?php echo $this->lang->line('btn_delete'); ?></a>
    </div> 
</div>


