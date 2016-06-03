<div class="page-title">
  <h4><?php echo $this->lang->line('row_list'); ?></h4>
</div>
<?php $this->load->view('backend/row/_search');?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('row_name'); ?></th>
                    <th><?php echo $this->lang->line('duple_name'); ?></th>
                    <th><?php echo $this->lang->line('row_ordinal'); ?></th>
                    <th><a href="<?php echo base_url('acp/row/add');?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('btn_add'); ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $row = $this->row_model->convert_data($row);
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/row/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['duple_name'];?></td>
                        <td><?php echo $row['ordinal'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/row/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a>
                            <button class="btn btn-danger btn-xs" onclick="delete_confirm('Delete Row', 'Are you sure?', 'acp/row/delete/<?php echo $row['id'];?>')">
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

