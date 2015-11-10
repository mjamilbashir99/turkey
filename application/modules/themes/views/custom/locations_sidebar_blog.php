<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$parent_categories = $CI->post_model->get_all_post_county_blog();
?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-map-marker color"></i>  <?php echo lang_key('Blog Base City') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php
			  $count = 0;
			 foreach($parent_categories->result() as $posts)
			 {
				  $count  = count_blog_by('blog','',$posts->id);
				  if($count)
				  {
			 ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                    <a href="<?php echo site_url('blog-posts/?location='.$posts->id);?>">
                    <?php echo $posts->city;?> 
                        <span class="color">(<?php echo $count;?>)</span>
                    </a>
                </li>
            <?php }
			} ?>
        </ul>
    </div>
</div>
<div style="clear:both"></div>