<div class="page-title">
  <h4><?php echo $this->lang->line('user_list'); ?></h4>
</div>
<?php $this->load->view('backend/user/_search'); ?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th>
                        <?php echo $this->lang->line('user_fullname'); ?> 
                        [<?php echo $this->lang->line('user_username'); ?>]
                    </th>
                    <th><?php echo $this->lang->line('user_image'); ?></th>
                    <th>
                        <?php echo $this->lang->line('branch_name'); ?>
                        [<?php echo $this->lang->line('user_group'); ?>]
                    </th>
                    <th><?php echo $this->lang->line('user_phone'); ?></th>
                    <th><?php echo $this->lang->line('user_gender'); ?></th>
                    <th><?php echo $this->lang->line('user_status'); ?></th>
                    <th><a href="<?php echo base_url('acp/user/add');?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('btn_add'); ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $row = $this->user_model->convert_data($row);
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/user/show/'.$row['id']); ?>"><?php echo $row['id']?></a></td>
                        <td>
                            <?php echo $row['fullname']?> <br />
                            [<?php echo $row['username']?>]
                        </td>
                        <td><img src="<?php echo $row['image_']; ?>" width="80" /></td>
                        <td>
                            <?php echo $row['branch_name']?> <br>
                            [<?php echo $row['group']?>]
                        </td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['gender_']?></td>
                        <td><?php echo $row['status_']?></td>
                        <td>
                            <a href="<?php echo base_url('acp/user/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a>
                            <button class="btn btn-danger btn-xs" onclick="delete_confirm('Delete User', 'Are you sure?', 'acp/user/delete/<?php echo $row['id'];?>')"><?php echo $this->lang->line('btn_delete'); ?></button>
                        </td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table> 
    </div>
</div>
<div class="row">
   <div class="col-sm-12 text-center">
        <?php echo $this->pagination->create_links(); ?>
   </div>
</div>