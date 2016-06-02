<!-- Content -->
<div class="page-title">
    <h4><?php echo $this->lang->line('duple_info'); ?></h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('land_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $land['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('duple_name'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active"><strong><?php echo $this->lang->line('duple_ordinal'); ?>: </strong></td>
            <td class="col-sm-10"><?php echo $row['ordinal'];?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right active">So hang</td>
            <td class="col-sm-10"></td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 text-center">
        <a href="<?php echo base_url('acp/duple'); ?>" class="btn btn-default btn-md"><?php echo $this->lang->line('btn_back'); ?></a>
        <a href="<?php echo base_url('acp/duple/edit/' . $row['id']); ?>" class="btn btn-warning btn-md"><?php echo $this->lang->line('btn_edit'); ?></a>
        <a href="<?php echo base_url('acp/duple/delete/' . $row['id']); ?> " class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');"><?php echo $this->lang->line('btn_delete'); ?></a>
    </div> 
</div>