<link href="<?php echo theme_url();?>/assets/css/style_listings.css" rel="stylesheet">
<!-- Page heading two starts -->
<div class="page-heading-two">
    <div class="container">
        <h2><?php echo $title =$app_data->app_title?></h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / 
            <a href="<?php echo site_url('apps'); ?>"><?php echo lang_key('Apps'); ?></a> / 
			<?php echo $title?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Container -->
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="mDetail">
<div class="mPictureBox">
<?php $images = json_decode($app_data->gallery);?>
<img id="image" src="<?php echo get_thumbs_image($app_data->featured_img)?>" alt="<?php echo $title?>" style="display: block; margin: 0px auto;" width="298" title="<?php echo $title?>">
</div>
<div class="mContent">
<h1><?php echo $title?></h1>

			<!-- AddThis Button BEGIN -->
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
				<table>
				<tr>
					<td>
				<div style="display:inline" class="addthis_native_toolbox"></div>
				</td>
					<td>
				<a style="display:inline" href="http://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.magzter.com%2FCA%2FDolce-Media%2FCity-Life-Magazine%2FBusiness&media=http%3A%2F%2Fcdn.magzter.com%2F1417545595%2F1439212736%2Fimages%2Fthumb%2F390_thumb_1.jpg&description=Get+your+digital+edition+of+City+Life+Magazine+Magazine+subscriptions+and+issues+online+from+Magzter.+Buy%2C+download+and+read+City+Life+Magazine+Magazine+on+your+iPad%2C+iPhone%2C+Android%2C+Tablets%2C+Kindle+Fire%2C+Windows+8%2C+Web%2C+Mac+and+PCs+only+from+Magzter+-+The+Digital+Newsstand." data-pin-do="buttonPin" data-pin-config="beside"><img src="https://d1wofkmqsniyp0.cloudfront.net/public/v2.0/imgs/pinit.png" /></a>&nbsp;&nbsp;&nbsp;
			</td>
				
			</tr></table>
			<p></p>
				<!-- AddThis Button END -->
	
	
	<h5>App Description</h5>
	<p><?php echo $app_data->app_description?></p>
    <div class="cFl">
	CATEGORY:  <?php echo get_category_title_by_id($app_data->category)?><br>
	<!--LANGUAGE:  <?php echo $app_data->magazine_language?>  <br>--></div>
	<a href="<?php echo $app_data->mac?>">
    <img src="<?php echo theme_url();?>/assets/img/mac-icon.png" width="63" />
    </a>
    <a href="<?php echo $app_data->android?>">
    <img src="<?php echo theme_url();?>/assets/img/android-icon.png" width="63" />
    </a>
    <a href="<?php echo $app_data->window?>">
    <img src="<?php echo theme_url();?>/assets/img/win8-icon.png" width="63" />
    </a>
    <img src="<?php echo get_thumbs_image($app_data->qr)?>" width="63" /> <br>
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
            <img src="<?php echo get_app_image($app->featured_img);?>" width="100" height="109"/>
            </a>
			<a href="<?php echo $detail_link?>" title="Read">
			<img src="<?php echo get_app_image($app->qr);?>" width="66" height="63"/>
			</a>
		</div>
        <div class="middle">
        <h3><?php echo $app->title?>&nbsp;</h3>
        <p><?php echo $app->description?> &nbsp;</p>
        </div>
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


	
	</div>
    <div class="clear"></div>
		<?php render_widgets('footerApps');?>
        </div>
            
    

        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar">
                <?php render_widgets('RightBarApps');?>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d3aa799154da71" async="async"></script>