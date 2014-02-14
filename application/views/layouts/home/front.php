<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <?php
        echo meta(array(
            array('name' => 'description', 'content' => isset($meta_description) ? $meta_description : ''),
            array('name' => 'keywords', 'content' => isset($meta_keywords) ? $meta_keywords : ''),
            array('name' => 'robots', 'content' => 'index,follow'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
        ));
        ?>
        <title><?php echo isset($title_for_layout) && $title_for_layout != '' ? $title_for_layout : ''; ?></title>

        <?php echo link_tag('assets/frontend/css/style.css'); ?>
        <?php echo link_tag('assets/frontend/css/images/favicon.ico', 'shortcut icon', 'image/x-icon'); ?>
    </head>

    <body>
        <div id="preLoadImages"></div>
        
        <div id="wrapper">
            <header>
                <p class="logo_top"></p>
                <div class="top_right">
                    <div class="languages">
                        <form name="lang" method="post" action="#">
                            <div id="drop_lang_parent">
                                <select id="drop_lang" class="inputbox" onchange="document.location.replace(this.value);" >
                                    <option dir="ltr" selected="selected" data-image="<?php echo base_url(); ?>assets/css/images/en.gif">English</option>
                                    <option dir="ltr" data-image="<?php echo base_url(); ?>assets/css/images/vi.gif">Tiếng Việt</option>
                                </select>
                            </div>
                        </form>                    
                    </div>
                    <ul>
                        <li class="menu_top"><a href="#">Main</a>  |  <a href="#">Support Home</a>  |  <a href="#">Create Account</a></li>
                    </ul>           
                </div><!-- End top_right-->
            </header>
            <!-- end header-->

            <div class="body">
                
                <div class="left">
                    <?php echo $content_for_layout; ?>
                </div><!-- end left-->
                
                <div class="right">
                    <?php $this->load->view('layouts/home/right_sidebar'); ?>
                </div><!-- end right-->

            </div>
            <!-- end body-->

            <footer>
                <address>© Framgia, Inc. All Rights Reserved.</address>
            </footer>

        </div><!-- end wrapper-->
    </body>
</html>
