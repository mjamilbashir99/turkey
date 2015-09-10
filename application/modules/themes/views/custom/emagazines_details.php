<link href="<?php echo theme_url();?>/assets/css/style_listings.css" rel="stylesheet">
<?php require 'common_custom_search.php';  //var_dump($magazine_data); ?>
<!-- Page heading two starts -->
<?php if(isset($magazine_data->mag_title)){?>
<div class="page-heading-two">
    <div class="container">
        <h2><?php echo $title =$magazine_data->mag_title?> <?php echo $magazine_data->month?> - <?php echo $magazine_data->year?></h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / 
            <a href="<?php echo site_url('emagazine'); ?>"><?php echo lang_key('emagazine'); ?></a> / 
			<?php echo $title?> <?php echo $magazine_data->month?> - <?php echo $magazine_data->year?>
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
<?php $images = json_decode($magazine_data->gallery);?>
<img id="image" src="<?php echo get_app_large_image($magazine_data->issue_image)?>" alt="<?php echo $title?>" style="display: block; margin: 0px auto;" width="288" height="408" title="<?php echo $title?>">
<?php if(count($images)>0){?>
	<ul class="gallery">
		<?php for($img=0;$img<count($images);$img++){?>
        <li>
		<div class="mtop">
			 <a href="<?php echo get_gallery_image($images[$img])?>" class="lightbox">
			<img src="<?php echo get_gallery_image($images[$img])?>" width="84" height="100"/>
			</a>
		</div>
		</li>
        <?php }?>
     </ul>
<?php }?>
</div>


<div class="mContent">
<h1><?php echo $title?> <?php echo $magazine_data->month?> - <?php echo $magazine_data->year?></h1>
<?php include("share_this.php"); //var_dump($magazine_data);?>
	<div class="cFl">
    PUBLISHED: <a href="<?php echo post_detail_url($magazine_data)?>"><?php echo get_post_data_by_lang($magazine_data,'title');?></a><br>
	CATEGORY:  <?php echo get_category_title_by_id($magazine_data->category)?><br>
	FREQUENCY: <?php echo $magazine_data->magazine_frequency?><br>
	LANGUAGE:  <?php echo $magazine_data->magazine_language?>  <br></div>
	<h5>Magazine Description</h5>
	<p><?php echo $magazine_data->mag_description?></p>
    <h5>Issue Description</h5>
	<p><?php echo $magazine_data->issue_description?></p>
	<a href="<?php echo $magazine_data->mac?>">
    <img src="<?php echo theme_url();?>/assets/img/mac-icon.png" width="35" />
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo $magazine_data->android?>">
    <img src="<?php echo theme_url();?>/assets/img/android-icon.png" width="35" />
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo $magazine_data->window?>">
    <img src="<?php echo theme_url();?>/assets/img/win8-icon.png" width="35" />
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="<?php echo get_thumbs_image($magazine_data->qr)?>" width="85" height="85"/> <br>
	<a href="<?php echo $magazine_data->url?>" class="dRead" target="_blank">READ MORE</a>
</div>
<div class="clear"></div>
<div class="magazine">
         <h2>Back Issues</h2>
    <?php 
	     if(($back)>0){
			 echo "<ul>";
//var_dump($back);
		 foreach($back as $issue_data)
	     {
			 
			 if($issue_data->id==$magazine_data->id)
			   continue;
			 $detail_link = site_url('emagazine_details/'.$issue_data->id);
			 $title = $issue_data->name;
	?>
		<li> 
		<div class="mtop">
			<a href="<?php echo $detail_link?>" title="Read">
           <img id="image" src="<?php echo get_app_large_image($issue_data->featured_img)?>" alt="<?php echo $title?>" style="display: block; margin: 0px auto;" width="250" height="408" title="<?php echo $title?>">
			</a>
		</div>
        <!--  <div class="cellOS"><?php //echo $magazine->name?><br /><?php //echo $magazine->year?>/<?php //echo $magazine->month?></div>-->
		<a class="mname" href="<?php echo $issue_data->url?>" title="Read"><img src="<?php echo theme_url();?>/assets/img/icopreview.jpg" /></a>
        <a class="mname" href="<?php echo $detail_link?>" title="Detail"><img src="<?php echo theme_url();?>/assets/img/icoread.jpg" /></a>
		</li>
        <?php
		 } 
	 
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Magazines were found</div>
		<?php }?>
    </div>

  <div class="clear"></div>
         <div class="magazine">
         <h2>Featured Magazines</h2>
    <?php 
	     if(count($featured)>0){
			 echo "<ul>";
		 foreach($featured as $magazine)
	     {
			 
			 $issue_data = get_issues_by_id($magazine->mag_id);
			 if(1)
			 {
			 $detail_link = site_url('emagazine_details/'.$issue_data->id);
			 $title = $issue_data->name;
	?>
		<li>
		<div class="mtop">
			<a href="<?php echo $detail_link?>" title="Read">
           <img id="image" src="<?php echo get_app_large_image($issue_data->featured_img)?>" alt="<?php echo $title?>" style="display: block; margin: 0px auto;" width="250" height="408" title="<?php echo $title?>">
			</a>
		</div>
        <!--  <div class="cellOS"><?php //echo $magazine->name?><br /><?php //echo $magazine->year?>/<?php //echo $magazine->month?></div>-->
		<a class="mname" href="<?php echo $issue_data->url?>" title="Read"><img src="<?php echo theme_url();?>/assets/img/icopreview.jpg" /></a>
        <a class="mname" href="<?php echo $detail_link?>" title="Detail"><img src="<?php echo theme_url();?>/assets/img/icoread.jpg" /></a>
		</li>
        <?php
		 } 
		 }
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Magazines were found</div>
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
		<?php render_widgets('footeremagazine');?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar">
             <?php include_once('category_sidebar_magazines.php')?>
                <?php include_once('locations_sidebar_magazines.php')?>
                <?php render_widgets('RightBarEmagazines');?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d3aa799154da71" async="async"></script>