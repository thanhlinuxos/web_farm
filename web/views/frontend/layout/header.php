<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GYAO System</title>
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/select2/css/select2.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/frontend/css/custom.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/jquery/ui/jquery-ui.min.css'); ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/ui/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/ui/jquery-ui-i18n.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap-toggle.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/select2/js/select2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/script.js'); ?>"></script>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('vendor/bootstrap/js/html5shiv.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('vendor/bootstrap/js/respond.min.js'); ?>" type="text/javascript"></script>
        <![endif]-->
    </head>

    <body>
        <?php $user_login = $this->session->userdata('user_login'); ?>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($menu_active == 'dashboard') echo 'active'; ?>"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                        <li class="<?php if($menu_active == 'user') echo 'active'; ?>"><a href="<?php echo base_url('user');?>">User</a></li>
                        <li class="<?php if($menu_active == 'land') echo 'active'; ?>"><a href="<?php echo base_url('land');?>">Land</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="pull-right padding-top-7">
                        <span class="well well-sm">Xin chao: <a href="#"><?php echo $user_login['fullname']; ?></a></span>
                        <?php
                        if($user_login['group'] == 'admin' && $user_login['is_admin']) {
                        ?>
                        <span>
                            <select class="branch-select-box">
                              <option>Tay Ninh</option>
                              <option>Vinh Long</option>
                            </select>
                        </span>
                        <a class="btn btn-success" href="<?php echo base_url('acp');?>"><span class="glyphicon glyphicon-log-out"></span> ACP</a>
                        <?php
                        }
                        ?>
                        <a class="btn btn-default" href="<?php echo base_url('logout');?>"><span class="glyphicon glyphicon-log-out"></span> Thoát</a>
                    </div>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container-fluid">
            <div class="wraper">




