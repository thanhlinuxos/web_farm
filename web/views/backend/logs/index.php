<div class="page-title">
    <div class="row">
        <div class="col-sm-6"><h4><?php echo $this->lang->line('logs_list'); ?></h4></div>
        <div class="col-sm-6">
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url('acp/logs/server');?>"><?php echo $this->lang->line('logs_server'); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/logs/_search'); ?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('id'); ?></th>
                    <th><?php echo $this->lang->line('logs_action_key'); ?></th>
                    <th><?php echo $this->lang->line('user_username'); ?></th>
                    <th><?php echo $this->lang->line('logs_browser'); ?></th>
                    <th><?php echo $this->lang->line('logs_ip'); ?></th>
                    <th><?php echo $this->lang->line('logs_created_at'); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $row)
                {
                    $row = $this->logs_model->convert_data($row);
            ?>
                    <tr>
                        <td><a href="<?php echo base_url('acp/logs/show/'.$row['id']); ?>"><?php echo $row['id'];?></a></td>
                        <td><?php echo $row['action_key_'];?></td>
                        <td><?php echo '['.$row['user_id'].'] ' . $row['username'] .' - '. $row['fullname'];?></td>
                        <td><?php echo '['.$row['os'].'] ' . $row['browser'];?></td>
                        <td><?php echo $row['ip'];?></td>
                        <td><?php echo $row['created_at_'];?></td>
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

