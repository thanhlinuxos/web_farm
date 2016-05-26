<?php if ($this->session->flashdata('msg_success')) { ?>
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>[Logger]</strong> <?php echo $this->session->flashdata('msg_success'); ?>
    </div>
<?php } ?>

<?php if ($this->session->flashdata('msg_error')) { ?>
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>[Logger]</strong> <?php echo $this->session->flashdata('msg_error'); ?>
    </div>
<?php } ?>

<?php if ($this->session->flashdata('msg_warning')) { ?>
    <div class="alert alert-warning fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>[Logger]</strong> <?php echo $this->session->flashdata('msg_warning'); ?>
    </div>
<?php } ?>

<?php if ($this->session->flashdata('msg_info')) { ?>
    <div class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>[Logger]</strong> <?php echo $this->session->flashdata('msg_info'); ?>
    </div>
<?php } ?>