<?php
$popular_articles = get_popular_articles();
$recently_viewed_articles = get_articles_from_cookie();
?>

<div class="sub_box_r1">
    <p class="title_right_1"><?php echo lang('sidebar_Contact_Us'); ?></p>
    <ul class="box_content">
        <li class="email">
            <a href="mailto:bui.quy.duong@framgia.com"><?php echo lang('sidebar_Email_Us'); ?></a>
        </li>
    </ul>
</div><!-- end 1 sub_box_r1-->
<div class="sub_box_r2">
    <p class="title_right_2"><?php echo lang('sidebar_Popular_Questions'); ?></p>
    <ul class="box_content">
        <?php foreach ($popular_articles as $article): ?>
            <li class="tx1">
                <?php echo anchor('/article/' . mb_strtolower(url_title(removesign($article->category))) . '-c' . $article->category_id . '-' . mb_strtolower(url_title(removesign($article->title))) . '-i' . $article->id, $article->title); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div><!-- end 1 sub_box_r2--> 
<div class="sub_box_r2">
    <p class="title_right_2"><?php echo lang('sidebar_Recently_Viewed'); ?></p>
    <ul class="box_content">
        
        <?php foreach ($recently_viewed_articles as $article): ?>
            <li class="tx1">
                <?php echo anchor('/article/' . mb_strtolower(url_title(removesign($article->category))) . '-c' . $article->category_id . '-' . mb_strtolower(url_title(removesign($article->title))) . '-i' . $article->id, $article->title); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div><!-- end 1 sub_box_r2-->  


