<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$city;
$parent_categories = $CI->post_model->get_all_post_categories_by_blog();
//var_dump($parent_categories->result());
?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-folder color"></i>&nbsp; <?php echo lang_key('Blog Base Categories') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php
             $count = 0;
            foreach ($parent_categories->result() as $parent) {
            $count  = count_blog_by('blog',$parent->id,'');
			if($count)
			{
            ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                 <a href="<?php echo site_url('blog-posts/?category='.$parent->id);?>">
				 	<?php echo lang_key($parent->name); ?> 
                    <span class="color">(<?php echo $count?>)</span>
                 </a>
                 </li>
            <?php } }?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>