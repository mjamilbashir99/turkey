<script>
// A $( document ).ready() block.
jQuery( document ).ready(function() {
		jQuery(".change_view").click(function(e){
			e.preventDefault();
			current_view = jQuery(this).attr('target');
			document.cookie="current_view="+current_view;
			document.cookie="current_view="+current_view;
			location.reload();
		});
});
</script>
<div class="page-heading-two">
    <div class="container">
   <?php  $city;
   session_start();
   $_SESSION["flage"] = "1";
    ?>
        <h2><?php $article=lang_key($page_title);
		if($article=="Article"){
			echo "Destination";
			
			}else{
				
				echo lang_key($page_title);
				}
		
		
		 ?> </h2>
         <div class="breads" >
         
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home');?></a>/
			<?php 
			   if($article=="article" || $article=="Article")
			    {
					$url="destinations-posts";
					$title='Destinations';
				} 
				else if($article=="news" || $article=="News")
			    {
					$url="news-posts";
					$title='News';
				} 
			else
			    {
					$url="blog-posts";
					$title='Blog';
				} 
			 ?>
			<a href="<?php echo site_url($url); ?>"><?php echo $title; ?></a>/
             <?php if($city != 'all'){?>
                <a href="<?php echo site_url($url.'/?city='.$city) ?>"><?php echo get_location_name_by_id($city) ?></a>/
				<?php }
                if($county != 'all')
                {?>
                <a href="<?php echo site_url($url.'/?county='.$county) ?>"><?php echo get_county_name_by_id($county) ?></a>/<?php	
                }if($category != 'all')
                {?>
                <a href="<?php echo site_url($url.'/?category='.$category) ?>"><?php echo get_category_post_by_id($category) ?></a>/<?php	
                }?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    
<!-- Container -->
<div class="container">
    <div class="blog-one">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
             <div class="block-heading-two">
                <h3><span><i class="fa fa-map-marker">&nbsp;&nbsp;</i><?php echo $title; ?></span>
                    <div class="pull-right">
                      <a target="gird_view" href="#" class="change_view selected"><i class="fa fa-th" style="color:#F00"></i></a>
                      <a target="list_view" href="#" class="change_view"><i class="fa fa-th-list"></i></a>
                    </div>
                </h3>
            </div>
          <div class="img-box-4 text-center">

                <?php
				
                if($posts->num_rows()<=0){
                    ?>
                    <div class="alert alert-warning"><?php echo lang_key('post_not_found'); ?></div>
                <?php
                }
                else
                    foreach($posts->result() as $post){ 
                        $title = get_blog_data_by_lang($post,'title');
                        $desc = get_blog_data_by_lang($post,'desc');
                        ?>

                        <div class="col-md-4 col-sm-6">
        <div class="img-box-4-item">
            <!-- Image style one starts -->

            <div class="image-style-one">
                <!-- Image -->
                <a href="<?php echo site_url('post-detail/'.$post->id.'/'.dbc_url_title($title));?>"><img src="<?php echo get_featured_photo_by_id($post->featured_img);?>" alt="" class="img-responsive img-thumbnail" /></a>
            </div>
            <div class="img-box-4-content" >
                <h5 class="item-title" style="height:auto;"><a href="<?php echo $detail_link;?>"><?php echo get_post_data_by_lang($post,'title');?></a></h5>
                <div class="bor bg-red"></div>
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 info-dta">
                    <i class="fa fa-user"></i>  &nbsp; <?php echo date('D, M d, Y', $post->create_time); ?> </br>
                    <i class="fa fa-user"></i>  &nbsp; <?php echo get_user_fullname_by_id($post->created_by); ?></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
                    <?php } ?>
                      <div class="clearfix"></div>
  <div class="row">
             <ul class="pagination">
                    <?php echo (isset($pages))?$pages:'';?>
                </ul>
                </div>
               <div>
               <?php
			   //destination 
			   if($article=="Article")
			   {
				   if($city != 'all')
				   {
					  echo get_banner_target_area(121);
				   }
				   elseif($category != 'all')
				   {
					   get_banner_target_area(111);
				   }
				   else
				   {
					 get_banner_target_area(131); 
				   }
			   }
			   //news
			   elseif($article=="News")
			   {
				   if($city != 'all')
				   {
					  echo get_banner_target_area(161);
				   }
				   elseif($category != 'all')
				   {
					   get_banner_target_area(151);
				   }
				   else
				   {
					 get_banner_target_area(171); 
				   }
			   }
			   //Blog
			   else
			   {
				   if($city != 'all')
				   {
					  echo get_banner_target_area(81);
				   }
				   elseif($category != 'all')
				   {
					   get_banner_target_area(71);
				   }
				   else
				   {
					 get_banner_target_area(91); 
				   }
			   }?>
               </div>
            </div>
      
            
			</div>

            <div class="col-md-3 col-sm-12 col-xs-12">
<div class="sidebar">
                 <?php  include_once('blog_search.php');?>
                  <?php  if($article=="Article"){
			 include_once('category_sidebar_article.php');
			 include_once('locations_sidebar_article.php');	
			 if($city != 'all')
				   {
					  for($i=122; $i<=130; $i++)
				       { 
				       get_banner_target_area($i);
				       }
				   }
				   elseif($category != 'all')
				   {
					   for($i=112; $i<=120; $i++)
				       { 
				       get_banner_target_area($i);
				       }
				   }
				   else
				   {
					  for($i=132; $i<=140; $i++)
				       { 
				       get_banner_target_area($i);
				       } 
				   }?>
				<div style="clear:both"></div>
			 <?php }elseif($article=="News"){

				 include_once('category_sidebar_new.php');
				 include_once('locations_sidebar_new.php');
					if($city != 'all')
					   {
						  for($i=162; $i<=170; $i++)
						   { 
						   get_banner_target_area($i);
						   }
					   }
					   elseif($category != 'all')
					   {
						   for($i=152; $i<=160; $i++)
						   { 
						   get_banner_target_area($i);
						   }
					   }
					   else
					   {
						  for($i=172; $i<=180; $i++)
						   { 
						   get_banner_target_area($i);
						   } 
					   }?>
				<div style="clear:both"></div>
			 <?php }else{
					 
					 include_once('category_sidebar_blog.php');
					 include_once('locations_sidebar_blog.php');
				if($city != 'all')
					   {
						  for($i=82; $i<=90; $i++)
						   { 
						   get_banner_target_area($i);
						   }
					   }
					   elseif($category != 'all')
					   {
						   for($i=72; $i<=80; $i++)
						   { 
						   get_banner_target_area($i);
						   }
					   }
					   else
					   {
						  for($i=92; $i<=100; $i++)
						   { 
						   get_banner_target_area($i);
						   } 
					   }?>
				<div style="clear:both"></div>
			 <?php	} 
					?>      
                </div>
            </div>

        </div>
    </div>

</div> 
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53fb1205151cc4cf"></script>