<?php require 'common_custom_search.php';  ?>
<!-- Page heading two starts -->
<style>
.thumb {position: relative; width: 129px; height:70px; margin-bottom:20px;}
.thumb a {position: absolute; top: 0; display: block; width: 98%; height: 100%; text-align: center; text-decoration: none;}
.thumb a .play, .thumb a .overlay {opacity: 0;}
.thumb a:hover .play, .thumb a:hover .overlay {display: block; transition: opacity .25s ease-in-out;-moz-transition: opacity .25s ease-in-out;-webkit-transition: opacity .25s ease-in-out;}
.thumb a:hover .play {position: relative; font-size: 35px; color: #ffffff; margin-top: 22px; z-index: 1000; opacity: 1;}
.thumb a:hover .overlay {position: absolute; top: 0px; width: 100%; height: 100%; background-color: #000000; opacity: .7;}

img.mtop {
    height: 80px;
    width: 150px;
}
</style>
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
         
        <?php
		      if(isset($topVideo->post_id))
			  {
			  if($current_video_id=='')
			  {
			    $current_video_url = $topVideo->video_url;
			  }
			  else
			  {
				  $obj = 'url_'.$current_video_id;
				   $current_video_url = $topVideo->$obj;
			  }
		?>
        <div class="magazine">
        <?php //echo $current_video_url?>
        <span id="video_preview">
		</span>
		<?php 
		    $k=1;
			for($j=0;$j<10;$j++)
			{
				
				$obj = 'url_'.$j;
				$vido_link = $topVideo->$obj;
				if($vido_link!='')
				{   $show_link = site_url("videos?watch=").$topVideo->post_id."-".$k;
					if($k>1)
					echo " | ";
					echo "<a href='".$show_link."'><strong>Vidoe $k</strong></a>";
					$k++;
				} 
			}
        ?>
        <?php //var_dump($topVideo) ?>
        <h4>PUBLISHED : <a href="<?php echo post_detail_url($topVideo)?>" style="color:#1faabe"><?php echo ucwords(get_post_data_by_lang($topVideo,'title'));?></a></h4>
<br><br><br>
</div>
<?php }?>

 <!-- Nav tab style 1 starts -->
                <div class="nav-tabs-one">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#p-nav-1" data-toggle="tab"><i class="fa fa-film"></i> New Videos</a></li>
                        <li><a href="#p-nav-2" data-toggle="tab"><i class="fa fa-film"></i> Top Videos</a></li>
                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active magazine" id="p-nav-1">
    <?php 
	     if(count($all)>1){
			 echo "<ul>";
		 foreach($all as $video)
	     {
			 $detail_link = site_url("videos?watch=").$video->post_id;
			 $video_image = getVideoThumbnail($video->video_url);
	?>
		<li><?php //echo $video->video_url;?>
            <div class="mtop thumb">
                <a href="<?php echo $detail_link?>">
                <span class="play">&#9658;</span>
   				<div class="overlay"></div>
                  
                </a>
                <img src="<?php echo $video_image;?>" width="126" height="70"/>
            </div>
             <div style="width:125px; overflow:hidden;height:50px;">
            <a style="line-height:none !important" href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)?> 1">
                <?php echo get_text_by_lang($video->title)?> 1
            </a>
            </div>
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
					$detail_link = site_url("videos?watch=").$video->post_id."-".$k;
					$video_image = getVideoThumbnail($ex_vido_link);
					$k++;
				?>
                    <li>
                        <div class="mtop thumb">
                            <a href="<?php echo $detail_link?>">
                            <span class="play">&#9658;</span>
   							<div class="overlay"></div>
                                 
                            </a>
                            <img src="<?php echo $video_image;?>" width="126" height="70"/>
                        </div>
                        <div style="width:125px; overflow:hidden;height:50px;">
                            <a style="line-height:none !important" href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)." ".$k?>">
                         	   <?php echo get_text_by_lang($video->title)." ".$k?>
                            </a>
                        </div>
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
          <strong> No Vidoes were found</strong>
		<?php }?>
      </div>
					     <div class="clear"></div>
           			    <div class="tab-pane fade in active magazine" id="p-nav-2">
    <?php 
	     if(count($all)>0){
			 echo "<ul>";
		 foreach($latest as $video)
	     {
			 $detail_link = site_url("videos?watch=").$video->post_id;
			 $video_image = getVideoThumbnail($video->video_url);
	?>
		<li><?php //echo $video->video_url;?>
            <div class="mtop thumb">
                <a href="<?php echo $detail_link?>">
                <span class="play">&#9658;</span>
   				<div class="overlay"></div>
                  
                </a>
                <img src="<?php echo $video_image;?>" width="126" height="70"/>
            </div>
             <div style="width:125px; overflow:hidden;height:50px;">
            <a style="line-height:none !important" href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)?> 1">
                <?php echo get_text_by_lang($video->title)?> 1
            </a>
            </div>
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
					$detail_link = site_url("videos?watch=").$video->post_id."-".$k;
					$video_image = getVideoThumbnail($ex_vido_link);
					$k++;
				?>
                    <li>
                        <div class="mtop thumb">
                            <a href="<?php echo $detail_link?>">
                            <span class="play">&#9658;</span>
   							<div class="overlay"></div>
                                     
                            </a>
                            <img src="<?php echo $video_image;?>" width="126" height="70"/>
                        </div>
                        <div style="width:125px; overflow:hidden;height:50px;">
                            <a style="line-height:none !important" href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)." ".$k?>">
                         	   <?php echo get_text_by_lang($video->title)." ".$k?>
                            </a>
                        </div>
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
          <strong>No Vidoes were found</strong>
		<?php }?>
          </div>
          <div class="clear"></div>
		        </div>
          </div>
           <div class="clear"></div>
               
          <div class="magazine">
          <h2><i class="fa fa-film"></i> Featured Vidoes</h2>
    <?php 
	     if(count($featured)>0)
		 {
		 echo "<ul>";
		 foreach($featured as $video)
	     {
			 $detail_link = site_url("videos?watch=").$video->post_id;
			 $video_image = getVideoThumbnail($video->video_url);
	?>
		<li><?php //echo $video->video_url;?>
            <div class="mtop thumb">
                <a href="<?php echo $detail_link?>">
                  <span class="play">&#9658;</span>
   							<div class="overlay"></div>
                </a>
                <img src="<?php echo $video_image;?>" width="126" height="70"/>
            </div>
             <div style="width:125px; overflow:hidden;height:50px;">
            <a style="line-height:none !important" href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)?> 1">
                <?php echo get_text_by_lang($video->title)?> 1
            </a>
            </div>
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
					$detail_link = site_url("videos?watch=").$video->post_id."-".$k;
					$video_image = getVideoThumbnail($ex_vido_link);
					$k++;
				?>
                    <li>
                        <div class="mtop">
                            <a href="<?php echo $detail_link?>">
                                     <img src="<?php echo $video_image;?>" width="126" height="70"/>
                            </a>
                        </div>
                        <div style="width:125px; overflow:hidden;height:50px;">
                            <a style="line-height:none !important" href="<?php echo $detail_link?>" title="<?php echo get_text_by_lang($video->title)." ".$k?>">
                         	   <?php echo get_text_by_lang($video->title)." ".$k?>
                            </a>
                        </div>
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
             <?php include_once('category_sidebar_video.php')?>
                <?php include_once('locations_sidebar_video.php')?>
                <?php render_widgets('RightBarVideos');?>
            </div>
        </div>

    </div>
</div>
<script>
function getUrlVars(url)
{
        var vars = {};
        var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value){vars[key] = value;});
        return vars;
}
function youtube_parser(url)
{
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    if(match&&match[7].length==11)
	{
        return match[7];
    }
	else
	{
        return '';
    }
}
function showVideoPreview(url)
{
        my_id = youtube_parser(url);
        if(my_id!='')
        {
            var video_id = my_id;
            //https://www.youtube.com/watch?v=jIL0ze6_GIY
            var src = '//www.youtube.com/embed/'+video_id;
            //var src  = url.replace("watch?v=","embed/");
            var code = '<iframe class="thumbnail" width="100%" height="420" src="'+src+'" frameborder="0" allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
		else if(url.search("youtube.com")!=-1)
        {
            var video_id = getUrlVars(url)["v"];
            //https://www.youtube.com/watch?v=jIL0ze6_GIY
            var src = '//www.youtube.com/embed/'+video_id;
            //var src  = url.replace("watch?v=","embed/");
            var code = '<iframe class="thumbnail" width="100%" height="420" src="'+src+'" frameborder="0" allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
        else if(url.search("vimeo.com")!=-1)
        {
            //http://vimeo.com/64547919
            var segments = url.split("/");
            var length = segments.length;
            length--;
            var video_id = segments[length];
            var src  = url.replace("vimeo.com","player.vimeo.com/video");
            var code = '<iframe class="thumbnail" src="//player.vimeo.com/video/'+video_id+'" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            jQuery('#video_preview').html(code);
        }
        else
        {
        }
}
showVideoPreview('<?php echo $current_video_url?>');
</script>