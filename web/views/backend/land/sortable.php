<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable ul { display: inline; }
    #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 10em; float:left;}
    .ui-state-highlight { height: 1.5em; width: 3em; line-height: 1.2em; }
</style>
<script>
    $(document).ready(function(){
	$( "#sortable" ).sortable({
            placeholder: "ui-state-highlight",
            axis: 'x',
            update: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        data: data,
                        type: 'POST',
                        url: BASE_URL + '/acp/land/sortable/<?php echo $land['id'];?>',
                        success: function(data, textStatus, xhr) {
                            var data = JSON.parse(data);
                            $("#sortable_msg").html(data.msg)
                            $("#sortable_info").show();
                            window.setTimeout(function(){
                                $("#sortable_info").fadeOut(500)
                            }, 1000);
                        }
                    });
            }
        });
        $( "#sortable" ).disableSelection();
  });
</script>

<div class="row">
    <div class="col-xs-12">
        <ul id="sortable">
        <?php
            foreach ($duples as $duple)
            {
        ?>
            <li id="row-<?php echo $duple['id'];?>" class="ui-state-default"><?php echo $duple['name'];?></li>
        <?php
            }
        ?>    
        </ul>
    </div>
</div>
<div class="alert alert-info fade in" id="sortable_info" style="display: none;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>[Info]</strong> <span id="sortable_msg"></span>
</div>