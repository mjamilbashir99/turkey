<?php require 'common_custom_search.php';  ?>
<!-- Page heading two starts -->
<div class="page-heading-two">
    <div class="container">
        <h2>Vidoes</h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / 
            <a href="<?php echo site_url('show/Vidoe/'); ?>">Vidoes</a> /
            <?php if($sel_region!='') echo $sel_region?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Container -->
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
        <?php $first_row = $topVideo;?>
        <div class="magazine">
        <span id="video_preview">
        <iframe width="100%" height="420" frameborder="0" allowfullscreen="" src="<?php echo $first_row->video_url?>" class="thumbnail"></iframe></span>
		<?php 
		    $k=1;
			for($j=0;$j<10;$j++)
			{
				$obj = 'url_'.$j;
				$vido_link = $first_row->$obj;
				//if($vido_link!='')
				{
					echo "<a href='".$vido_link."'>Vidoe $k</a>";
					$k++;
				} 
			}
        ?>
<br><br><br><br>
</div>
          <div class="magazine">
          <h2><i class="fa fa-film"></i> New Videos</h2>
    <?php 
	     if(count($all)>1){
			 echo "<ul>";
		 foreach($all as $video)
	     {
			 $detail_link = site_url('videos_details/'.$video->video_id);
	?>
		<li>
            <div class="mtop">
                <a href="<?php echo $detail_link?>">
                  <img src="<?php //echo get_app_image($app->featured_img);?>" width="126" height="70"/>
                </a>
            </div>
            <a href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)?> 1">
                <?php echo get_text_by_lang($video->title)?> 1
            </a>
            <br>
            <?php echo humanTiming($video->last_update_time)?>
		</li>
        
        <!--for extra videos-->
        <?php
		    $k=1;
			for($j=0;$j<10;$j++)
			{
				$obj = 'url_'.$j;
				$ex_vido_link = $video->$obj;
				if($ex_vido_link!='' )
				{
					$detail_link = site_url('videos_details/'.$video->$obj);
					$k++;
				?>
                    <li>
                        <div class="mtop">
                            <a href="<?php echo $ex_vido_link?>">
                                     <img src="<?php //echo get_app_image($app->featured_img);?>" width="126" height="70"/>
                            </a>
                        </div>
                            <a href="<?php echo $ex_vido_link?>" title="<?php echo get_text_by_lang($video->title)." ".$k?>">
                         	   <?php echo get_text_by_lang($video->title)." ".$k?>
                            </a>
                        <br>
                        <?php echo humanTiming($video->last_update_time)?>
                    </li>
				<?php
                } 
			}
        ?>
         <?php
		 } 
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Vidoes were found</div>
		<?php }?>
    </div>
          <div class="clear"></div>
          <div class="magazine">
          <h2><i class="fa fa-film"></i> Top Videos</h2>
    <?php 
	     if(count($all)>0){
			 echo "<ul>";
		 foreach($latest as $video)
	     {
			 $detail_link = site_url('videos_details/'.$video->video_id);
	?>
		<li>
            <div class="mtop">
                <a href="<?php echo $detail_link?>">
                  <img src="<?php //echo get_app_image($app->featured_img);?>" width="126" height="70"/>
                </a>
            </div>
            <a href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)?> 1">
                <?php echo get_text_by_lang($video->title)?> 1
            </a>
            <br>
            <?php echo humanTiming($video->last_update_time)?>
		</li>
        
        <!--for extra videos-->
        <?php
		    $k=1;
			for($j=0;$j<10;$j++)
			{
				$obj = 'url_'.$j;
				$ex_vido_link = $video->$obj;
				if($ex_vido_link!='' )
				{
					$detail_link = site_url('videos_details/'.$video->$obj);
					$k++;
				?>
                    <li>
                        <div class="mtop">
                            <a href="<?php echo $ex_vido_link?>">
                                     <img src="<?php //echo get_app_image($app->featured_img);?>" width="126" height="70"/>
                            </a>
                        </div>
                            <a href="<?php echo $ex_vido_link?>" title="<?php echo get_text_by_lang($video->title)." ".$k?>">
                         	   <?php echo get_text_by_lang($video->title)." ".$k?>
                            </a>
                        <br>
                        <?php echo humanTiming($video->last_update_time)?>
                    </li>
				<?php
                } 
			}
        ?>
         <?php
		 } 
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Vidoes were found</div>
		<?php }?>
    </div>
          <div class="clear"></div>
          <div class="magazine">
          <h2><i class="fa fa-film"></i> Featured Vidoes</h2>
    <?php 
	     if(count($featured)>0){
			 echo "<ul>";
		 foreach($featured as $video)
	     {
			 $detail_link = site_url('videos_details/'.$video->video_id);
	?>
		<li>
            <div class="mtop">
                <a href="<?php echo $detail_link?>">
                  <img src="<?php //echo get_app_image($app->featured_img);?>" width="126" height="70"/>
                </a>
            </div>
            <a href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)?> 1">
                <?php echo get_text_by_lang($video->title)?> 1
            </a>
            <br>
            <?php echo humanTiming($video->last_update_time)?>
		</li>
        
        <!--for extra videos-->
        <?php
		    $k=1;
			for($j=0;$j<10;$j++)
			{
				$obj = 'url_'.$j;
				$ex_vido_link = $video->$obj;
				if($ex_vido_link!='' )
				{
					$detail_link = site_url('videos_details/'.$video->$obj);
					$k++;
				?>
                    <li>
                        <div class="mtop">
                            <a href="<?php echo $ex_vido_link?>">
                                     <img src="<?php //echo get_app_image($app->featured_img);?>" width="126" height="70"/>
                            </a>
                        </div>
                            <a href="<?php echo $ex_vido_link?>" title="<?php echo get_text_by_lang($video->title)." ".$k?>">
                         	   <?php echo get_text_by_lang($video->title)." ".$k?>
                            </a>
                        <br>
                        <?php echo humanTiming($video->last_update_time)?>
                    </li>
				<?php
                } 
			}
        ?>
         <?php
		 } 
		  echo "</ul>"; 
		 }
		 else
		 {?>
           <div>No Vidoes were found</div>
		<?php }?>
    </div>
	    <div class="clear"></div>
		<?php render_widgets('footervideos');?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar">
                <?php render_widgets('RightBarVideos');?>
            </div>
        </div>

    </div>
</div>
