
<?php // echo $this->uri->segment(1);       ?>
<ul class="search">
    <li><input type="text" value=""/> </li>
    <li class="search_bt">&nbsp;</li>
</ul>

<div class="box_shadow">
    <div class="box1">
        <?php foreach ($categories as $category): ?>
            <div class="sub_box4">
                <h2><span class="bg_tx"><?php echo $category->category; ?></span></h2>

                <?php $total_articles = get_total_articles_by_category_id($category->id); ?>

                <h3><?php echo $total_articles; ?><?php echo $total_articles > 1 ? lang('articles') : lang('article'); ?> </h3>

                <?php $articles = get_articles_by_category_id($category->id); ?>

                <ul>
                    <?php foreach ($articles as $article): ?>
                        <li class="tx1">
                            <?php echo anchor('/article/' . mb_strtolower(url_title(removesign($category->category))) . '-c' . $category->id .'-'. mb_strtolower(url_title(removesign($article->title))) . '-i' . $article->id, $article->title); ?>
                        </li>
                    <?php endforeach; ?> 
                </ul>
                <?php if ($total_articles > 0): ?>
                    <p class="button">
                        <a href="#">
                            <?php echo lang('view_all'); ?>
                        </a>
                    </p>
                <?php endif; ?>

            </div><!-- end sub_box2-->
        <?php endforeach; ?>

    </div><!-- end box1-->
    <div id="pagination" style="text-align: center;"><?php echo isset($pagination_link) ? $pagination_link : NULL; ?></div>

    <script>

        function change_page(offset, per_page) {
            var current_uri = '/articles';
            var page = offset / per_page + 1;
            var url = current_uri + '/page-' + page + '<?php echo $this->config->item('url_suffix'); ?>';
            location.href = url;
            return;
        }

    </script>
</div><!-- end box_shadow-->






