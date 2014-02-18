<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $this->config->item('facebook_app_id'); ?>";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="box_shadow">
    <div class="box2">                        
        <h1 class="detail" style="color: orangered;"><?php echo $article->title; ?></h1>
        <h4>
            <?php echo lang('last_updated'); ?> <?php echo date('d M Y H:i', strtotime($article->updated_at)); ?>

        </h4>

        <span class="line"></span>

        <p>
            <?php echo $article->content; ?>
        </p>

        <div style="clear: both;">&nbsp;</div>

        <p>
            <?php echo get_tags_by_article_id($article->id); ?>
        </p>

        <p>
            <div 
                class="fb-comments" 
                data-href="<?php echo current_url(); ?>" 
                data-numposts="6" 
                data-width="840"
                data-colorscheme="light">
            </div>
        </p>

    </div><!-- end box2-->
</div><!-- end box_shadow-->
<div class="box3">
    <h2 class="lineful"><span class="bg_tx_grey"><?php echo lang('same_category'); ?></span></h2>
    <ul>
        <?php foreach ($related_articles as $article): ?>
            <li class="tx1">
                <?php echo anchor('/article/' . mb_strtolower(url_title(removesign($category->category))) . '-c' . $category->id . '-' . mb_strtolower(url_title(removesign($article->title))) . '-i' . $article->id, $article->title); ?>
            </li>
        <?php endforeach; ?> 
    </ul>
</div><!-- end box3-->



