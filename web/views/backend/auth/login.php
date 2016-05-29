<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->lang->line('auth_login'); ?></title>
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/login.css'); ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>      
        <script type="text/javascript" src="<?php echo base_url('assets/backend/js/login.js'); ?>"></script>
    </head>
    <body>
        <div class="container">    
            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
                <div class="row">                
                    <div class="iconmelon">
                        <svg viewBox="0 0 32 32">
                        <g filter="">
                        <use xlink:href="#git"></use>
                        </g>
                        </svg>
                    </div>
                </div>
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title text-center"><?php echo $this->lang->line('auth_login'); ?></div>
                    </div>     
                    <div class="panel-body" >
                        <form name="form" id="form" class="form-horizontal" method="POST" autocomplete="off">
                            <div class="input-group <?php if(form_error('u')) echo 'has-error'; ?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="user" type="text" class="form-control" name="u" value="<?php echo set_value('u')?>" placeholder="<?php echo $this->lang->line('auth_user'); ?>">
                            </div>
                            <div class="input-group <?php if(form_error('p')) echo 'has-error'; ?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="p" value="<?php echo set_value('p')?>" placeholder="<?php echo $this->lang->line('auth_pass'); ?>">
                            </div>                                                                  
                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls has-error">
                                    <small class='help-block pull-left'><?php echo $msg; ?></small>
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
                                        <i class="glyphicon glyphicon-log-in"></i> <?php echo $this->lang->line('auth_login'); ?>
                                    </button>                          
                                </div>
                            </div>
                        </form>
                    </div>                     
                </div>  
            </div>
        </div>
        <div id="particles"></div>
    </body>
</html>