<?php
    $user_search = $this->session->userdata('user_search');
?>
<!-- Search Form -->
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('user/search'); ?>">
        <div class="col-sm-3">
            <input type="text" name="keyword" class="form-control" value="<?php echo $user_search['keyword']; ?>" placeholder="Enter Full Name OR Username">
        </div>
        <div class="col-sm-2">
            <button type="submit" name="submit" value="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> <?php echo $this->lang->line('btn_search');?>
            </button>
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
        </div>
    </form>
</div>