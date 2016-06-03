<?php
    $row_search = $this->session->userdata('row_search');
?>
<!-- Search Form -->
<div class="row form-group">
    <form name="search-form" method="POST" action="<?php echo base_url('acp/row/search'); ?>">
        <div class="col-sm-2">
            <input type="text" name="keyword" class="form-control" value="<?php echo $row_search['keyword']; ?>" placeholder="Enter Name">
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="duple_id" name="duple_id">
                <option value="">---</option>
            <?php 
            foreach ($duples as $duple)
            {
            ?>    
                <option value="<?php echo $duple['id']?>" <?php echo set_select('duple_id', $duple['id'], $row_search['duple_id'] == $duple['id']); ?>>
                    <?php echo $duple['name'];?>
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