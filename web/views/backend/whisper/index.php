<div class="page-title">
  <h4><?php echo $this->lang->line('branch_list'); ?></h4>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th><?php echo $this->lang->line('whisper_send'); ?></th>
                    <th><?php echo $this->lang->line('whisper_content'); ?></th>
                    <th><?php echo $this->lang->line('created_at'); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($rows as $index => $row)
                {
                    $USER_LOGIN = $this->session->userdata('user_login');
                    $row = $this->whisper_model->convert_data($this->whisper_model->get_by(array('send_id'=>$row['send_id'], 'receive_id'=>$USER_LOGIN['id']), TRUE));
            ?>
                <tr>
                    <td><?php echo $index+1; ?></td>
                    <td><a href="<?php echo base_url('acp/whisper/show/'.$row['send_id']);?>"><?php echo $row['sender']; ?></a></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['created_at_']; ?></td>
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