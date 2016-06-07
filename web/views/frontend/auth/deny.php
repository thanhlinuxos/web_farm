<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <title><?php echo $this->lang->line('auth_do_not_have_permission'); ?></title> 
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
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="<?php echo base_url('assets/backend/img/icon/warning_32x32.png'); ?>" />
                                    <h4><?php echo $this->lang->line('auth_do_not_have_permission'); ?></h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <a href="<?php echo base_url('dashboard'); ?>"><?php echo $this->lang->line('auth_back_to_dashboad'); ?></a>
                            </div>
                            
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </body>
</html>
