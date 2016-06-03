<div class="page-title">
  <h4><?php echo $this->lang->line('logs_list'); ?></h4>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('tree_code'); ?></th>
                    <th><?php echo $this->lang->line('tree_status'); ?></th>
                    <th><a href="<?php echo base_url('acp/tree/add');?>" class="btn btn-success btn-sm">
                        <?php echo $this->lang->line('btn_add'); ?></a>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $row = $this->tree_model->convert_data($row);
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/tree/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['tree_code'];?></td>
                        <td><?php echo $row['tree_status'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/tree/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a>
                            <button class="btn btn-danger btn-xs" onclick="delete_confirm('Delete Tree', 'Are you sure?', 'acp/tree/delete/<?php echo $row['id'];?>')">
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

