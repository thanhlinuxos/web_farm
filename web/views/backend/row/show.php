<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('row_info'); ?></h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('duple_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $duple['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('row_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('row_ordinal'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['ordinal'];?></td>
        </tr> 
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/row'); ?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
        <a href="<?php echo base_url('acp/row/edit/' . $row['id']); ?>" class="btn btn-warning btn-md"><?php echo $this->lang->line('btn_edit'); ?></a>
        <a href="<?php echo base_url('acp/row/delete/' . $row['id']); ?> " class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');"><?php echo $this->lang->line('btn_delete'); ?></a>
    </div> 
</div>