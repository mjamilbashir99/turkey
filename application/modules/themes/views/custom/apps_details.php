<link href="<?php echo theme_url();?>/assets/css/style_listings.css" rel="stylesheet">
<?php require 'common_custom_search.php';  ?>
<!-- Page heading two starts -->
<?php if(isset($app_data->app_title)){?>
<div class="page-heading-two">
  <div class="container">
    <div class="breads"> <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / <a href="<?php echo site_url('apps'); ?>"><?php echo lang_key('Apps'); ?></a> / <?php echo $title =   $app_data->app_title?> </div>
    <div class="clearfix"></div>
  </div>
</div>

<!-- Container -->
<div class="container">
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12">
      <div class="mDetail">
        <div class="mPictureBox">
          <?php //var_dump($app_data); ?>
          <?php $images = json_decode($app_data->app_gallery);?>
          <img id="image" src="<?php echo get_app_large_image($app_data->app_img)?>" alt="<?php echo $title?>" style="display: block; margin: 0px auto;" width="288" height="408" title="<?php echo $title?>"> Gallery
          <?php if(count($images)>0){?>
          <ul class="gallery">
            <?php for($img=0;$img<count($images);$img++){?>
            <li>
              <div class="mtop"> <a href="<?php echo get_gallery_image($images[$img])?>" class="lightbox"> <img src="<?php echo get_gallery_image($images[$img])?>" width="84" height="100"/> </a> </div>
            </li>
            <?php }?>
          </ul>
          <?php }?>
        </div>
        <div class="mContent">
          <h2><?php echo $title?></h2>
          <?php include("share_this.php")?>
            CATEGORY : <?php echo get_category_title_by_id($app_data->category)?><br>
            PUBLISHED : <a href="<?php echo post_detail_url($app_data)?>"><?php echo get_post_data_by_lang($app_data,'title');?></a><br>
          	LANGUAGE : English
          <h5>App Description</h5>
          <p><?php echo $app_data->app_description?></p>
          <div class="cFl"> 
            <!--LANGUAGE:  <?php echo $app_data->magazine_language?>  <br>--></div>
          <a href="<?php echo $app_data->mac?>"> <img src="<?php echo theme_url();?>/assets/img/mac-icon.png" width="35" /> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $app_data->android?>"> <img src="<?php echo theme_url();?>/assets/img/android-icon.png" width="35" /> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $app_data->window?>"> <img src="<?php echo theme_url();?>/assets/img/win8-icon.png" width="35" /> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="<?php echo get_thumbs_image($app_data->qr)?>" width="85" /> <br>
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
            <div class="mtop"> <a href="<?php echo $detail_link?>" title="Read"> <img src="<?php echo get_app_large_image($app->featured_img);?>" width="134" height="244"/> </a> </div>
          <div class="cellOS app_title"><?php echo $app->title?><br />
            </div>
            <br />
            <div class="cellOS"> <a class="mname" href="<?php echo $detail_link?>" title="Detail">Detail</a> </div>
            <div class="cellOS"> <a href="<?php echo $app->mac?>" title="to go app"> <img src="<?php echo theme_url();?>/assets/img/mac-icon.png" width="30" height="29"/> </a> <a href="<?php echo $app->android?>" title="to go app"> <img src="<?php echo theme_url();?>/assets/img/android-icon.png" width="30" height="29"/> </a> <a href="<?php echo $app->window?>"title="to go app"> <img src="<?php echo theme_url();?>/assets/img/win8-icon.png" width="30" height="29"/> </a> </div>
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
      </div>
      <div class="clear"></div>
      <?php }else{?>
    <div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
           <div style="height:50px;font-size:16px;">
           No Data Found
           </div>
    <?php }?>
    		<?php 
             $mybanners = get_banner_target_area(11);
		   ?>
      <?php ?>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="sidebar">
        <?php include_once('category_sidebar_app.php')?>
        <?php include_once('locations_sidebar_app.php')?>
        <?php //render_widgets('RightBarApps');?>
        <?php 
            for($i=12; $i<=20; $i++)
			 {
                 get_banner_target_area($i);
			 }?>
             <div style="clear:both"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d3aa799154da71" async="async"></script>