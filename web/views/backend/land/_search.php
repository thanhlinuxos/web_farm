<?php
    $land_search = $this->session->userdata('land_search');
?>
<!-- Search Form -->
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('acp/land/search'); ?>">
        <div class="col-sm-2">
            <input type="text" name="keyword" class="form-control" value="<?php echo $land_search['keyword']; ?>" placeholder="Enter Name">
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="branch_id" name="branch_id">
                <option value="">---</option>
            <?php 
            foreach ($branches as $branch)
            {
            ?>    
                <option value="<?php echo $branch['id']?>" <?php echo set_select('branch_id', $branch['id'], $land_search['branch_id'] == $branch['id']); ?>>
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
        </div>
    </form>
</div>