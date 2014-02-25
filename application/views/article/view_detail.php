<?php
$average = get_rating_points_by_article_id($article->id);
?>

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

    $(window).load(function() {
        $('#setrating img').each(function(i) {
            $(this).mouseover(function() {
                setRating(i + 1);
            });
        });

        setRating(<?php echo $average; ?>);
    });

    function setRating(point)
    {
        stars = new Array("R1", "R2", "R3", "R4", "R5");
        start = parseInt(point);
        for (i = 0; i < 5; i++)
        {
            if (i >= start)
                document.getElementById(stars[i]).src = "/assets/frontend/images/rate0.gif";
            if (i < parseInt(point))
                document.getElementById(stars[i]).src = "/assets/frontend/images/rate1.gif";
        }
    }

    function submitRating(points) {

        $('#setrating').html('<img src="/assets/frontend/images/progress.gif" align="center">');

        $.ajax(
                {
                    type: 'post',
                    url: '<?php echo site_url('article/article/rate_for_article'); ?>',
                    data: {
                        'article_id': <?php echo $article->id; ?>,
                        'points': points
                    },
                    success: function(r) {
                        $('#setrating').html('<?php echo lang('rate'); ?>' + r);
                    }
                });
    }

</script>
<div class="box_shadow">
    <div class="box2">                        
        <h1 class="detail" style="color: orangered;"><?php echo $article->title; ?></h1>
        <h4>
            <?php echo lang('last_updated'); ?> <?php echo date('d M Y H:i', strtotime($article->updated_at)); ?>
            <!--Rating-->
            <div id="setrating" class="lst">
                <?php echo lang('rate'); ?>
                <img onclick="submitRating(0);" src="/assets/frontend/images/rate0.gif" id="R1" alt="0" style="cursor:pointer" title="<?php echo lang('rate_not_at_all'); ?>"/>
                <img onclick="submitRating(1);" src="/assets/frontend/images/rate0.gif" id="R2" alt="1" style="cursor:pointer" title="<?php echo lang('rate_somewhat'); ?>" />
                <img onclick="submitRating(2);" src="/assets/frontend/images/rate0.gif" id="R3" alt="2" style="cursor:pointer" title="<?php echo lang('rate_average'); ?>" />
                <img onclick="submitRating(3);" src="/assets/frontend/images/rate0.gif" id="R4" alt="3" style="cursor:pointer" title="<?php echo lang('rate_good'); ?>" />
                <img onclick="submitRating(4);" src="/assets/frontend/images/rate0.gif" id="R5" alt="4" style="cursor:pointer" title="<?php echo lang('rate_very_good'); ?>"/>
            </div>
            <!--Rating-->    
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



