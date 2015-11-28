<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$parent_categories = $CI->post_model->get_all_parent_categories();
?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-folder color"></i>&nbsp; <?php echo lang_key('Categories By Videos ') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php
            $i = 0;
			//var_dump($parent_categories);
            foreach ($parent_categories->result() as $parent) {
            $i++;
            ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                 <a href="<?php echo site_url('videos/?category='.$parent->id);?>">
				 	<?php echo lang_key($parent->title); ?> 
                    <span class="color">(<?php echo $CI->post_model->count_video_by($parent->id);?>)</span>
                 </a>
                 </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>