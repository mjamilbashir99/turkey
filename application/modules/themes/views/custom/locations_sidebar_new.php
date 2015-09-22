<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$parent_categories = $CI->post_model->get_all_post_county();


?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-map-marker color"></i>  <?php echo lang_key('County Base News') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php

			foreach ($parent_categories->result() as $posts) {
				//var_dump($posts);
				
				
				 ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                    <a href="<?php  // echo site_url('apps/?region='.$post->state);?>">
                    <?php echo $posts->name; ?> 
                        <span class="color">(<?php echo $CI->post_model->count_news_by('',$posts->id);?>)</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div style="clear:both"></div>