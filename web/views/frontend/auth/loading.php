<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $msg; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css" media="all">
            body
            {
                background: #FFFFFF;
            }
            a
            {
                color: #055073;
                text-decoration: none;
            }
            .page_transfer {
                width: 800px;
                margin-top: 150px;
                padding: 30px;
                background: #FFFFFF;

                text-align: center;
                color: #055073; 
                font-family: Verdana, Arial; 
                font-size: 11px;
            }
        </style>
    </head>
    <body>
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="50%" align="center">
                    <div class="page_transfer">
                        <b><?php echo $msg; ?></b>
                        <br /><br /><img src="<?php echo base_url('assets/frontend/img/preloader.gif'); ?>">
                            <br /><br />(<a href="<?php echo $url; ?>">Bấm vào đây nếu hệ thống không tự chuyển.</a>)
                    </div>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            setTimeout('Redirect()', 1700);
            function Redirect()
            {
                location.href = "<?php echo $url; ?>";
            }
        </script>
    </body>
</html>