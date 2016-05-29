<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <title><?php echo $this->lang->line('auth_change_password'); ?></title> 
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 90px;
            }
            .panel-login {
                border-color: #ccc;
                -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
                -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
                box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            }
            .panel-login>.panel-heading {
                color: #00415d;
                background-color: #fff;
                border-color: #fff;
                text-align:center;
            }
            .panel-login>.panel-heading a{
                text-decoration: none;
                color: #666;
                font-weight: bold;
                font-size: 15px;
                -webkit-transition: all 0.1s linear;
                -moz-transition: all 0.1s linear;
                transition: all 0.1s linear;
            }
            .panel-login>.panel-heading a.active{
                color: #029f5b;
                font-size: 18px;
            }
            .panel-login>.panel-heading hr{
                margin-top: 10px;
                margin-bottom: 0px;
                clear: both;
                border: 0;
                height: 1px;
                background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
                background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
                background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
                background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            }
            .panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
                height: 45px;
                border: 1px solid #ddd;
                font-size: 16px;
                -webkit-transition: all 0.1s linear;
                -moz-transition: all 0.1s linear;
                transition: all 0.1s linear;
            }
            .panel-login input:hover,
            .panel-login input:focus {
                outline:none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                border-color: #ccc;
            }
            .btn-register {
                background-color: #1CB94E;
                outline: none;
                color: #fff;
                font-size: 14px;
                height: auto;
                font-weight: normal;
                padding: 14px 0;
                text-transform: uppercase;
                border-color: #1CB94A;
            }
            .btn-register:hover,
            .btn-register:focus {
                color: #fff;
                background-color: #1CA347;
                border-color: #1CA347;
            }

        </style>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    </head>
    <body>
        
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="#" class="active"><?php echo $this->lang->line('auth_change_password'); ?></a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <?php echo $msg; ?>
                            </div>
                            
                        </div>
                       
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form name="form" method="POST" role="form">
                                        <div class="form-group <?php if(form_error('p1')) echo 'has-error'; ?>">
                                            <input type="password" name="p1" class="form-control" value="<?php echo set_value('p1')?>" placeholder="<?php echo $this->lang->line('auth_current_pasword'); ?>">
                                            <?php echo form_error('p1', "<small class='help-block'>", '</small>'); ?>
                                        </div>
                                        <div class="form-group <?php if(form_error('p2')) echo 'has-error'; ?>">
                                            <input type="password" name="p2" class="form-control" value="<?php echo set_value('p2')?>" placeholder="<?php echo $this->lang->line('auth_new_password'); ?>">
                                            <?php echo form_error('p2', "<small class='help-block'>", '</small>'); ?>
                                        </div>
                                        <div class="form-group <?php if(form_error('p3')) echo 'has-error'; ?>">
                                            <input type="password" name="p3" class="form-control" value="<?php echo set_value('p3')?>" placeholder="<?php echo $this->lang->line('auth_confirm_password'); ?>">
                                            <?php echo form_error('p3', "<small class='help-block'>", '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="submit" class="form-control btn btn-register" value="<?php echo $this->lang->line('auth_change_now'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </body>
</html>
