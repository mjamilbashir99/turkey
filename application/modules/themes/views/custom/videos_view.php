<!-- Page heading two starts -->
<div class="page-heading-two">
    <div class="container">
        <h2><?php echo lang_key('locations'); ?></h2>
        <div class="breads">
            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / <?php echo lang_key('locations'); ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Container -->
<div class="container">

    <div class="row">

        <div class="col-md-9 col-sm-12 col-xs-12">
           dfasd

            <?php render_widgets('location_page');?>
            <div class="clearfix"></div>
        </div>


        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar">
                <?php render_widgets('right_bar_locations');?>
            </div>
        </div>

    </div>
</div>
