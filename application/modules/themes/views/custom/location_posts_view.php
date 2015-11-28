<?php require 'home_custom_search.php';  ?>
<?php $per_page = get_settings('business_settings', 'posts_per_page', 6); ?>
<!-- Page heading two starts -->
<div class="page-heading-two">
    <div class="container">
   
        <h2><?php echo get_location_name_by_id($location_id);?></h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / <a href="<?php echo site_url('show/location/'); ?>"><?php echo lang_key('location'); ?></a> / <?php echo get_location_name_by_id($location_id);?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Container -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="block-heading-two">
                <h3><span><i class="fa fa-map-marker"></i> <?php echo lang_key($location_type);?> : <?php echo get_location_name_by_id($location_id); ?></span>
                    <div class="pull-right list-switcher">
                        <a target="recent-posts" href="<?php echo site_url('show/location_posts_ajax/'.$per_page.'/grid/'.$location_id.'/'.$location_type);?>"><i class="fa fa-th "></i></a>
                        <a target="recent-posts" href="<?php echo site_url('show/location_posts_ajax/'.$per_page.'/list/'.$location_id.'/'.$location_type);?>"><i class="fa fa-th-list "></i></a>
                    </div>
                </h3>
            </div>
            <span class="recent-posts">
            </span>
            <div class="ajax-loading recent-loading"><img src="<?php echo theme_url();?>/assets/img/loading.gif" alt="loading..."></div>
            <a href="" class="load-more-recent btn btn-blue" style="width:100%"><?php echo lang_key('load_more_posts');?></a>

            <script type="text/javascript">
                var per_page = '<?php echo $per_page;?>';
                var recent_count = '<?php echo $per_page;?>';

                jQuery(document).ready(function(){
                    jQuery('.list-switcher a').click(function(e){
                        jQuery('.list-switcher a').removeClass('selected');
                        jQuery(this).addClass('selected');
                        e.preventDefault();
                        var target = jQuery(this).attr('target');
                        var loadUrl = jQuery(this).attr('href');
                        jQuery('.recent-loading').show();
                        jQuery.post(
                            loadUrl,
                            {},
                            function(responseText){
                                jQuery('.'+target).html(responseText);
                                jQuery('.recent-loading').hide();
                                if(jQuery('.recent-posts > div').children().length<recent_count)
                                {
                                    jQuery('.load-more-recent').hide();
                                }
                                fix_grid_height();
                            }
                        );
                    });

                    jQuery('.load-more-recent').click(function(e){
                        e.preventDefault();
                        var next = parseInt(recent_count)+parseInt(per_page);
                        jQuery('.list-switcher a').each(function(){
                            var url = jQuery(this).attr('href');
                            url = url.replace('/'+recent_count+'/','/'+next+'/');
                            jQuery(this).attr('href',url);
                        });
                        recent_count = next;
                        jQuery('.list-switcher > .selected').trigger('click');
                    });
                });
            </script>
            <br /> <br />
<?php 
if($location_type=="state"){
get_banner_target_area(191);}
else
get_banner_target_area(181);
?>
<div style="clear:both"></div>
            
        </div>
            
    

                            <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="sidebar">
                            <!-- Search Widget -->
                            <div class="s-widget">
                            <!-- Heading -->
                            <h5><i class="fa fa-search color"></i>  <?php echo lang_key('search'); ?></h5>
                            <!-- Widgets Content -->
                            <div class="widget-content search">
                            <form role="form" action="<?php echo site_url('show/advfilter')?>" method="post">
                            <div class="input-group">
                            <input class="form-control" type="text" placeholder="<?php echo lang_key('type_something'); ?>" value="<?php echo (isset($data['plainkey']))?rawurldecode($data['plainkey']):'';?>" name="plainkey">
                            
                            
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-color"><?php echo lang_key('search');?></button>
                            </span>
                            </div>
                            </form>
                            </div>
                            </div>
							<?php
                            $CI = get_instance();
                            $CI->load->database();
                            $limit = 5;
                            $CI->db->order_by('id','desc');
                            $query = $CI->db->get_where('posts',array('status'=>1),$limit,0);
                            ?>
                            <div class="s-widget">
                            <!-- Heading -->
                            <h5><i class="fa fa-clock-o color"></i>  <?php echo lang_key('recent_posts');?></h5>
                            <!-- Widgets Content -->
                            <div class="widget-content hot-properties">
                            <?php if($query->num_rows()<=0){?>
                            <div class="alert alert-info"><?php echo lang_key('no_posts');?></div>
                            <?php }else{?>
                            <ul class="list-unstyled">
                            <?php
                            foreach ($query->result() as $post) {
                            ?>
                            <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                            <!-- Image -->
                            <a href="<?php echo post_detail_url($post);?>"><img class="img-responsive img-thumbnail" src="<?php echo get_featured_photo_by_id($post->featured_img);?>" alt="<?php echo get_post_data_by_lang($post,'title');?>" /></a>
                            <!-- Heading -->
                            <h4><a href="<?php echo post_detail_url($post);?>"><?php echo get_post_data_by_lang($post,'title');?></a></h4>
                            <!-- Price -->
                            <div class="price"><strong><?php echo lang_key('city');?></strong>: <?php echo get_location_name_by_id($post->city);?>
                            <?php $average_rating = $post->rating; ?>
                            <?php $half_star_position = check_half_star_position($average_rating); ?>
                            <?php echo get_review_with_half_stars($average_rating,$half_star_position,'stars-sidebar');?>
                            </div>
                            <div class="clearfix"></div>
                            </li>
                            <?php
                            }
                            ?>
                            </ul>
                            <?php }?>
                            </div>
                            </div>
                            <div style="clear:both"></div>
                            <?php
							$CI = get_instance();
							$CI->load->database();
							$CI->db->where('status',1);
							$CI->db->select('state, COUNT(state) as total');
							$CI->db->group_by('state');
							$CI->db->order_by('total', 'desc');
							$CI->db->limit(10);
							$query = $CI->db->get('posts');
							$location_id;
                            $state=$location_type;
							?>
							<div class="s-widget">
							<!-- Heading -->
                            <?php if($state!="state"){?>
							<h5><i class="fa fa-map-marker color"></i>  <?php echo lang_key('City Base Top Locations') ?></h5>
							<!-- Widgets Content -->
							
							<div class="widget-content categories">
							<ul class="list-6">
                            <?php
							 foreach ($query->result() as $post) { ?>
							<li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
							<a href="<?php echo site_url('location-posts/'.$post->state.'/state/'.dbc_url_title(get_location_name_by_id($post->state)));?>">
							<?php echo get_location_name_by_id($post->state); ?> 
							<span class="color">(<?php echo $post->total;?>)</span>
							</a>
							</li>
							<?php } 
							}
							else {?>
							<h5><i class="fa fa-map-marker color"></i>  <?php echo lang_key('County Base Top Locations') ?></h5>
							<!-- Widgets Content -->
							
							<div class="widget-content categories">
							<ul class="list-6">
                            <?php
							$CI = get_instance();
							$CI->load->database();
							$CI->db->where('state',$location_id);
							$CI->db->select('city, COUNT(city) as total');
							$CI->db->group_by('city');
							$CI->db->order_by('total', 'desc');
							$CI->db->limit(10);
							$query = $CI->db->get('posts');

            foreach ($query->result() as $post) { ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                    <a href="<?php echo site_url('location-posts/'.$post->city.'/county/'.dbc_url_title(get_location_name_by_id($post->city)));?>">
                    <?php echo get_location_name_by_id($post->city); ?> 
                        <span class="color">(<?php echo $post->total;?>)</span>
                    </a>
                </li>
                <?php }
							?>
							</ul>
							</div>
                            <?php }
							?>
							</div>
							<div style="clear:both"></div>
							<?php
                            $CI = get_instance();
                            $CI->load->model('user/post_model');
                            $parent_categories = $CI->post_model->get_all_parent_categories();
                            ?>
                            <div class="s-widget">
                            <!-- Heading -->
                            <h5><i class="fa fa-folder color"></i>  <?php echo lang_key('categories') ?></h5>
                            <!-- Widgets Content -->
                            
                            <div class="widget-content categories">
                            <ul class="list-6">
                            <?php
                            $i = 0;
                            foreach ($parent_categories->result() as $parent) {
                            $i++;
                            ?>
                            <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><a href="<?php echo site_url('show/categoryposts/'.$parent->id.'/'.dbc_url_title(lang_key($parent->title)));?>"><?php echo lang_key($parent->title); ?> <span class="color">(<?php echo $CI->post_model->count_post_by_category_id($parent->id);?>)</span></a></li>
                            <?php } ?>
                            </ul>
                            </div>
                            </div>
                            <div class="clearfix"></div>
							<?php
                            $CI = get_instance();
                            $CI->load->database();
                            $limit = 5;
                            $CI->db->order_by('id','desc');
                            $query = $CI->db->get_where('posts',array('status'=>1,'featured'=>1),$limit,0);
                            ?>
                            <div class="s-widget">
                            <!-- Heading -->
                            <h5><i class="fa fa-bookmark color"></i>  <?php echo lang_key('featured_businesses');?></h5>
                            <!-- Widgets Content -->
                            <div class="widget-content hot-properties">
                            <?php if($query->num_rows()<=0){?>
                            <div class="alert alert-info"><?php echo lang_key('no_posts');?></div>
                            <?php }else{?>
                            <ul class="list-unstyled">
                            <?php
                            foreach ($query->result() as $post) {
                            ?>
                            <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                            <!-- Image -->
                            <a href="<?php echo post_detail_url($post);?>"><img class="img-responsive img-thumbnail" src="<?php echo get_featured_photo_by_id($post->featured_img);?>" alt="<?php echo get_post_data_by_lang($post,'title');?>" /></a>
                            <!-- Heading -->
                            <h4><a href="<?php echo post_detail_url($post);?>"><?php echo get_post_data_by_lang($post,'title');?></a></h4>
                            <!-- Price -->
                            <div class="price"><strong><?php echo lang_key('city');?></strong>: <?php echo get_location_name_by_id($post->city);?>
                            <?php $average_rating = $post->rating; ?>
                            <?php $half_star_position = check_half_star_position($average_rating); ?>
                            <?php echo get_review_with_half_stars($average_rating,$half_star_position,'stars-sidebar');?>
                            </div>
                            <div class="clearfix"></div>
                            </li>
                            <?php
                            }
                            ?>
                            </ul>
                            <?php }?>
                            </div>
                            </div>
                            <div style="clear:both"></div>
            <?php //render_widgets('right_bar_locations');?>
                            <div>
							<?php
							if($location_type=="state")
							{
							for($i=192; $i<=200; $i++)
                            {
                            get_banner_target_area($i);
                            }
							}else
                            for($i=182; $i<=190; $i++)
                            {
                            get_banner_target_area($i);
                            }
							?>
                            </div>
                            <div style="clear:both"></div>
            </div>
        </div>

    </div>
</div>
