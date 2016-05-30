<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('branch_info'); ?></h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('branch_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('branch_address'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['address']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('branch_phone'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['phone']; ?></td>
        </tr>

    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/branch'); ?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
        <a href="<?php echo base_url('acp/branch/edit/' . $row['id']); ?>" class="btn btn-warning btn-md"><?php echo $this->lang->line('btn_edit'); ?></a>
        <a href="<?php echo base_url('acp/branch/delete/' . $row['id']); ?> " class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');"><?php echo $this->lang->line('btn_delete'); ?></a>
    </div> 
</div>
