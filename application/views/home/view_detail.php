<div class="box_shadow">
    <div class="box2">                        
        <h1 class="detail" style="color: orangered;"><?php echo $article->title; ?></h1>
        <h4>
            <?php echo lang('last_updated'); ?> <?php echo date('d-m-Y', strtotime($article->updated_at));?>
            
        </h4>
        <span class="line"></span>
        
        <p>
            <?php echo $article->content; ?>
        </p>
        
    </div><!-- end box2-->
</div><!-- end box_shadow-->
<div class="box3">
    <h2 class="lineful"><span class="bg_tx_grey">Related Article</span></h2>
    <ul>
        <li class="tx1"><a href="#">How can I reinstall an App that has been removed from the App Store?</a></li>
        <li class="tx1"><a href="#">How do I uninstall and reinstall the game?</a></li>
        <li class="tx1"><a href="#">How do I find my Apple invoice number?</a></li>
        <li class="tx1"><a href="#">Can I buy virtual currency for someone else?</a></li>
        <li class="tx1"><a href="#">There was an in app purchase on my account I didn't authorize, what do I do?</a></li>
    </ul>
</div><!-- end box3-->
<div class="box3">
    <h2 class="lineful"><span class="bg_tx_grey">Feedback</span></h2>
    <ul>
        <li class="tx1">Was this article helpful?</li>
        <li class="tx1">
            <button type="button"> Yes</button>
            <button type="button"> No</button>
        </li>
    </ul>
</div><!-- end box3-->

