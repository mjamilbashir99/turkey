<?php
$CI = get_instance();
$CI->load->model('user/post_model');
$parent_categories = $CI->post_model->get_all_post_categories();


?>
<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-folder color"></i>&nbsp; <?php echo lang_key('Categories Base News') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php
            $i = 0;
            foreach ($parent_categories->result() as $parent) {
       var_dump($parent);
			$i++;
            ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                 <a href="<?php echo site_url('post-detail/'.$parent->id);?>">
				 	<?php echo lang_key($parent->name); ?> 
                    <span class="color">(<?php echo $CI->post_model->count_news_by($parent->id);?>)</span>
                 </a>
                 </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>