<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$city;
if($city=='all')
{
	$type="news";
$parent_categories = $CI->post_model->get_all_post_city($type);
} 
else
{
$parent_categories = $CI->post_model->get_all_post_county_by_city($city);
}
?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-folder color"></i>&nbsp;
    <?php
	
	if($city=='all'){
	
	
	 echo lang_key('News Base City');}else{ echo lang_key('News Base County');} ?>
     
     </h5>
   
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
         <?php
			  $count = 0;
			 foreach($parent_categories->result() as $posts)
			// var_dump($posts);
			 	 {
						if($city=='all')
						{	
							$count  = count_blog_by('news','',$posts->city);
						}
						else
						{
							$count  = count_blog_by('news','',$city,$posts->county);
						}
				  if($count)
				 {
					
			 ?>
             
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                <?php 
					if($city=='all'){
					 $url= site_url('news-posts/?city='.$posts->city);
					}else{
						 $url= site_url('news-posts/?county='.$posts->county);
					}
					 ?>
                
                
                    <a href="<?php echo $url; ?>">
                   <?php
					if($city=='all'){
						
					echo $posts->name;
					 }
					 else
					{
						echo $posts->name;
						}?> 
                        <span class="color">(<?php echo $count;?>)</span>
                    </a>
                </li>
            <?php }} ?>
        </ul>
    </div>
</div>
<div style="clear:both"></div>