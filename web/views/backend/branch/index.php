<div class="page-title">
  <h4><?php echo $this->lang->line('branch_list'); ?></h4>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('branch_name'); ?></th>
                    <th>Tổng số lô</th>
                    <th><?php echo $this->lang->line('branch_address'); ?></th>
                    <th><?php echo $this->lang->line('branch_phone'); ?></th>
                    <th><a href="<?php echo base_url('acp/branch/add');?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('btn_add'); ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $total_land = $this->land_model->get_rows(array('select' => 'COUNT(id)', 'where' => array('branch_id' => $row['id'], 'deleted' => 0)));
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/branch/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['name'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/land/search?branch_id='.$row['id']); ?>">
                                <?php echo $total_land[0]['COUNT(id)']; ?>
                            </a>  
                        </td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/branch/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a>
                            <button class="btn btn-danger btn-xs" onclick="delete_confirm('Delete Branch', 'Are you sure?', 'acp/branch/delete/<?php echo $row['id'];?>')">
                                <?php echo $this->lang->line('btn_delete'); ?>
                            </button>
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