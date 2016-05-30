<div class="page-title">
  <h4><?php echo $this->lang->line('user_list'); ?></h4>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('branch_name'); ?></th>
                    <th><?php echo $this->lang->line('branch_address'); ?></th>
                    <th><?php echo $this->lang->line('branch_phone'); ?></th>
                    <th><a href="<?php echo base_url('acp/branch/add');?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('btn_add'); ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $row = $this->user_model->convert_data($row);
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/user/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        
                        <td>
                            <a href="<?php echo base_url('acp/user/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a>
                            <a href="<?php echo base_url('acp/user/delete/'.$row['id']);?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?');"><?php echo $this->lang->line('btn_delete'); ?></a>
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