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

            form[role=login] {
                color: #5d5d5d;
                background: #f2f2f2;
                padding: 26px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            form[role=login] img {
                display: block;
                margin: 0 auto;
                margin-bottom: 35px;
            }
            form[role=login] input,
            form[role=login] button {
                font-size: 18px;
                margin: 16px 0;
            }
            form[role=login] > div {
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
                        <form method="post" action="#" role="login">
                            <img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />
                            <input type="text" name="u" placeholder="Username" required class="form-control input-lg" value="" />
                            <input type="password" class="form-control input-lg" id="password" placeholder="Password" required="" />
                            <div class="pwstrength_viewport_progress"></div>
                            <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Login</button>
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