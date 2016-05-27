
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="test[]" multiple>
    <input type="hidden" name="submit" value="submit" >
    <button type="submit">ssss</button>
</form>
<script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
<script type="text/javascript" >
    function testing()
    {
        $.ajax({
            url: 'http://web_farm.local/test/ajax',
            method: "POST",
            data: {},
            beforeSend: function(){
                
            },
            afterSend: function(){
                
            },
            success: function(response) {
                console.log(response);
            }
            
        });
    }
</script>
<button onclick="testing();">sdsdsd</button>