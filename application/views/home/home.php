
<?php // echo $this->uri->segment(1);  ?>
<ul class="search">
    <li><input type="text" value=""/> </li>
    <li class="search_bt">&nbsp;</li>
</ul>

<!--<div class="box_shadow">
    <div class="box1">
        <h1>Genaral Help</h1>
        <div class="sub_box1">
            <h2><span class="bg_tx">genaral</span></h2>
            <h3>3 Articles</h3>
            <ul>
                <li class="tx1"><a href="product_detail.html">Deposit Bonus</a></li>
                <li class="tx1"><a href="product_detail.html">Welcome!</a></li>
                <li class="tx1"><a href="product_detail.html">What can I do if I experience...</a></li>                          
            </ul>
            <p class="button space_bt"><a href="product_list.html">view all</a></p>
        </div> end 1 sub_box1
        <div class="sub_box1">
            <h2><span class="bg_tx">Open Account</span></h2>
            <h3>3 Articles</h3>
            <ul>
                <li class="tx1"><a href="#">How to open an Social Trade ...</a></li>
                <li class="tx1"><a href="#">Trending - What’s new in Mobage?</a></li>
                <li class="tx1"><a href="#">Trending - What if I forget my...</a></li>
                <li class="tx1"><a href="#">Trending - I bought a new phone</a></li>
                <li class="tx1"><a href="#">Trending - How do I unlink my...</a></li>
            </ul>
            <p class="button"><a href="product_list.html">view all</a></p>
        </div> end 1 sub_box1
        <div class="sub_box1">
            <h2><span class="bg_tx">Platform</span></h2>
            <h3>3 Articles</h3>
            <ul>
                <li class="tx1"><a href="#">Trending - How can I find my...</a></li>
                <li class="tx1"><a href="#">Trending - How do I log out of a...</a></li>
                <li class="tx1"><a href="#">Trending - What is MobaCoin?</a></li>
                <li class="tx1"><a href="#">Trending - Can I get free</a></li>
                <li class="tx1"><a href="#">Trending - Can I buy MobaCoin...</a></li>
            </ul>
            <p class="button"><a href="product_list.html">view all</a></p>
        </div> end 1 sub_box1
    </div> end box1
</div> end box_shadow-->

<div class="box_shadow">
    <div class="box1">
        <!--<h1>Products</h1>-->
        <?php foreach ($categories as $category): ?>
            <div class="sub_box2">
                <h2><span class="bg_tx"><?php echo $category->category; ?></span></h2>

                <?php $total_articles = get_total_articles_by_category_id($category->id); ?>

                <h3><?php echo $total_articles; ?><?php echo $total_articles > 1 ? ' articles' : ' article'; ?> </h3>

                <?php $articles = get_articles_by_category_id($category->id); ?>

                <ul>
                    <?php foreach ($articles as $article): ?>
                        <li class="tx1">
                            <a href="#">
                                <?php echo $article->title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?> 
                </ul>
                <?php if ($total_articles > 0): ?>
                    <p class="button"><a href="product_list.html">view all</a></p>
                <?php endif; ?>

            </div><!-- end sub_box2-->
        <?php endforeach; ?>

        <!--        <div class="sub_box2">
                    <h2><span class="bg_tx">Binary Options</span></h2>
                    <h3>6 Articles</h3>
                    <ul>
                        <li class="tx1"><a href="#">Genaral - How do I get support  for Blood Brothers?</a></li>
                        <li class="tx1"><a href="#">General - How do I log out of my account?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more than 2 parties to my brigade?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more familiars to my brigades?</a></li>
                        <li class="tx1"><a href="#">Play - How do bands and brigades function in Blood...</a></li>
                    </ul>
                    <p class="button"><a href="product_list.html">view all</a></p>
                </div> end sub_box2   -->

        <!--        <div class="sub_box2">
                    <h2><span class="bg_tx">Social Trade</span></h2>
                    <h3>6 Articles</h3>
                    <ul>
                        <li class="tx1"><a href="#">Genaral - How do I get support  for Blood Brothers?</a></li>
                        <li class="tx1"><a href="#">General - How do I log out of my account?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more than 2 parties to my brigade?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more familiars to my brigades?</a></li>
                        <li class="tx1"><a href="#">Play - How do bands and brigades function in Blood...</a></li>
                    </ul>
                    <p class="button"><a href="product_list.html">view all</a></p>
                </div> end sub_box2-->

        <!--        <div class="sub_box2">
                    <h2><span class="bg_tx">iPhone, Android Application</span></h2>
                    <h3>6 Articles</h3>
                    <ul>
                        <li class="tx1"><a href="#">Genaral - How do I get support  for Blood Brothers?</a></li>
                        <li class="tx1"><a href="#">General - How do I log out of my account?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more than 2 parties to my brigade?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more familiars to my brigades?</a></li>
                        <li class="tx1"><a href="#">Play - How do bands and brigades function in Blood...</a></li>
                    </ul>
                    <p class="button"><a href="product_list.html">view all</a></p>
                </div> end sub_box2    -->

        <!--        <div class="sub_box2">
                    <h2><span class="bg_tx">iPhone, Android Application</span></h2>
                    <h3>6 Articles</h3>
                    <ul>
                        <li class="tx1"><a href="#">Genaral - How do I get support  for Blood Brothers?</a></li>
                        <li class="tx1"><a href="#">General - How do I log out of my account?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more than 2 parties to my brigade?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more familiars to my brigades?</a></li>
                        <li class="tx1"><a href="#">Play - How do bands and brigades function in Blood...</a></li>
                    </ul>
                    <p class="button"><a href="product_list.html">view all</a></p>
                </div> end sub_box2    -->

        <!--        <div class="sub_box2">
                    <h2><span class="bg_tx">iPhone, Android Application</span></h2>
                    <h3>6 Articles</h3>
                    <ul>
                        <li class="tx1"><a href="#">Genaral - How do I get support  for Blood Brothers?</a></li>
                        <li class="tx1"><a href="#">General - How do I log out of my account?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more than 2 parties to my brigade?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more familiars to my brigades?</a></li>
                        <li class="tx1"><a href="#">Play - How do bands and brigades function in Blood...</a></li>
                    </ul>
                    <p class="button"><a href="product_list.html">view all</a></p>
                </div> end sub_box2    -->

        <!--        <div class="sub_box2">
                    <h2><span class="bg_tx">iPhone, Android Application</span></h2>
                    <h3>6 Articles</h3>
                    <ul>
                        <li class="tx1"><a href="#">Genaral - How do I get support  for Blood Brothers?</a></li>
                        <li class="tx1"><a href="#">General - How do I log out of my account?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more than 2 parties to my brigade?</a></li>
                        <li class="tx1"><a href="#">Play - How do I add more familiars to my brigades?</a></li>
                        <li class="tx1"><a href="#">Play - How do bands and brigades function in Blood...</a></li>
                    </ul>
                    <p class="button"><a href="product_list.html">view all</a></p>
                </div> end sub_box2    -->




    </div><!-- end box1-->
    <div id="pagination" style="text-align: center;"><?php echo isset($pagination_link) ? $pagination_link : NULL; ?></div>

    <script>

        function change_page(offset, per_page) {
            var current_uri = '/home';
            var page = offset / per_page + 1;
            var url = current_uri + '/page-' + page + '<?php echo $this->config->item('url_suffix'); ?>';
            location.href = url;
            return;
        }

    </script>
</div><!-- end box_shadow-->






