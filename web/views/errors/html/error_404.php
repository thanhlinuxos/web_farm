<!DOCTYPE HTML>
<html>
    <head>
        <title>Không tìm thấy trang!</title>
        <meta name="keywords" content="404 error, not found" />
        <link href="/assets/404/css/style.css" rel="stylesheet" type="text/css"  media="all" />
    </head>
    <body>
        <!--start-wrap--->
        <div class="wrap">
            <!---start-header---->
            <div class="header">
                <div class="logo">
                    <h1><a href="#">Ố ồ ...</a></h1>
                </div>
            </div>
            <!---End-header---->
            <!--start-content------>
            <div class="content">
                <img src="/assets/404/images/error-img.png" title="error" />
                    <p><span>Ố ồ.....</span>Trang bạn truy cập không tồn tại hoặc đã bị xóa...</p>
<!--                <p><span><label>O</label>hh.....</span>You Requested the page that is no longer There.</p>-->
                <?php
                    $uri = explode('/', $_SERVER['REQUEST_URI']);
                    $url = ($uri[1] == 'acp') ? 'http://web_farm.local/acp':'http://web_farm.local';
                ?>    
                <a href="<?php echo $url;?>">Back To Home</a>
                
                <div class="copy-right">
                    <p>&#169 Copy right 2016</p>
                </div>
            </div>
            <!--End-Cotent------>
        </div>
        <!--End-wrap--->
    </body>
</html>