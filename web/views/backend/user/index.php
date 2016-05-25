<div class="page-title">
  <h4>Users</h4>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('user_fullname'); ?></th>
                    <th><?php echo $this->lang->line('user_username'); ?></th>
                    <th><?php echo $this->lang->line('user_group'); ?></th>
                    <th><?php echo $this->lang->line('user_phone'); ?></th>
                    <th><?php echo $this->lang->line('user_address'); ?></th>
                    <th><?php echo $this->lang->line('user_gender'); ?></th>
                    <th><?php echo $this->lang->line('user_birthday'); ?></th>
                    <th><?php echo $this->lang->line('user_status'); ?></th>
                    <th><a href="<?php echo base_url('acp/user/add');?>" class="btn btn-success btn-md">Add</a></th>
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
                        <td><?php echo $row['fullname']?></td>
                        <td><?php echo $row['username']?></td>
                        <td><?php echo $row['group']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['gender_']?></td>
                        <td><?php echo $row['birthday']?></td>
                        <td><?php echo $row['status_']?></td>
                        <td>
                            <a href="<?php echo base_url('acp/user/edit/'.$row['id']);?>" class="btn btn-warning btn-md">Edit</a>
                            <a href="<?php echo base_url('acp/user/delete/'.$row['id']);?>" class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table> 
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>