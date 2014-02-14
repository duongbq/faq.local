<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ZonStudio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/libs/jquery-1.7.1.min.js"></script>
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script type="text/javascript">
            $(function() {
                $('#email').focus();
            });
        </script>

    </head>

    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=205170123024675";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div id="login">


            <img src="/assets/default/img/ZonLG.png" />
            <div style="clear: both;">&nbsp;</div>
            <?php if (isset($login_msg) && !is_null($login_msg)) { ?>
                <div class="alert alert-error"><?php echo $login_msg; ?></div>
<?php } ?>

            <form class="form-horizontal" method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">

                <div class="control-group">
                    <label class="control-label">Tên đăng nhập</label>
                    <div class="controls">
                        <input type="text" name="user_name" id="user_name" placeholder="Tên đăng nhập"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Mật khẩu</label>
                    <div class="controls">
                        <input type="password" name="password" id="password"  placeholder="Mật khẩu"/>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="btn_login" value="Đăng nhập" class="btn btn-primary">
                        <div class="fb-login-button btn btn-small" data-max-rows="1" data-size="small" data-show-faces="false" data-auto-logout-link="false"></div>

                    </div>
                </div>

            </form>

        </div><!--end.container-->




    </body>
</html>