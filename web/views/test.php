<html>
    <head>
        <title>Smileys</title>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
        <script>
            function parse_smileys(data)
            {
                $.ajax({
                    url: 'http://web_farm.local/test/parse_smileys',
                    method: 'POST',
                    data: {'str': ' :lol:'},
                    success: function(response){
                        console.log(response);
                    }
                });
            }
        </script>
        <?php echo smiley_js("smileys_alias", "editor1"); ?>
    </head>
    <body>
        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"></textarea>
        <?php echo $smiley_table; ?> 
    </body>
</html>