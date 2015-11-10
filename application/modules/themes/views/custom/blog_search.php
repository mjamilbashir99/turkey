<?php
 $search_action='blog-posts';
 $search_by ='Blog';
 
 if($article=="Article" || $article=="article")
 {
	 $search_action='destinations-posts';
	 $search_by ='Destinations';
 }
 elseif($article=="News" || $article=="news")
 {
	 $search_action='news-posts';
	  $search_by ='News';
 }

?>
<!-- Search Widget -->
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-search color"></i>&nbsp; <?php echo $search_by." Search"; ?></h5>
    <!-- Widgets Content -->
    <div class="widget-content search">
        <form role="form" action="<?php echo site_url($search_action)?>" method="get">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="<?php echo lang_key('type_something'); ?>" value="<?php echo (isset($data['search']))?rawurldecode($data['search']):'';?>" name="search">


                <span class="input-group-btn">
                    <button type="submit" class="btn btn-color"><?php echo lang_key('search');?></button>
                </span>
            </div>
        </form>
    </div>
</div>
