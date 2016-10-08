<div class="page-title">
  <h4><?php echo $this->lang->line('land_list'); ?></h4>
</div>
<?php $this->load->view('backend/land/_search'); ?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('land_name'); ?></th>
                    <th><?php echo $this->lang->line('branch_name'); ?></th>
                    <td>Tổng số đôi</td>
                    <th><?php echo $this->lang->line('land_axis_x'); ?></th>
                    <th><?php echo $this->lang->line('land_axis_y'); ?></th>
                    <th><?php echo $this->lang->line('land_image'); ?></th>
                    <th><a href="<?php echo base_url('acp/land/add');?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('btn_add'); ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {   
                    $row = $this->land_model->convert_data($this->land_model->get_by_id($row['id']));
                    $total_duple = $this->duple_model->get_rows(array('select' => 'COUNT(id)', 'where' => array('land_id' => $row['id'], 'deleted' => 0)));
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/land/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['branch_name'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/duple/search?land_id='.$row['id']); ?>">
                                <?php echo $total_duple[0]['COUNT(id)']; ?>
                            </a> 
                        </td>
                        <td><?php echo $row['axis_x'];?></td>
                        <td><?php echo $row['axis_y'];?></td>
                        <td><img src="<?php echo $row['image_'];?>" width="70"></td>
                        <td>
                            <ul class="list-inline">
                                <li><a href="<?php echo base_url('acp/land/sortable/'.$row['id']);?>" class="btn btn-info btn-xs <?php if($total_duple[0]['COUNT(id)'] < 2) echo 'disabled'; ?>"><?php echo $this->lang->line('land_sortable'); ?></a></li>
                                <li><a href="<?php echo base_url('acp/land/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a></li>
                                <li>
                                    <button class="btn btn-danger btn-xs" onclick="delete_confirm('Delete Land', 'Are you sure?', 'acp/land/delete/<?php echo $row['id'];?>')">
                                        <?php echo $this->lang->line('btn_delete'); ?>
                                    </button>
                                </li>
                            </ul>    
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
