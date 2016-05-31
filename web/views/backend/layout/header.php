<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GYAO System</title>
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/custom.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/jquery/ui/jquery-ui.min.css'); ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/ui/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/ui/jquery-ui-i18n.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap-toggle.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/backend/js/script.js'); ?>"></script>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('vendor/bootstrap/js/html5shiv.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('vendor/bootstrap/js/respond.min.js'); ?>" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header-fixed-top">
            <div class="container-fluid">
                <?php $user_login = $this->session->userdata('user_login'); ?>
                Xin chao: <?php echo $user_login['fullname']; ?>
                <div class="pull-right">
                    <a class="btn btn-default" href="<?php echo base_url('acp/logout'); ?>">
                        <span class="glyphicon glyphicon-log-out"></span> <?php echo $this->lang->line('auth_logout'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-space"></div>
        <div class="container-fluid">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Farm</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="<?php if($menu_active == 'dashboard') echo 'active'; ?>"><a href="<?php echo base_url('acp');?>">Dashboard</a></li>
                            <li class="<?php if($menu_active == 'user') echo 'active'; ?>"><a href="<?php echo base_url('acp/user');?>">User</a></li>
                            <li><a href="#">Link</a></li>
                            <li class="<?php if($menu_active == 'branch') echo 'active'; ?>"><a href="<?php echo base_url('acp/branch')?>">Branch</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!-- Content -->
            <div class="wraper">
                <?php $this->load->view('backend/layout/_flash'); ?>



