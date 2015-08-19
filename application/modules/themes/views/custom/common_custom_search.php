<?php $CI = get_instance(); ?>
<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>

<link href="<?php echo theme_url();?>/assets/css/select2.css" rel="stylesheet">
<script src="<?php echo theme_url();?>/assets/js/select2.js"></script>
<div class="real-estate">
    <div class="re-big-form">
        <div class="container">
            <!-- Nav tab style 2 starts -->
            <div class="nav-tabs-two buy-sell-tab">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                </ul>
                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-1">

                        <form role="form" action="<?php echo site_url('show/advfilter')?>" method="post">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="input-11"><?php echo lang_key('select_city');?></label>
                                        <select id="city" name="city" class="form-control chosen-select">
                                            <option data-name="" value="any"><?php echo lang_key('any_city');?></option>
                                              <?php foreach (get_all_locations_by_type('city')->result() as $row) {
                                                  $sel = ($row->id==set_value('city'))?'selected="selected"':'';
                                                  ?>
                                                  <option data-name="<?php echo $row->name;?>" class="cities city-<?php echo $row->parent;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                                              <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="input-14"><?php echo lang_key('select_category');?></label>
                                        <?php
                                        $CI = get_instance();
                                        $CI->load->model('user/post_model');
                                        $categories = $CI->post_model->get_all_categories();
                                        ?>
                                        <select id="category" name="category" class="form-control chosen-select">
                                            <option value="any"><?php echo lang_key('any_category');?></option>
                                              <?php foreach ($categories as $row) {
                                                  $sel = (set_value('category')==$row->id)?'selected="selected"':'';
                                              ?>
                                                  <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->title);?></option>
                                              <?php
                                              }?>
                                        </select>
                                    </div>
                                </div>
                                 
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-color btn_filter"><i class="fa fa-search"></i>&nbsp; <?php echo lang_key('search_businesses'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(window).resize(function(){
        $('.chosen-select').select2({
            theme: "classic"
        });
    });

    $(document).ready(function(){
        $('.chosen-select').select2({
            theme: "classic"
        });

        var distance_unit = '<?php echo lang_key(get_settings("business_settings", "show_distance_in", "miles")); ?>';

        $("#slider-price-sell").slider({

            min: 1,

            max: 500,

            value: 25,

            slide: function (event, ui) {

                $("#price-slider-sell").val(ui.value);
                $("#amount").html( ui.value + ' ' + distance_unit );

            }

        });
        $("#amount").html($( "#slider-price-sell" ).slider( "value") + ' ' + distance_unit);


    });

    function findLocation()
    {
        if(!!navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position) {

                $('#geo_lat').val(position.coords.latitude);
                $('#geo_lng').val(position.coords.longitude);


            });

        } else {
            alert('No Geolocation Support.');
        }
    }

</script>
<!-- property search big form -->