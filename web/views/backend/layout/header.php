<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GYAO Universal</title>
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/select2/css/select2.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/jquery/ui/jquery-ui.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/custom.css'); ?>" rel="stylesheet">
        <script type="text/javascript">
            var LANG = <?php echo json_encode($this->lang->language); ?>;
            var REGIONAL = "<?php echo substr($this->session->userdata('language'), 0, 2);?>";
            var BASE_URL = "<?php echo base_url(); ?>";
        </script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/ui/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/ui/jquery-ui-i18n.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap-toggle.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/select2/js/select2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/backend/js/script.js'); ?>"></script>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('vendor/bootstrap/js/html5shiv.min.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('vendor/bootstrap/js/respond.min.js'); ?>" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header-fixed-top">
            <div class="container-fluid">
                <?php $USER_LOGIN = $this->session->userdata('user_login'); ?>
                Xin chao: <?php echo $USER_LOGIN['fullname']; ?>
                <div class="pull-right">
                    <a class="btn btn-default" href="<?php echo base_url('acp/logs/mine'); ?>">
                        My History
                    </a>
                    <button type="button" class="btn btn-warning" onclick="clean_cached()">Clean Cache</button>
                    <a href="<?php echo base_url('acp/whisper');?>"><img src="/assets/backend/img/icon/dialog.png" width="35" /></a>
                    <a class="btn btn-success" href="<?php echo base_url('dashboard');?>"><span class="glyphicon glyphicon-log-out"></span> UCP</a>
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
                        <a class="navbar-brand" href="#">GYAO</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="<?php if($menu_active == 'dashboard') echo 'active'; ?>"><a href="<?php echo base_url('acp');?>">Dashboard</a></li>
                            <li class="<?php if($menu_active == 'user') echo 'active'; ?>"><a href="<?php echo base_url('acp/user');?>">User</a></li>
                            <li class="dropdown <?php if(in_array($menu_active, array('branch', 'land', 'duple', 'tree'))) echo 'active'; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Farm <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="<?php if($menu_active == 'branch') echo 'active'; ?>"><a href="<?php echo base_url('acp/branch')?>">Branch</a></li>
                                    <li class="<?php if($menu_active == 'land') echo 'active'; ?>"><a href="<?php echo base_url('acp/land')?>">Land</a></li>
                                    <li class="<?php if($menu_active == 'duple') echo 'active'; ?>"><a href="<?php echo base_url('acp/duple')?>">Duple</a></li>
                                    <li class="<?php if($menu_active == 'row') echo 'active'; ?>"><a href="<?php echo base_url('acp/row')?>">Row</a></li>
                                    <li class="<?php if($menu_active == 'tree') echo 'active'; ?>"><a href="<?php echo base_url('acp/tree')?>">Tree</a></li>
                                </ul>
                            </li>
                            <li class="dropdown <?php if(in_array($menu_active, array('logs', 'whisper'))) echo 'active'; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    System <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="<?php if($menu_active == 'logs') echo 'active'; ?>"><a href="<?php echo base_url('acp/logs')?>">Logs</a></li>
                                    <li class="<?php if($menu_active == 'whisper') echo 'active'; ?>"><a href="<?php echo base_url('acp/whisper')?>">Whisper</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!-- Content -->
            <div class="wraper">
                <?php $this->load->view('backend/layout/_flash'); ?>



