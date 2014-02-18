<?php
$popular_articles = get_popular_articles();
?>

<div class="sub_box_r1">
    <p class="title_right_1"><?php echo lang('sidebar_Contact_Us'); ?></p>
    <ul class="box_content">
        <li class="email">
            <a href="mailto:bui.quy.duong@framgia.com"><?php echo lang('sidebar_Email_Us'); ?></a>
        </li>
        <li><img style="margin-top:30px" src="images/social.png" alt="" /></li>
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

        <!--            <li class="tx3"><a href="1">How to deposit? </a></li>
                    <li class="tx3"><a href="1">How to get Deposit Bonus?</a></li>
                    <li class="tx3"><a href="1">How to Copy Order from Guru?</a></li>
                    <li class="tx3"><a href="1">How to Open a New Account</a></li>
                    <li class="tx3"><a href="1">What is BO?</a></li>-->
    </ul>
</div><!-- end 1 sub_box_r2--> 
<div class="sub_box_r2">
    <p class="title_right_2"><?php echo lang('sidebar_Recently_Viewed'); ?></p>
    <ul class="box_content">
        <!--            <li class="tx3"><a href="1">How to deposit? </a></li>
                    <li class="tx3"><a href="1">How to get Deposit Bonus?</a></li>
                    <li class="tx3"><a href="1">How to Copy Order from Guru?</a></li>
                    <li class="tx3"><a href="1">How to Open a New Account</a></li>
                    <li class="tx3"><a href="1">What is BO?</a></li>-->
    </ul>
</div><!-- end 1 sub_box_r2-->  


