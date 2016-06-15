<div class="page-title">
  <h4><?php echo $this->lang->line('duple_list'); ?></h4>
</div>
<?php $this->load->view('backend/duple/_search'); ?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('duple_name'); ?></th>
                    <th><?php echo $this->lang->line('land_name'); ?></th>
                    <th>Tổng số hàng</th>
                    <th><?php echo $this->lang->line('duple_ordinal'); ?></th>
                    <th><a href="<?php echo base_url('acp/duple/add');?>" class="btn btn-success btn-sm"><?php echo $this->lang->line('btn_add'); ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $row = $this->duple_model->convert_data($this->duple_model->get_by_id($row['id']));
                    $total_row = $this->row_model->get_rows(array('select' => 'COUNT(id)', 'where' => array('duple_id' => $row['id'], 'deleted' => 0)));
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/duple/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['land_name'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/row/search?duple_id='.$row['id']); ?>">
                                <?php echo $total_row[0]['COUNT(id)']; ?>
                            </a> 
                        </td>
                        <td><?php echo $row['ordinal'];?></td>
                        <td>
                            <a href="<?php echo base_url('acp/duple/edit/'.$row['id']);?>" class="btn btn-warning btn-xs"><?php echo $this->lang->line('btn_edit'); ?></a>
                            <button class="btn btn-danger btn-xs" onclick="delete_confirm('Delete Duple', 'Are you sure?', 'acp/duple/delete/<?php echo $row['id'];?>')">
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

