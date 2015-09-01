<?php require 'common_custom_search.php';  ?>
<!-- Page heading two starts -->
<div class="page-heading-two">
    <div class="container">
        <h2>Emagazines</h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / 
            <a href="<?php echo site_url('show/emagazine/'); ?>">emagazines</a> /
            <?php if($sel_region!='') echo $sel_region?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Container -->
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="magazine">
    <?php 
	     if(count($all)>0){
			 echo "<ul>";
		 foreach($all as $magazine)
	     {
			 $issue_data = get_issues_by_id($magazine->mag_id);
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
    <div class="clear"></div>
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
