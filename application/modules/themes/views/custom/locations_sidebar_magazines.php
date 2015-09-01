<div class="s-widget">
    <!-- Heading -->
    <h5><i class="fa fa-map-marker color"></i>  <?php echo lang_key('Locations By Emagazine') ?></h5>
    <!-- Widgets Content -->

    <div class="widget-content categories">
        <ul class="list-6">
            <?php foreach ($locations as $post) { ?>
                <li class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                    <a href="<?php echo site_url('emagazine/?region='.$post->state);?>">
                    <?php echo $post->name; ?> 
                        <span class="color">(<?php echo $CI->post_model->count_magazine_by('',$post->state);?>)</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div style="clear:both"></div>