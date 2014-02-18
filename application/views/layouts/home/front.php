<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <?php
        echo meta(array(
            array('name' => 'description', 'content' => isset($meta_description) ? $meta_description : DEFAULT_SITE_DESCRIPTION),
            array('name' => 'keywords', 'content' => isset($meta_keywords) ? $meta_keywords : DEFAULT_SITE_KEYWORDS),
            array('name' => 'robots', 'content' => 'index,follow'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
        ));
        ?>
        <title><?php echo isset($title_for_layout) && $title_for_layout != '' ? $title_for_layout : DEFAULT_SITE_TITLE; ?></title>

        <?php echo link_tag('assets/frontend/css/style.css'); ?>
        <?php echo link_tag('assets/frontend/css/images/favicon.ico', 'shortcut icon', 'image/x-icon'); ?>

        <?php echo link_tag('assets/fancybox/jquery.fancybox-1.3.4.css'); ?>
        <script src="<?php echo base_url(); ?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script src="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

        <script src="<?php echo base_url(); ?>assets/backend/js/libs/jquery-1.7.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/js/libs/jquery-ui-1.10.3.min.js"></script>
        <!--<script src="<?php //echo base_url();      ?>assets/backend/js/libs/modernizr-2.0.6.js"></script>-->
        <!--<script src="<?php //echo base_url();      ?>assets/backend/js/libs/bootstrap.min.js"></script>-->


    </head>

    <body>

        <!-- AddThis Smart Layers BEGIN -->
        <!-- Go to http://www.addthis.com/get/smart-layers to customize -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5302f81d2a9e8fc8"></script>
        <script type="text/javascript">
            addthis.layers({
                'theme': 'transparent',
                'share': {
                    'position': 'left',
                    'numPreferredServices': 5
                }
            });
        </script>
        <!-- AddThis Smart Layers END -->

        <div id="wrapper">
            <header>
                <p class="logo_top" style="cursor: pointer;" onclick="javascript:location.href = '<?php echo base_url(); ?>'"></p>
                <div class="top_right">
                    <div class="languages">
                        <div id="drop_lang_parent">

                            <?php
                            $lang = !$this->csession->get('lang') ? NULL : $this->csession->get('lang');
                            ?>

                            <select id="drop_lang" class="inputbox" onchange="change_default_language();" >
                                <option <?php echo $lang === 'english' ? 'selected' : NULL ?> id="english" value="english"><?php echo lang('drop_lang_English'); ?></option>
                                <option <?php echo $lang === 'vietnamese' ? 'selected' : NULL ?> id="vietnamese" value="vietnamese"><?php echo lang('drop_lang_Vietnamese'); ?></option>
                            </select>
                        </div>
                    </div>
                    <ul>
                        <li class="menu_top">
                            <a href="<?php echo base_url(); ?>"><?php echo lang('menu_top_Main'); ?></a>
                            |  
                            <a href="#"><?php echo lang('menu_top_Support_Home'); ?></a>
                            |  
                            <a href="#"><?php echo lang('menu_top_Create_Account'); ?></a></li>
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
                <address><?php echo lang('footer_copy_right'); ?></address>
            </footer>

        </div><!-- end wrapper-->

        <script>

            function change_default_language() {

                $.ajax(
                        {
                            type: 'post',
                            url: '/change_default_language',
                            data: {
                                'lang': $('select[id="drop_lang"]').val()
                            },
                            success: function()
                            {

                                window.location.href = '<?php echo base_url(); ?>';
                            }
                        });
            }

        </script>

    </body>
</html>
