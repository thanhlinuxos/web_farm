<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GYAO System</title>
        <link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-2.2.3.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('vendor/bootstrap/js/html5shiv.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('vendor/bootstrap/js/respond.min.js'); ?>" type="text/javascript"></script>
        <![endif]-->
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                outline: none;
            }

            .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                &:focus {
                    z-index: 2;
                }
            }

            body {
                background: url(/assets/frontend/img/login_background.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .login-form {
                margin-top: 60px;
            }
            .has-error {
                border: 1px solid #f00;
            }
            #login-form {
                color: #5d5d5d;
                background: #f2f2f2;
                padding: 26px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            #login-form .logo {
                display: block;
                margin: 0 auto;
                margin-bottom: 35px;
            }
            #login-form input,
            #login-form button {
                font-size: 18px;
                margin: 16px 0;
            }
            #login-form .capcha_input{
                font-size: 18px;
                margin: 16px 0;
                width: 50%;
                float: left;
                margin: 0 0 16px 5px !important;
            }
            #login-form .capcha_image {  
                float: left;
            }
            #login-form > div {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row" id="pwd-container">
                <div class="col-md-4"></div>

                <div class="col-md-4">
                    <section class="login-form">
                        <form method="post" name="login-form" id="login-form" autocomplete="off">
                            <img src="<?php echo base_url('assets/frontend/img/login_image.png');?>" class="img-responsive logo" alt="" />
                            <div>
                                <input type="text" class="form-control input-lg <?php if(form_error('u')) echo 'has-error'; ?>" name="u" value="<?php echo set_value('u');?>" placeholder="Username"/>
                            </div>
                            <div>
                                <input type="password" class="form-control input-lg <?php if(form_error('p')) echo 'has-error'; ?>" name="p" value="<?php echo set_value('p');?>" placeholder="Password" />
                            </div>
                            <div class="capcha_image"><?php echo $capcha_image;?></div>
                            <div><input type="text" name="capcha" class="form-control input-lg capcha_input" value="" placeholder="CAPCHA"></div>
                            <?php echo $msg; ?>
                            <button type="submit" name="go" value="go" class="btn btn-lg btn-primary btn-block">Login</button> 
                            <div>
                                <a href="#">Criar conta</a> or <a href="#">Esqueci minha senha</a>
                            </div>
                        </form>
                    </section>  
                </div>
            </div>
        </div>
    </body>
</html>