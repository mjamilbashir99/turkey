<link href="<?php echo theme_url();?>/assets/css/style_listings.css" rel="stylesheet">
<?php require 'common_custom_search.php';  ?>
<!-- Page heading two starts -->
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
          
          <!-- AddThis Button BEGIN --> 
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <table>
            <tr>
              <td><div style="display:inline" class="addthis_native_toolbox"></div></td>
              <td><a style="display:inline" href="http://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.magzter.com%2FCA%2FDolce-Media%2FCity-Life-Magazine%2FBusiness&media=http%3A%2F%2Fcdn.magzter.com%2F1417545595%2F1439212736%2Fimages%2Fthumb%2F390_thumb_1.jpg&description=Get+your+digital+edition+of+City+Life+Magazine+Magazine+subscriptions+and+issues+online+from+Magzter.+Buy%2C+download+and+read+City+Life+Magazine+Magazine+on+your+iPad%2C+iPhone%2C+Android%2C+Tablets%2C+Kindle+Fire%2C+Windows+8%2C+Web%2C+Mac+and+PCs+only+from+Magzter+-+The+Digital+Newsstand." data-pin-do="buttonPin" data-pin-config="beside"></a>&nbsp;&nbsp;&nbsp; </td>
            </tr>
          </table>
          <p></p>
          <!-- AddThis Button END --> 
          
          CATEGORY : <?php echo get_category_title_by_id($app_data->category)?><br>
          PUBLISHED : <?php echo get_post_data_by_lang($app_data->id,'title');?><br>
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
      <?php render_widgets('footerApps');?>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="sidebar">
        <?php include_once('category_sidebar_app.php')?>
        <?php include_once('locations_sidebar_app.php')?>
        <?php render_widgets('RightBarApps');?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d3aa799154da71" async="async"></script>