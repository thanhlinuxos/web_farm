<?php
    $user_search = $this->session->userdata('user_search');
?>
<!-- Search Form -->
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('acp/user/search'); ?>">
        <div class="col-sm-3">
            <input type="text" name="keyword" class="form-control" value="<?php echo $user_search['keyword']; ?>" placeholder="Enter Full Name OR Username">
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="branch_id" name="branch_id">
                <option value="">---</option>
            <?php 
            foreach ($branches as $branch)
            {
            ?>    
                <option value="<?php echo $branch['id']?>" <?php echo set_select('branch_id', $branch['id'], $user_search['branch_id'] == $branch['id']); ?>>
                    <?php echo $branch['name']?>
                </option>
            <?php
            }
            ?>    
            </select>
        </div>
        <div class="col-sm-2">
            <button type="submit" name="submit" value="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> <?php echo $this->lang->line('btn_search');?>
            </button>
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
        </div>
    </form>
</div>