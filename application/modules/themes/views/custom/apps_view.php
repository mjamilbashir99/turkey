<?php require 'common_custom_search.php';  ?>
<!-- Page heading two starts -->
<div class="page-heading-two">
    <div class="container">
        <h2>Apps</h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / 
            <a href="<?php echo site_url('show/apps/'); ?>">Apps</a> /
            <?php if($sel_region!='') echo $sel_region?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Container -->
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="app">
    <?php 
	     if(count($all)>0){
			 echo "<ul>";
		 foreach($all as $app)
	     {
			 $detail_link = site_url('apps_details/'.$app->id);
	?>
		<li>
		<div class="mtop">
			<a href="<?php echo $detail_link?>">
            <img src="<?php echo get_app_large_image($app->featured_img);?>" width="134" height="240"/>
            </a>
			
		</div>
       <div class="cellOS app_title"><?php echo $app->title?><br /></div><br />
        <div class="cellOS">
        <a class="mname" href="<?php echo $detail_link?>" title="Detail">Detail</a>
        </div>
		<div class="cellOS">
        <a href="<?php echo $app->mac?>" title="to go app">
        <img src="<?php echo theme_url();?>/assets/img/mac-icon.png" width="30" height="29"/>
        </a>
        <a href="<?php echo $app->android?>" title="to go app">
		<img src="<?php echo theme_url();?>/assets/img/android-icon.png" width="30" height="29"/>
        </a>
        <a href="<?php echo $app->window?>"title="to go app">
		<img src="<?php echo theme_url();?>/assets/img/win8-icon.png" width="30" height="29"/>
        </a>
        </div>
		</li>
        <?php
		 } 
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Apps were found</div>
		<?php }?>
    </div>
          <div class="clear"></div>
          <div class="app">
          <h2>Featured Apps</h2>
    <?php 
	     if(count($featured)>0){
			 echo "<ul>";
		 foreach($featured as $app)
	     {
			 $detail_link = site_url('apps_details/'.$app->id);
	?>
		<li>
                 
		<div class="mtop">
			<a href="<?php echo $detail_link?>">
            <img src="<?php echo get_app_large_image($app->featured_img);?>" width="134" height="244"/>
            </a>
			
		</div>
        <div class="cellOS app_title"><?php echo $app->title?><br /></div><br />
        <div class="cellOS">
        <a class="mname" href="<?php echo $detail_link?>" title="Detail">Detail</a>
        </div>
		<div class="cellOS">
        <a href="<?php echo $app->mac?>" title="to go app">
        <img src="<?php echo theme_url();?>/assets/img/mac-icon.png" width="30" height="29"/>
        </a>
        <a href="<?php echo $app->android?>" title="to go app">
		<img src="<?php echo theme_url();?>/assets/img/android-icon.png" width="30" height="29"/>
        </a>
        <a href="<?php echo $app->window?>"title="to go app">
		<img src="<?php echo theme_url();?>/assets/img/win8-icon.png" width="30" height="29"/>
        </a>
        </div>
		</li>
        <?php
		 } 
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Apps were found</div>
		<?php }?>
    </div>
<div class="clear"></div>

        <?php  get_banner_target_area(1);?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar">
             <?php include_once('category_sidebar_app.php')?>
             <?php include_once('locations_sidebar_app.php')?>
             <?php 
            for($i=2; $i<=10; $i++)
			 {
                 get_banner_target_area($i);
			 }?>
             <div style="clear:both"></div>
             <?php //render_widgets('RightBarApps');?>
            </div>
        </div>
</div>
    </div>
</div>
