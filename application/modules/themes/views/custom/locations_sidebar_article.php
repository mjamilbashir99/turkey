<?php
$CI = get_instance();
$CI->load->model('user/post_model');
if($location=='all'){
	$type="article";
$parent_categories = $CI->post_model->get_all_post_city($type);
   } 
else
   {
	$parent_categories = $CI->post_model->get_all_post_county_by_city($location);
	}
?>
<div class="s-widget">
 
    <!-- Heading -->
    <h5><i class="fa fa-map-marker color"></i>  <?php echo lang_key('Destination Base City') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php
			//var_dump($parent_categories->result());
			  $count = 0;
			 foreach($parent_categories->result() as $posts)
			
					 {
						
				$count  = count_blog_by('article','',$posts->city);
				  if($count)
				 {
					
			 ?>
            
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                    <a href="<?php echo site_url('destinations-posts/?location='.$posts->city);?>">
                    <?php
					if($location=='all'){
						
					echo $posts->name;
					 }
					 else
					{
						echo $posts->name;
						}?> 
                        <span class="color">(<?php echo $count;?>)</span>
                    </a>
                </li>
            <?php }
			} ?>
        </ul>
    </div>
</div>
<div style="clear:both"></div>