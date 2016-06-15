<div class="row">
    <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="col-xs-12">
            <div class="form-group <?php if(form_error('receive[]')) echo 'has-error'; ?>">
                <label class="control-label col-sm-3" for="receive"><?php echo $this->lang->line('branch_name');?></label>
                <div class="col-sm-9">
                    <select class="form-control receive" name="receive[]" multiple="multiple">
                    <?php
                        foreach ($users as $user) {
                            $checked = in_array($user['id'], $receive) ? TRUE : FALSE;
                    ?>
                        <option value="<?php echo $user['id']?>" <?php echo set_select('receive[]', $user['id'], $checked); ?>><?php echo $user['fullname'] . ' ('.$user['username'].')'?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <?php echo form_error('receive[]', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group <?php if(form_error('content')) echo 'has-error'; ?>">
                <label class="control-label col-sm-3" for="note"><?php echo $this->lang->line('user_note'); ?>:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="content" id="note"><?php echo set_value('content', $row['content']); ?></textarea>
                    <?php echo form_error('content', "<small class='help-block'>", '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $this->lang->line('btn_save');?></button>
                    <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(".receive").select2();
</script>
