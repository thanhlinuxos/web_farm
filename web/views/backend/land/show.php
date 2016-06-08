<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('land_info'); ?></h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('branch_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row_branch['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('land_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('land_axis_x'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['axis_x'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('land_axis_y'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['axis_y'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('land_image'); ?>: </strong></td>
            <td class="col-sm-10"><img src="<?php echo $row['image_'];?>" width="120" /></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active">Danh sach doi</td>
            <td class="col-sm-10"></td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/land'); ?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
        <a href="<?php echo base_url('acp/land/edit/' . $row['id']); ?>" class="btn btn-warning btn-md"><?php echo $this->lang->line('btn_edit'); ?></a>
        <a href="<?php echo base_url('acp/land/delete/' . $row['id']); ?> " class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');"><?php echo $this->lang->line('btn_delete'); ?></a>
    </div> 
</div>