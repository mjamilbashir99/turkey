

<link href="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.css" rel="stylesheet">

<script src="<?php echo theme_url();?>/assets/jquery-ui/jquery-ui.js"></script>

<script src="<?php echo theme_url();?>/assets/jquery-ui/timepicker.js"></script>



<link href="<?php echo theme_url();?>/assets/css/popup.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js');?>"></script>

<script type="text/javascript" src="<?php echo theme_url();?>/assets/js/jquery.popup.js"></script>



<script type="text/javascript">



    tinymce.init({

        convert_urls : 0,

        selector: ".rich",

        menubar: false,

        toolbar: "styleselect | bold | link | bullist | numlist | code",

        plugins: [



            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",



            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",



            "save code table contextmenu directionality emoticons template paste textcolor"



        ]



    });

</script>



<style>

    dl dd, dl dt {

        font-size: 13px;

        line-height: 13px;

    }

</style>

<?php $post = $post->row();?>

<?php $extra_urls = $extra_urls->row();?>

<?php $apps_data = $apps_data->result();?>

<?php $magazines_data = $magazines_data->result();?>

<?php $issues_data = $issues_data->result();?>



<div class="page-heading-two">

    <div class="container">

        <h2><?php echo get_post_data_by_lang($post,'title'); ?> <span><?php echo lang_key('post_ad_subtitle');?></span></h2>

        <div class="breads">

            <a href="<?php echo site_url(); ?>"><?php echo lang_key('home'); ?></a> / <?php echo get_post_data_by_lang($post,'title'); ?>

        </div>

        <div class="clearfix"></div>

    </div>

</div>



<div class="container">

        <form action="<?php echo site_url('update-ad');?>" method="post" role="form" class="form-horizontal">

        <input type="hidden" name="id" id="id" value="<?php echo $post->id;?>">

        <input type="hidden" name="page" value="<?php echo ($page)?$page:0;?>">

        <div class="row">

            <?php echo $this->session->flashdata('msg');?>

            <div class="col-md-6 col-sm-6">

                <!-- Shopping items content -->

                <div class="shopping-content">

                    <div class="shopping-checkout">

                        <!-- Heading -->

                            <h4><?php echo lang_key('basic_info');?></h4>

                            <hr/>

                            <div class="form-group">

                                <label class="col-md-3 control-label" for="inputEmail1"><?php echo lang_key('category');?></label>

                                <div class="col-md-8">

                                    <select name="category" class="form-control">

                                        <option value=""><?php echo lang_key('select_category');?></option>

                                        <?php foreach ($categories as $row) {

                                            $v = (set_value('category')!='')?set_value('category'):$post->category;

                                            $sel = ($v==$row->id)?'selected="selected"':'';

                                        ?>

                                            <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->title);?></option>

                                        <?php

                                        }?>

                                    </select>

                                    <?php echo form_error('category');?>

                                </div>

                            </div>



                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('phone');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('phone_no')!='')?set_value('phone_no'):$post->phone_no;?>

                                <input id="phone_no" type="text" name="phone_no" placeholder="<?php echo lang_key('phone');?>" value="<?php echo $v;?>" class="form-control">

                                <?php echo form_error('phone_no');?>

                            </div>

                        </div>



                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('email');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('email')!='')?set_value('email'):$post->email;?>

                                <input id="email" type="text" name="email" placeholder="<?php echo lang_key('email');?>" value="<?php echo $v;?>" class="form-control">

                                <?php echo form_error('email');?>

                            </div>

                        </div>



                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('website');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('website')!='')?set_value('website'):$post->website;?>

                                <input id="website" type="text" name="website" placeholder="<?php echo lang_key('website');?>" value="<?php echo $v;?>" class="form-control">

                                <?php echo form_error('website');?>

                            </div>

                        </div>

<!-- -->

                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('project_website');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('project_website')!='')?set_value('project_website'):$post->project_website;?>

                                <input id="project_website" type="text" name="project_website" placeholder="<?php echo lang_key('project_website');?>" value="<?php echo $v;?>" class="form-control">

                                <?php echo form_error('project_website');?>

                            </div>

                        </div>

<!-- -->

                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('founded');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('founded')!='')?set_value('founded'):$post->founded;?>

                                <input id="founded" type="text" name="founded" placeholder="<?php echo lang_key('year');?>" value="<?php echo $v;?>" class="form-control">

                                <?php echo form_error('founded');?>

                            </div>

                        </div>



                            <div class="form-group price-input-holder">

                                <label class="col-md-3 control-label"><?php echo lang_key('price_range');?></label>

                                <div class="col-md-8">

                                    <?php $v = (set_value('price_range')!='')?set_value('price_range'):$post->price_range;?>

                                    <input type="text" name="price_range" placeholder="<?php echo lang_key('price_range');?>" value="<?php echo $v;?>" class="form-control">

                                    <?php echo form_error('price_range');?>

                                </div>

                            </div>



                            

                            <h4><?php echo lang_key('address_info');?></h4>

                            <hr/>







                            <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('country');?></label>

                                <div class="col-md-8">

                                    <select name="country" id="country" class="form-control">

                                        <option data-name="" value=""><?php echo lang_key('select_country');?></option>

                                        <?php $v = (set_value('country')!='')?set_value('country'):$post->country;?>

                                        <?php foreach (get_all_locations_by_type('country')->result() as $row) {

                                            $sel = ($row->id==$v)?'selected="selected"':'';
                                            $state=$sel;
                                            ?>

                                            <option data-name="<?php echo $row->name;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>

                                        <?php }?>

                                    </select>

                                    <?php echo form_error('City');?>

                                </div>

                            </div>
                             <?php $state_active = get_settings('business_settings', 'show_state_province', 'yes'); ?>

                        <?php if($state_active == 'yes'){ ?>

                        <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('Cities');?></label>

                                <div class="col-md-8">

                                    <select name="state" id="state" class="form-control">

                                      

                                    </select>

                                    <?php echo form_error('state');?>

                                </div>

                            </div>

                      

                            <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('Counties');?></label>

                                <div class="col-md-8">

                                    <?php $city_field_type = get_settings('business_settings', 'city_dropdown', 'autocomplete'); ?>

                                    <?php $selected_city = (set_value('selected_city')!='')?set_value('selected_city'):$post->city;?>

                                    <input type="hidden" name="selected_city" id="selected_city" value="<?php echo $selected_city;?>">

                                    <?php if ($city_field_type=='dropdown') {?>

                                    <select name="city" id="city_dropdown" class="form-control">                                        

                                    </select>

                                    <?php }else {?>

                                    <input type="text" id="city" name="city" value="<?php echo get_location_name_by_id($selected_city);?>" placeholder="<?php echo lang_key('Counties');?>" class="form-control input-sm" >

                                    <span class="help-inline city-loading">&nbsp;</span>

                                    <?php }?>

                                    <?php echo form_error('city');?>

                                </div>

                            </div>

                        <?php } ?>

                            <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('zip_code');?></label>

                                <div class="col-md-8">

                                    <?php $v = (set_value('zip_code')!='')?set_value('zip_code'):$post->zip_code;?>

                                    <input type="text" name="zip_code" placeholder="<?php echo lang_key('zip_code');?>" value="<?php echo $v;?>" class="form-control">

                                    <?php echo form_error('zip_code');?>

                                </div>

                            </div>



                            <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('address');?></label>

                                <div class="col-md-8">

                                <?php $v = (set_value('address')!='')?set_value('address'):$post->address;?>

                                    <input id="address" type="text" name="address" placeholder="<?php echo lang_key('address');?>" value="<?php echo $v;?>" class="form-control">

                                    <?php echo form_error('address');?>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-8">

                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="codeAddress()"><i class="fa fa-map-marker"></i> <?php echo lang_key('view_on_map');?></a>



                                </div>

                            </div>



                            <div class="form-group">

                                <label class="col-md-3 control-label">&nbsp;</label>

                                <div class="col-md-8">

                                    <div id="form-map"></div>

                                </div>

                            </div>



                            <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('latitude');?></label>

                                <div class="col-md-8">

                                    <?php $v = (set_value('latitude')!='')?set_value('latitude'):$post->latitude;?>

                                    <input id="latitude" type="text" name="latitude" placeholder="<?php echo lang_key('latitude');?>" value="<?php echo $v;?>" class="form-control">

                                    <?php echo form_error('latitude');?>

                                </div>

                            </div>



                            <div class="form-group">

                                <label class="col-md-3 control-label"><?php echo lang_key('longitude');?></label>

                                <div class="col-md-8">

                                    <?php $v = (set_value('longitude')!='')?set_value('longitude'):$post->longitude;?>

                                    <input id="longitude" type="text" name="longitude" placeholder="<?php echo lang_key('longitude');?>" value="<?php echo $v;?>" class="form-control">

                                    <?php echo form_error('longitude');?>

                                </div>

                            </div>

                        <h4><?php echo lang_key('opening_hour');?></h4>

                        <hr/>





                        <?php

                        $days = array(1 => 'monday', 2 => 'tuesday', 3=>'wednesday', 4=> 'thursday', 5=> 'friday', 6=> 'saturday', 7 =>'sunday');

                        $opening_hour = ($post->opening_hour!='')?(array)json_decode($post->opening_hour):array();                        



                        foreach($days as $key => $day){

                            ?>

                            <input type="hidden" name="days[]" value="<?php echo $day; ?>">



                            <div class="form-group">

                                <label class="col-xs-3 control-label"><?php echo lang_key($day);?></label>

                                <?php $post_opening     = (isset($opening_hour[$key-1]->start_time))?$opening_hour[$key-1]->start_time:'09:00 AM';?>

                                <?php $default_opening  = (isset($_POST['opening_hour'][$key-1]) && $_POST['opening_hour'][$key-1]!='')?$_POST['opening_hour'][$key-1]:$post_opening;  ?>

                                <?php $post_closing     = (isset($opening_hour[$key-1]->close_time))?$opening_hour[$key-1]->close_time:'05:00 PM';?>

                                <?php $default_closing  = (isset($_POST['closing_hour'][$key-1]) && $_POST['closing_hour'][$key-1]!='')?$_POST['closing_hour'][$key-1]:$post_closing;  ?>

                                <?php $post_closed      = (isset($opening_hour[$key-1]->closed))?$opening_hour[$key-1]->closed:'';?>

                                <?php $default_closed   = (isset($_POST['closed'][$key-1]) && $_POST['closed'][$key-1]!='')?$_POST['closed'][$key-1]:$post_closed;  ?>



                                <div class="col-xs-3">

                                    <input type="text" id="start-time-<?php echo $key; ?>"  name="opening_hour[]" value="<?php echo $default_opening; ?>"  class="form-control input-sm time-input" >



                                </div>

                                <div class="col-xs-3">

                                    <input type="text" id="end-time-<?php echo $key; ?>"  name="closing_hour[]" value="<?php echo $default_closing; ?>"  class="form-control input-sm time-input" >



                                </div>

                                <div class="checkbox col-xs-3">

                                    <label>

                                        <?php $chk = ($default_closed==1)?'checked="checked"':'';?>

                                        <input <?php echo $chk;?> data-day="<?php echo $key; ?>" type="checkbox" class="close-days" value="<?php echo $key;?>" name="closed_days[]">

                                        <?php echo lang_key('closed'); ?>

                                    </label>

                                </div>

                            </div>



                        <?php

                        }

                        ?>

                        

                        <h4><?php echo lang_key('social_links'); ?></h4><hr/>

		                <div class="form-group">

		                    <label class="col-md-3 control-label"><?php echo lang_key('facebook');?></label>

		                    <div class="col-md-8">

		                        <input type="text" name="facebook_profile" value="<?php echo get_post_meta($post->id,'facebook_profile','');?>" class="form-control">

		                    </div>

		                </div>            

		                <div class="form-group">

		                    <label class="col-md-3 control-label"><?php echo lang_key('twitter');?></label>

		                    <div class="col-md-8">

		                        <input type="text" name="twitter_profile" value="<?php echo get_post_meta($post->id,'twitter_profile','');?>" class="form-control">

		                    </div>

		                </div>

		                <div class="form-group">

		                    <label class="col-md-3 control-label"><?php echo lang_key('linkedin');?></label>

		                    <div class="col-md-8">

		                        <input type="text" name="linkedin_profile" value="<?php echo get_post_meta($post->id,'linkedin_profile','');?>" class="form-control">

		                    </div>

		                </div>

		                <div class="form-group">

		                    <label class="col-md-3 control-label"><?php echo lang_key('pinterest');?></label>

		                    <div class="col-md-8">

		                        <input type="text" name="pinterest_profile" value="<?php echo get_post_meta($post->id,'pinterest_profile','');?>" class="form-control">

		                    </div>

		                </div>

		                <div class="form-group">

		                    <label class="col-md-3 control-label"><?php echo lang_key('googleplus');?></label>

		                    <div class="col-md-8">

		                        <input type="text" name="googleplus_profile" value="<?php echo get_post_meta($post->id,'googleplus_profile','');?>" class="form-control">

		                    </div>

		                </div>



                    </div>

                </div>

            </div>

            <div class="col-md-6 col-sm-6">



                <h4><?php echo lang_key('general_info');?></h4>

                <hr/>



                <?php 

            $CI = get_instance();

            $CI->load->model('admin/system_model');

            $langs = $CI->system_model->get_all_langs();

            ?>



                

            <div class="tabbable">

                <ul class="nav nav-tabs" id="myTab1">

                    <?php $flag=1; foreach ($langs as $lang=>$long_name){ 

                        ?>

                    <li class="<?php echo (default_lang()==$lang)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang;?>"><i class="fa fa-home"></i> <?php echo $lang;?></a></li>

                    <?php $flag++; }?>

                </ul>

                <div class="tab-content" id="myTabContent1">

                     <?php $flag=1; foreach ($langs as $lang=>$long_name){ 

                     ?>

                     <div id="<?php echo $lang;?>" class="tab-pane fade in <?php echo (default_lang()==$lang)?'active':'';?>">

                    

                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('title');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('title_'.$lang)!='')?set_value('title_'.$lang):get_post_data_by_lang($post,'title',$lang);?>

                                <input type="text" name="title_<?php echo $lang;?>" placeholder="<?php echo lang_key('title');?>" value="<?php echo $v;?>" class="form-control">

                                <?php echo form_error('title_'.$lang);?>

                            </div>

                        </div>





                        <div class="form-group">

                            <label class="col-md-3 control-label"><?php echo lang_key('description');?></label>

                            <div class="col-md-8">

                                <?php $v = (set_value('description_'.$lang)!='')?set_value('description_'.$lang):get_post_data_by_lang($post,'description',$lang);?>

                                <textarea rows="15" name="description_<?php echo $lang;?>" class="form-control rich"><?php echo $v;?></textarea>

                                <?php echo form_error('description_'.$lang);?>

                            </div>

                        </div>



                    

                    </div>

                    <?php $flag++; }?>

                </div>

            </div>









                <div class="form-group">

                    <label class="col-md-3 control-label"><?php echo lang_key('tags');?></label>

                    <div class="col-md-8">

                        <?php $v = (set_value('tags')!='')?set_value('tags'):$post->tags;?>

                        <textarea rows="15" name="tags" class="form-control tag-input"><?php echo $v;?></textarea>

                        <span><?php echo lang_key('put_as_comma_seperated')?></span>

                        <?php echo form_error('tags');?>

                    </div>

                </div>



                <div class="form-group">

                    <label class="col-md-3 control-label"><?php echo lang_key('additional_features');?></label>

                    <div class="col-md-8">

                        <div class="input_fields_wrap">

                            <?php 

                            $additional_features = ($post->additional_features!='')?(array)json_decode($post->additional_features):array();

                            foreach ($additional_features as $key=>$feature) 

                            {

                                $post_feature_value = (isset($additional_features[$key]))?$additional_features[$key]:'';

                                $feature_value = (isset($_POST['additional_features'][$key]) && $_POST['additional_features'][$key]!='')?$_POST['additional_features'][$key]:$post_feature_value;

                            ?>

                            <div id="feature-input-holder">

                                <input style="margin-bottom: 5px" placeholder="<?php echo lang_key('additional_features');?>" type="text" class="form-control" name="additional_features[]" value="<?php echo $feature_value;?>">

                                <a href="#" class="remove_field">X</a>

                            </div>

                            <?php

                            }

                            ?>

                        </div>

                        <button class="add_field_button btn btn-orange"><?php echo lang_key('add_more_fields');?></button>



                        <?php echo form_error('tags');?>

                    </div>

                </div>





                <div class="form-group">

                    <label class="col-md-3 control-label"><?php echo lang_key('featured_image');?></label>

                    <div class="col-md-8">

                        <div class="featured-img">

                            <?php $v = (set_value('featured_img')!='')?set_value('featured_img'):$post->featured_img;?>

                            <input type="hidden" name="featured_img" id="featured-img-input" value="<?php echo $v;?>">

                            <img id="featured-img" src="<?php echo base_url('uploads/images/no-image.png');?>">

                            <div class="upload-button" id="upload-button"><?php echo lang_key('upload');?></div>

                            <?php echo form_error('featured_img');?>

                        </div>

                    </div>

                </div>





                <div class="form-group">

                    <label class="col-md-3 control-label"><?php echo lang_key('logo');?></label>

                    <div class="col-md-8">

                        <div class="business-logo">

                            <?php $v = (set_value('business_logo')!='')?set_value('business_logo'):get_post_meta($post->id,'business_logo','no-image.png');?>

                            <input type="hidden" name="business_logo" id="business-logo-input" value="<?php echo $v;?>">

                            <img id="business-logo" src="<?php echo base_url('uploads/logos/no-image.png');?>">

                            <div class="clearfix"></div>

                            <div class="logo-upload-button btn btn-blue" id="logo-upload-button"><?php echo lang_key('upload');?></div>

                            <?php echo form_error('business_logo');?>

                        </div>

                    </div>

                </div>



<!-- -->

                <div class="form-group">

                    <label class="col-md-3 control-label"><?php echo lang_key('video_url');?></label>

                    <div class="col-md-8">

                        <?php $v = (set_value('video_url')!='')?set_value('video_url'):$post->video_url;?>

                        <span id="video_preview"></span>

                    </div>

                </div>
 
                <div class="form-group">

                    <label class="col-md-3 control-label" style="padding-top: 0px;"><a href="#extra_video_url" class="animated_popup"><img src="<?php echo base_url('assets/images/plus-icon.png');?>" /></a>

                        <div id="extra_video_url" style="display:none;">

                            <div class="extra_video_url_content" style="width: 850px;">

                                <div class="row extra_video_url_header" style="text-align: center; margin-bottom: 20px;"><p><strong>Please Select Default Video</strong></p></div>

                                <div class="row extra_video_url_body" style="text-align: center;">

                                    <div class="col-md-6">

                                    <?php for($i=1;$i<6;$i++){ $column_name = "url_" . ($i-1); ?>

                                        <div class="form-group extra_video_url_left">

                                            <div class="col-md-2" style="padding: 0px;"><span>Video <?php echo $i; ?></span></div>

                                            <div class="col-md-1" style="padding: 0px;"><input type="radio" name="extra_video_url_radio" id="extra_video_url_radio" onclick="select_default_url(<?php echo $i; ?>);"></div>

                                            <div class="col-md-9" style="padding: 0px;"><input type="text" name="extra_video_url_input_<?php echo $i; ?>" id="extra_video_url_input_<?php echo $i; ?>" value="<?php echo $extra_urls->$column_name; ?>" style="width: 100%; margin-bottom: 10px;"></div>

                                        </div>

                                    <?php } ?>

                                    </div>

                                    <div class="col-md-6">

                                    <?php for($i=6;$i<11;$i++){ $column_name = "url_" . ($i-1);?>

                                        <div class="extra_video_url_right">

                                            <div class="col-md-2" style="padding: 0px;"><span>Video <?php echo $i; ?></span></div>

                                            <div class="col-md-1" style="padding: 0px;"><input type="radio" name="extra_video_url_radio" id="extra_video_url_radio" onclick="select_default_url(<?php echo $i; ?>);"></div>

                                            <div class="col-md-9" style="padding: 0px;"><input type="text" name="extra_video_url_input_<?php echo $i; ?>" id="extra_video_url_input_<?php echo $i; ?>" value="<?php echo $extra_urls->$column_name; ?>" style="width: 100%; margin-bottom: 10px;"></div>

                                        </div>

                                    <?php } ?>

                                    </div>

                                </div>







                            </div>

                        </div>



                    </label>

                    <div class="col-md-8">

                       <?php $v = (set_value('video_url')!='')?set_value('video_url'):$post->video_url;?>

                        <input id="video_url" type="text" name="video_url" placeholder="<?php echo lang_key('video_url');?>" value="<?php echo $v;?>" class="form-control">

                        <span class="help-inline">Youtube or Vimeo url</span>

                        <?php echo form_error('video_url');?>

                    </div>

                </div>

<!-- -->

                <div class="form-group">

                    <label class="col-md-3 control-label"><?php echo lang_key('gallery');?></label>

                    <div class="col-md-8">

                        <?php $tmp_gallery = ($post->gallery!='')?json_decode($post->gallery):array();?>

                        <?php $gallery = (isset($_POST['gallery']))?$_POST['gallery']:$tmp_gallery;?>

                        <ul class="multiple-uploads" id="multiple-uploads">

                            <?php foreach ($gallery as $item) {

                            ?>

                            <li class="gallery-img-list">

                              <input type="hidden" name="gallery[]" value="<?php echo $item;?>" />

                              <img src="<?php echo base_url('uploads/gallery/'.$item);?>" />

                              <div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>

                            </li>

                            <?php }?>

                            <li class="add-image" id="dragandrophandler">+</li>

                        </ul>       

                        <div class="clearfix"></div>

                        <span class="gallery-upload-instruction">NB: you can drag drop to reorder the gallery photos. Photos are not resized.</span>

                        <div class="clearfix clear-top-margin"></div>

                    </div>

                </div>

            </div>

        </div>

<!-- -->



<!-- Add apps -->
  <h4><?php echo lang_key('Application info');?></h4>
        <div class="row" style="height: 40px;">
        
            <hr>

            <div class="col-md-10"></div>

            <div class="col-md-2" style="margin-bottom: 20px;">

                <select name="app_list" id="app_list" onchange="show_current_app();">

                    <?php if($apps_data_num == 0){ ?>

                        <option value="" selected>App 1</option>

                    <?php }else{

                        for($i=0;$i<$apps_data_num;$i++){ ?>

                            <option value="<?php echo $apps_data[$i]->id; ?>">App <?php echo ($i+1); ?></option>

                        <?php }} ?>

                </select>

            </div>

        </div>



        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <div class="col-md-6">

                    <?php

                        $CI = get_instance();

                        $CI->load->model('admin/system_model');

                        $langs = $CI->system_model->get_all_langs();

                    ?>

                    <div class="tabbable">

                        <ul class="nav nav-tabs" id="myTab1">

                            <?php $flag=1; foreach ($langs as $lang=>$long_name){ ?>

                            <li class="<?php echo (default_lang()==$lang)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang;?>"><i class="fa fa-home"></i> <?php echo $lang;?></a></li>

                            <?php $flag++; }?>

                        </ul>

                        <div class="tab-content" id="myTabContent1">

                            <div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label"><?php echo lang_key('title');?></label>

                                    <div class="col-md-10">

                                        <?php $v = ($apps_data_num > 0)? $apps_data[0]->id:0;?>

                                        <input type="hidden" name="app_num" id="app_num" value="<?php echo $v; ?>">

                                        <?php $v = ($apps_data_num > 0)? $apps_data[0]->title:'';?>

                                        <input type="text" name="app_title1" id="app_title1" value="<?php echo $v; ?>" class="form-control">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label"><?php echo lang_key('description');?></label>

                                    <div class="col-md-10" id="textarea_div_app">

                                        <?php $v = ($apps_data_num > 0)? $apps_data[0]->description:'';?>

                                        <textarea rows="15" name="app_description1" id="app_description1" class="form-control rich"><?php echo $v; ?></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tabbable">

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/win8-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <?php $v = ($apps_data_num > 0)? $apps_data[0]->window:'';?>

                                <input type="text" name="app_window1" id="app_window1" value="<?php echo $v; ?>" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/mac-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <?php $v = ($apps_data_num > 0)? $apps_data[0]->mac:'';?>

                                <input type="text" name="app_mac1" id="app_mac1" value="<?php echo $v; ?>" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/android-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <?php $v = ($apps_data_num > 0)? $apps_data[0]->android:'';?>

                                <input type="text" name="app_android1" id="app_android1" value="<?php echo $v; ?>" class="form-control">

                            </div>

                        </div>
                          
                    </div>

                </div>

<!-- -->


                <div class="col-md-6">

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-6">

                            <div class="featured-img">

                                <?php $v = ($apps_data_num > 0)? $apps_data[0]->featured_img:'no-image.png';?>

                                <input type="hidden" name="app_featured_img1" id="app_featured-img-input1" value="<?php echo $v; ?>">

                                <img id="app_featured-img1" src="<?php echo base_url('uploads/thumbs/'.$v);?>">

                                <div class="upload-button" id="app_upload_button" identfy="1"><?php echo lang_key('upload');?></div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-2 control-label"><?php echo lang_key('gallery');?></label>

                        <div class="col-md-10">

                            <?php $gallery = ($apps_data[0]->gallery!='')?json_decode($apps_data[0]->gallery):array();?>

                            <ul class="multiple-uploads" id="app_multiple-uploads">

                                <div id="li_wrap_app">

                                    <?php foreach ($gallery as $item) { ?>

                                    <li class="gallery-img-list">

                                        <input type="hidden" name="app_gallery[]" value="<?php echo $item;?>" />

                                        <img src="<?php echo base_url('uploads/gallery/'.$item);?>" />

                                        <div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>

                                    </li>

                                    <?php }?>

                                </div>

                                <li class="add-image" id="app_dragandrophandler">+</li>

                            </ul>

                            <div class="clearfix"></div>

                            <div class="clearfix clear-top-margin"></div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-2 control-label"><?php echo lang_key('tags');?></label>

                        <div class="col-md-10">

                            <?php $v = ($apps_data_num > 0)? $apps_data[0]->tags:'';?>

                            <textarea rows="1" name="app_tags1" id="app_tags1" class="form-control"><?php echo $v; ?></textarea>

                            <span><?php echo lang_key('put_as_comma_seperated')?></span>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-10">

                            <div class="featured-img">

                                <?php $v = ($apps_data_num > 0)? $apps_data[0]->qr:'no-image.png';?>

                                <input type="hidden" name="app_featured_img_qr1" id="app_featured-img-input_qr1" value="<?php echo $v; ?>">

                                <img id="app_featured-img_qr1" src="<?php echo base_url('uploads/thumbs/'.$v);?>">

                                <div class="upload-button" id="app_upload_button_qr" identfy="1"><?php echo lang_key('upload');?></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-1">

                <a href="javascript:void(0);" onclick="add_app_form();"><img style="width: 48px;" src="<?php echo base_url('assets/images/plus-icon1.png');?>" /></a>

            </div>

        </div>

<!-- // End Apps -->

        <div class="row">

            <div class="col-md-12">

                <div class="form-group align-centre">

                    <button class="btn btn-color" type="submit" style="visibility: hidden"><?php echo lang_key('save');?></button>

                    <button class="btn btn-default" type="reset" style="visibility: hidden"><?php echo lang_key('reset');?></button>



                    <button class="btn btn-u-red" type="button" onclick="delete_current_app();" style="margin-left: 100px;"><?php echo lang_key('delete');?></button>

                </div>

            </div>

        </div>



<!-- Add Magazines -->
  <h4><?php echo lang_key('Magazines info');?></h4>
        <div class="row" style="height: 40px;">

            <hr>

            <div class="col-md-10"></div>

            <div class="col-md-2" style="margin-bottom: 20px;">

                <select name="magazine_list" id="magazine_list" onchange="show_current_magazine();">

                    <?php if($magazines_data_num == 0){ ?>

                        <option value="" selected>Magazine 1</option>

                    <?php }else{

                        for($i=0;$i<$magazines_data_num;$i++){ ?>

                            <option value="<?php echo $magazines_data[$i]->id; ?>">Magazine <?php echo ($i+1); ?></option>

                        <?php }} ?>

                </select>

            </div>

        </div>



        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <div class="col-md-6">

                    <?php

                    $CI = get_instance();

                    $CI->load->model('admin/system_model');

                    $langs = $CI->system_model->get_all_langs();

                    ?>

                    <div class="tabbable">

                        <ul class="nav nav-tabs" id="myTab1">

                            <?php $flag=1; foreach ($langs as $lang=>$long_name){ ?>

                                <li class="<?php echo (default_lang()==$lang)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang;?>"><i class="fa fa-home"></i> <?php echo $lang;?></a></li>

                                <?php $flag++; }?>

                        </ul>

                        <div class="tab-content" id="myTabContent1">

                            <div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label"><?php echo lang_key('title');?></label>

                                    <div class="col-md-10">

                                        <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->id:0;?>

                                        <input type="hidden" name="magazine_num" id="magazine_num" value="<?php echo $v; ?>">

                                        <?php $v = ($issues_data[0]->id > 0)? $issues_data[0]->id:0;?>

                                        <input type="hidden" name="issue_num" id="issue_num" value="<?php echo $v; ?>">

                                        <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->title:'';?>

                                        <input type="text" name="magazine_title1" id="magazine_title1" value="<?php echo $v; ?>" class="form-control">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label"><?php echo lang_key('description');?></label>

                                    <div class="col-md-10" id="textarea_div_magazine">

                                        <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->description:'';?>

                                        <textarea rows="15" name="magazine_description1" id="magazine_description1" class="form-control rich"><?php echo $v; ?></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tabbable">

                        <div class="form-group">

                            <label class="col-md-4 control-label"><?php echo lang_key('tags');?></label>

                            <div class="col-md-8">

                                <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->tags:'';?>

                                <textarea rows="1" name="magazine_tags1" id="magazine_tags1" class="form-control"><?php echo $v; ?></textarea>

                                <span><?php echo lang_key('put_as_comma_seperated')?></span>

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-md-4"></div>

                            <div class="col-md-8">

                                <div class="featured-img">

                                    <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->qr:'no-image.png';?>

                                    <input type="hidden" name="magazine_featured_img_qr1" id="magazine_featured-img-input_qr1" value="<?php echo $v; ?>">

                                    <img id="magazine_featured-img_qr1" src="<?php echo base_url('uploads/thumbs/'.$v);?>">

                                    <div class="upload-button" id="magazine_upload_button_qr" identfy="1"><?php echo lang_key('upload');?></div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/win8-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->window:'';?>

                                <input type="text" name="magazine_window1" id="magazine_window1" value="<?php echo $v; ?>" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/mac-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->mac:'';?>

                                <input type="text" name="magazine_mac1" id="magazine_mac1" value="<?php echo $v; ?>" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/android-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <?php $v = ($magazines_data_num > 0)? $magazines_data[0]->android:'';?>

                                <input type="text" name="magazine_android1" id="magazine_android1" value="<?php echo $v; ?>" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><?php echo lang_key('Sponsor Message');?></label>

                            <div class="col-md-8">
                           <input type="text" name="sponsor_add" value="<?php   get_sponoper_sms_by_county($selected_city); //echo $post->sponsor_add?>" class="form-control input-sm" >
                            </div>
                            <div class="col-md-2">
                             <input type="checkbox" name="show_sponsor_add" value="1" <?php if($post->show_sponsor_add==1) echo 'checked="checked"';?>>                         
                              </div>
                        </div>
                    </div>

                </div>

                <!-- -->

                <div class="col-md-6">

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-6">

                            <div class="featured-img">

                                <?php $v = ($issues_data[0]->id > 0)? $issues_data[0]->featured_img:'no-image.png';?>

                                <input type="hidden" name="magazine_featured_img1" id="magazine_featured-img-input1" value="<?php echo $v; ?>">

                                <img id="magazine_featured-img1" src="<?php echo base_url('uploads/thumbs/'.$v);?>">

                                <div class="upload-button" id="magazine_upload_button" identfy="1"><?php echo lang_key('upload');?></div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group" style="margin-bottom: 0px;">

                        <div class="col-md-2"></div>

                        <div class="col-md-2" style="text-align: center;">issue</div>

                        <div class="col-md-8">Magazine Name</div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <label class="col-md-2 control-label" style="padding-top: 0px;">



                            <a href="#add_magazine_issue" class="animated_popup" id="show_add_issue_modal" style="display: none;"></a>

                            <?php if($magazines_data_num>0){ ?>

							<a href="javascript:void(0);" onclick="show_issue_modal();">

                                <img style="width: 64px;" src="<?php echo base_url('assets/images/plus-icon2.png');?>" />

                            </a>

							<?php } ?>

                        </label>

                        <div class="col-md-8">

                            <?php $v = ($issues_data[0]->id > 0)? $issues_data[0]->name:'';?>

                            <input type="text" name="magazine_magazine_name1" id="magazine_magazine_name1" value="<?php echo $v; ?>" class="form-control" style="margin-top: 18px;">

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                         <div class="col-md-2">
   <label class="col-md-2 control-label"><?php echo lang_key('URL');?>:</label>
</div>
 <div class="col-md-8">
                            <?php $v = ($issues_data[0]->id > 0)? $issues_data[0]->url:'';?>

                       <input type="text" name="magazine_magazine_url1" id="magazine_magazine_url1" value="<?php echo $v; ?>" class="form-control">
</div>
                        </div>

                    </div>

                    <div class="form-group" style="margin-bottom: 0px;">

                        <div class="col-md-2"></div>

                        <div class="col-md-5">Year</div>

                        <div class="col-md-5">Month</div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-5">

                            <select name="magazine_magazine_year1" id="magazine_magazine_year1" style="height: 30px; font-size: 12pt; font-weight: bold;">

                            <?php $y=date("Y"); for($i=$y;$i<$y+10;$i++){ ?>

                                <?php $ct = ($issues_data[0]->year == $i)? "selected":''; ?>

                                <option value="<?php echo $i; ?>" <?php echo $ct; ?>><?php echo $i; ?></option>

                            <?php } ?>

                            </select>

                        </div>

                        <div class="col-md-5">

                            <select name="magazine_magazine_month1" id="magazine_magazine_month1" style="height: 30px; font-size: 12pt; font-weight: bold;" >

                                <?php $v = ($issues_data[0]->month == 'January')? 'selected':'';?>

                                <option value="January" <?php echo $v;?>>January</option>

                                <?php $v = ($issues_data[0]->month == 'February')? 'selected':'';?>

                                <option value="February" <?php echo $v;?>>February</option>

                                <?php $v = ($issues_data[0]->month == 'March')? 'selected':'';?>

                                <option value="March" <?php echo $v;?>>March</option>

                                <?php $v = ($issues_data[0]->month == 'April')? 'selected':'';?>

                                <option value="April" <?php echo $v;?>>April</option>

                                <?php $v = ($issues_data[0]->month == 'May')? 'selected':'';?>

                                <option value="May" <?php echo $v;?>>May</option>

                                <?php $v = ($issues_data[0]->month == 'June')? 'selected':'';?>

                                <option value="June" <?php echo $v;?>>June</option>

                                <?php $v = ($issues_data[0]->month == 'July')? 'selected':'';?>

                                <option value="July" <?php echo $v;?>>July</option>

                                <?php $v = ($issues_data[0]->month == 'August')? 'selected':'';?>

                                <option value="August" <?php echo $v;?>>August</option>

                                <?php $v = ($issues_data[0]->month == 'September')? 'selected':'';?>

                                <option value="September" <?php echo $v;?>>September</option>

                                <?php $v = ($issues_data[0]->month == 'October')? 'selected':'';?>

                                <option value="October" <?php echo $v;?>>October</option>

                                <?php $v = ($issues_data[0]->month == 'November')? 'selected':'';?>

                                <option value="November" <?php echo $v;?>>November</option>

                                <?php $v = ($issues_data[0]->month == 'December')? 'selected':'';?>

                                <option value="December" <?php echo $v;?>>December</option>

                            </select>

                        </div>

                    </div>

                    <div class="form-group" style="margin-bottom: 0px;">

                        <div class="col-md-2"></div>

                        <div class="col-md-5">Magazine Language</div>

                        <div class="col-md-5">Magazine Frequency</div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-5">

                            <select name="magazine_magazine_language1" id="magazine_magazine_language1" style="height: 30px; font-size: 12pt; font-weight: bold;">

                                <?php $v = ($magazines_data[0]->magazine_language == 'English')? 'selected':'';?>

                                <option value="English" <?php echo $v;?>>English</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Spanish')? 'selected':'';?>

                                <option value="Spanish" <?php echo $v;?>>Spanish</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Russian')? 'selected':'';?>

                                <option value="Russian" <?php echo $v;?>>Russian</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Arabic')? 'selected':'';?>

                                <option value="Arabic" <?php echo $v;?>>Arabic</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'German')? 'selected':'';?>

                                <option value="German" <?php echo $v;?>>German</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'French')? 'selected':'';?>

                                <option value="French" <?php echo $v;?>>French</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Italian')? 'selected':'';?>

                                <option value="Italian" <?php echo $v;?>>Italian</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Portuguese')? 'selected':'';?>

                                <option value="Portuguese" <?php echo $v;?>>Portuguese</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Turkish')? 'selected':'';?>

                                <option value="Turkish" <?php echo $v;?>>Turkish</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Hindi')? 'selected':'';?>

                                <option value="Hindi" <?php echo $v;?>>Hindi</option>

                                <?php $v = ($magazines_data[0]->magazine_language == 'Bangla')? 'selected':'';?>

                                <option value="Bangla" <?php echo $v;?>>Bangla</option>

                            </select>

                        </div>

                        <div class="col-md-5">

                            <select name="magazine_magazine_frequency1" id="magazine_magazine_frequency1" style="height: 30px; font-size: 12pt; font-weight: bold;">

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Weekly')? 'selected':'';?>

                                <option value="Weekly" <?php echo $v;?>>Weekly</option>

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Fortnightly')? 'selected':'';?>

                                <option value="Fortnightly" <?php echo $v;?>>Fortnightly</option>

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Monthly')? 'selected':'';?>

                                <option value="Monthly" <?php echo $v;?>>Monthly</option>

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Bi-Monthly')? 'selected':'';?>

                                <option value="Bi-Monthly" <?php echo $v;?>>Bi-Monthly</option>

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Quarterly')? 'selected':'';?>

                                <option value="Quarterly" <?php echo $v;?>>Quarterly</option>

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Half-yearly')? 'selected':'';?>

                                <option value="Half-yearly" <?php echo $v;?>>Half-yearly</option>

                                <?php $v = ($magazines_data[0]->magazine_frequency == 'Yearly')? 'selected':'';?>

                                <option value="Yearly" <?php echo $v;?>>Yearly</option>

                            </select>

                        </div>

                    </div>

                    <div class="form-group" style="margin-bottom: 0px;">

                        <div class="col-md-2"></div>

                        <div class="col-md-10">ISSUE DESCRIPTION</div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-10">

                            <?php $v = ($issues_data[0]->id > 0)? $issues_data[0]->description:'';?>

                            <textarea rows="3" name="magazine_issue_description1" id="magazine_issue_description1" class="form-control"><?php echo $v; ?></textarea>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-2 control-label"><?php echo lang_key('gallery');?></label>

                        <div class="col-md-10">

                            <?php $gallery = ($magazines_data[0]->gallery!='')?json_decode($magazines_data[0]->gallery):array();?>

                            <ul class="multiple-uploads" id="magazine_multiple-uploads">

                                <div id="li_wrap_magazine">

                                    <?php foreach ($gallery as $item) { ?>

                                        <li class="gallery-img-list">

                                            <input type="hidden" name="magazine_gallery[]" value="<?php echo $item;?>" />

                                            <img src="<?php echo base_url('uploads/gallery/'.$item);?>" />

                                            <div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>

                                        </li>

                                    <?php }?>

                                </div>

                                <li class="add-image" id="magazine_dragandrophandler">+</li>

                            </ul>

                            <div class="clearfix"></div>

                            <div class="clearfix clear-top-margin"></div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-1">

                <a href="javascript:void(0);" onclick="add_magazine_form();"><img style="width: 48px;" src="<?php echo base_url('assets/images/plus-icon1.png');?>" /></a>

            </div>

        </div>

<!-- // End Magazines -->



<!-- -->

        <div class="row">

            <div class="col-md-12">

                <div class="form-group align-centre">

                    <button class="btn btn-color" type="submit"><?php echo lang_key('save');?></button>

                    <button class="btn btn-default" type="reset"><?php echo lang_key('reset');?></button>



                    <button class="btn btn-u-red" type="button" onclick="delete_current_magazine();" style="margin-left: 100px;"><?php echo lang_key('delete');?></button>

                </div>

            </div>

        </div>

        <input type="hidden" id="extra_video_urls" name="extra_video_urls">

    </form>



    <form action="<?php echo site_url('delete-app');?>" method="post" role="form" name="delete_app" id="delete_app" class="form-horizontal">

        <input type="hidden" name="id" value="<?php echo $post->id;?>">

        <input type="hidden" name="page" value="<?php echo ($page)?$page:0;?>">

        <input type="hidden" name="app_num1" id="app_num1" value="">

    </form>



    <form action="<?php echo site_url('delete-magazine');?>" method="post" role="form" name="delete_magazine" id="delete_magazine" class="form-horizontal">

        <input type="hidden" name="id" value="<?php echo $post->id;?>">

        <input type="hidden" name="page" value="<?php echo ($page)?$page:0;?>">

        <input type="hidden" name="magazine_num1" id="magazine_num1" value="">

    </form>



</div>



<!-- Modal -->

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myurlModal" style="display: none;" id="alert_url_button"></button>

<div class="modal fade" id="myurlModal" role="dialog">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><div id="insert_text_title"></div></h4>

            </div>

            <div class="modal-body" id="insert_text">



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>

<!-- // End Modal -->



<!-- Add App Modal -->

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myappModal" style="display: none;" id="alert_app_button"></button>

<div class="modal fade" id="myappModal" role="dialog">

    <div class="modal-dialog modal-sm" style="width: 1100px;height: 600px; overflow-y: scroll;">

        <div class="modal-content" style="width: 90%; margin: 0px auto;">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <form action="<?php echo site_url('update-app');?>" method="post" role="form" class="form-horizontal">

            <div class="row col-md-12" style="padding: 20px;">

                <div class="col-md-6">

                <?php

                    $CI = get_instance();

                    $CI->load->model('admin/system_model');

                    $langs = $CI->system_model->get_all_langs();

                ?>

                    <div class="tabbable">

                        <ul class="nav nav-tabs" id="myTab1">

                            <?php $flag=1; foreach ($langs as $lang=>$long_name){ ?>

                            <li class="<?php echo (default_lang()==$lang)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang;?>"><i class="fa fa-home"></i> <?php echo $lang;?></a></li>

                            <?php $flag++; }?>

                        </ul>

                        <div class="tab-content" id="myTabContent1">

                            <div>

                                <div class="form-group">

                                    <input type="hidden" name="id" value="<?php echo $post->id;?>">

                                    <input type="hidden" name="page" value="<?php echo ($page)?$page:0;?>">

                                    <label class="col-md-2 control-label"><?php echo lang_key('title');?></label>

                                    <div class="col-md-10">

                                        <input type="text" name="app_title0" id="app_title0" value="" class="form-control">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label"><?php echo lang_key('description');?></label>

                                    <div class="col-md-10">

                                        <textarea rows="15" name="app_description0" id="app_description0" class="form-control rich"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tabbable">

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/win8-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <input type="text" name="app_window0" id="app_window0" value="" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/mac-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <input type="text" name="app_mac0" id="app_mac0" value="" class="form-control">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/android-icon.png');?>" /></label>

                            <div class="col-md-10">

                                <input type="text" name="app_android0" id="app_android0" value="" class="form-control">

                            </div>

                        </div>

                    </div>

                </div>

                <!-- -->

                <div class="col-md-6">

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-6">

                            <div class="featured-img">

                                <input type="hidden" name="app_featured_img0" id="app_featured-img-input0" value="no-image.png">

                                <img id="app_featured-img0" src="<?php echo base_url('uploads/images/no-image.png');?>">

                                <div class="upload-button" id="app_upload_button0" identfy="0"><?php echo lang_key('upload');?></div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-2 control-label"><?php echo lang_key('gallery');?></label>

                        <div class="col-md-10">

                            <ul class="multiple-uploads" id="app_multiple-uploads0">

                                <li class="add-image" id="app_dragandrophandler0">+</li>

                            </ul>

                            <div class="clearfix"></div>

                            <div class="clearfix clear-top-margin"></div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-2 control-label"><?php echo lang_key('tags');?></label>

                        <div class="col-md-10">

                            <textarea rows="1" name="app_tags0" id="app_tags0" class="form-control"></textarea>

                            <span><?php echo lang_key('put_as_comma_seperated')?></span>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-2"></div>

                        <div class="col-md-10">

                            <div class="featured-img">

                                <input type="hidden" name="app_featured_img_qr0" id="app_featured-img-input_qr0" value="no-image.png">

                                <img id="app_featured-img_qr0" src="<?php echo base_url('uploads/images/no-image.png');?>">

                                <div class="upload-button" id="app_upload_button_qr0"><?php echo lang_key('upload');?></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <div class="row">

                    <div class="col-md-12">

                        <div class="form-group align-centre">

                            <button class="btn btn-color" type="submit"><?php echo "Submit"; ?></button>

                            <button class="btn btn-default" type="reset"><?php echo "Clean";?></button>

                        </div>

                    </div>

                </div>

            </form>

<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

            </div>

        </div>

    </div>

</div>

<!-- // End Add app modal -->



<!-- Add Magazine Modal -->

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mymagazineModal" style="display: none;" id="alert_magazine_button"></button>

<div class="modal fade" id="mymagazineModal" role="dialog">

    <div class="modal-dialog modal-sm" style="width: 1100px;height: 600px; overflow-y: scroll;">

        <div class="modal-content" style="width: 90%; margin: 0px auto;">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <form action="<?php echo site_url('update-magazine');?>" method="post" role="form" class="form-horizontal">

                <div class="row col-md-12" style="padding: 20px;">

                    <div class="col-md-6">

                        <?php

                        $CI = get_instance();

                        $CI->load->model('admin/system_model');

                        $langs = $CI->system_model->get_all_langs();

                        ?>

                        <div class="tabbable">

                            <ul class="nav nav-tabs" id="myTab1">

                                <?php $flag=1; foreach ($langs as $lang=>$long_name){ ?>

                                    <li class="<?php echo (default_lang()==$lang)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang;?>"><i class="fa fa-home"></i> <?php echo $lang;?></a></li>

                                    <?php $flag++; }?>

                            </ul>

                            <div class="tab-content" id="myTabContent1">

                                <div>

                                    <div class="form-group">

                                        <input type="hidden" name="id" value="<?php echo $post->id;?>">

                                        <input type="hidden" name="page" value="<?php echo ($page)?$page:0;?>">

                                        <label class="col-md-2 control-label"><?php echo lang_key('title');?></label>

                                        <div class="col-md-10">

                                            <input type="text" name="magazine_title0" id="magazine_title0" value="" class="form-control">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label"><?php echo lang_key('description');?></label>

                                        <div class="col-md-10">

                                            <textarea rows="15" name="magazine_description0" id="magazine_description0" class="form-control rich"></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="tabbable">

                            <div class="form-group">

                                <label class="col-md-4 control-label"><?php echo lang_key('tags');?></label>

                                <div class="col-md-8">

                                    <textarea rows="1" name="magazine_tags0" id="magazine_tags0" class="form-control"></textarea>

                                    <span><?php echo lang_key('put_as_comma_seperated')?></span>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4"></div>

                                <div class="col-md-8">

                                    <div class="featured-img" style="150px; height:200px;">

                                        <input type="hidden" name="magazine_featured_img_qr0" id="magazine_featured-img-input_qr0" value="no-image.png">

                                        <img id="magazine_featured-img_qr0"  src="<?php echo base_url('uploads/images/no-image.png');?>">

                                        <div class="upload-button" id="magazine_upload_button_qr0"><?php echo lang_key('upload');?></div>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/win8-icon.png');?>" /></label>

                                <div class="col-md-10">

                                    <input type="text" name="magazine_window0" id="magazine_window0" value="" class="form-control">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/mac-icon.png');?>" /></label>

                                <div class="col-md-10">

                                    <input type="text" name="magazine_mac0" id="magazine_mac0" value="" class="form-control">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-2 control-label" style="padding-top: 0px;"><img style="width: 32px;" src="<?php echo base_url('assets/images/android-icon.png');?>" /></label>

                                <div class="col-md-10">

                                    <input type="text" name="magazine_android0" id="magazine_android0" value="" class="form-control">

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- -->

                    <div class="col-md-6">

                        <div class="form-group">

                            <div class="col-md-2"></div>

                            <div class="col-md-6">

                                <div class="featured-img">

                                    <input type="hidden" name="magazine_featured_img0" id="magazine_featured-img-input0" value="no-image.png">

                                    <img id="magazine_featured-img0" src="<?php echo base_url('uploads/images/no-image.png');?>">

                                    <div class="upload-button" id="magazine_upload_button0" identfy="0"><?php echo lang_key('upload');?></div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">

							<div class="col-md-2"></div>

							<div class="col-md-2" style="text-align: center;"></div>

							<div class="col-md-8">Magazine Name</div>

						</div>

						<div class="form-group">

                            <div class="col-md-2"></div>

                            <label class="col-md-2 control-label" style="padding-top: 0px;"><!-- <img style="width: 64px;" src="<?php echo base_url('assets/images/plus-icon2.png');?>" /> --></label>

                            <div class="col-md-8">

                                <input type="text" name="magazine_magazine_name0" id="magazine_magazine_name0" value="" class="form-control" style="margin-top: 18px;">

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-md-2"></div>

                            <div class="col-md-10">

                                <input type="text" name="magazine_magazine_url0" id="magazine_magazine_url0" value="" class="form-control">

                            </div>

                        </div>

						<div class="form-group" style="margin-bottom: 0px;">

							<div class="col-md-2"></div>

							<div class="col-md-5">Year</div>

							<div class="col-md-5">Month</div>

						</div>

                        <div class="form-group">

                            <div class="col-md-2"></div>

                            <div class="col-md-5">

                                <select name="magazine_magazine_year0" id="magazine_magazine_year0" style="height: 30px; font-size: 12pt; font-weight: bold;">

                                    <?php $y=date("Y"); for($i=$y-5;$i<$y+10;$i++){ ?>

                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                    <?php } ?>

                                </select>

                            </div>

                            <div class="col-md-5">

                                <select name="magazine_magazine_month0" id="magazine_magazine_month0" style="height: 30px; font-size: 12pt; font-weight: bold;">

                                    <option value="January">January</option>

                                    <option value="February">February</option>

                                    <option value="March">March</option>

                                    <option value="April">April</option>

                                    <option value="May">May</option>

                                    <option value="June">June</option>

                                    <option value="July">July</option>

                                    <option value="August">August</option>

                                    <option value="September">September</option>

                                    <option value="October">October</option>

                                    <option value="November">November</option>

                                    <option value="December">December</option>

                                </select>

                            </div>

                        </div>

						<div class="form-group" style="margin-bottom: 0px;">

							<div class="col-md-2"></div>

							<div class="col-md-5">Magazine Language</div>

							<div class="col-md-5">Magazine Frequency</div>

						</div>

                        <div class="form-group">

                            <div class="col-md-2"></div>

                            <div class="col-md-5">

                                <select name="magazine_magazine_language0" id="magazine_magazine_language0" style="height: 30px; font-size: 12pt; font-weight: bold;">

                                    <option value="English">English</option>

                                    <option value="Spanish">Spanish</option>

                                    <option value="Russian">Russian</option>

                                    <option value="Arabic">Arabic</option>

                                    <option value="German">German</option>

                                    <option value="French">French</option>

                                    <option value="Italian">Italian</option>

                                    <option value="Portuguese">Portuguese</option>

                                    <option value="Turkish">Turkish</option>

                                    <option value="Hindi">Hindi</option>

                                    <option value="Bangla">Bangla</option>

                                </select>

                            </div>

                            <div class="col-md-5">

                                <select name="magazine_magazine_frequency0" id="magazine_magazine_frequency0" style="height: 30px; font-size: 12pt; font-weight: bold;">

                                    <option value="Weekly">Weekly</option>

                                    <option value="Fortnightly">Fortnightly</option>

                                    <option value="Monthly">Monthly</option>

                                    <option value="Bi-Monthly">Bi-Monthly</option>

                                    <option value="Quarterly">Quarterly</option>

                                    <option value="Half-yearly">Half-yearly</option>

                                    <option value="Yearly">Yearly</option>

                                </select>

                            </div>

                        </div>

						<div class="form-group" style="margin-bottom: 0px;">

							<div class="col-md-2"></div>

							<div class="col-md-10">ISSUE DESCRIPTION</div>

						</div>

                        <div class="form-group">

                            <div class="col-md-2"></div>

                            <div class="col-md-10">

                                <textarea rows="3" name="magazine_issue_description0" id="magazine_issue_description0" class="form-control"></textarea>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label"><?php echo lang_key('gallery');?></label>

                            <div class="col-md-10">

                                <ul class="multiple-uploads" id="magazine_multiple-uploads0">

                                    <li class="add-image" id="magazine_dragandrophandler0">+</li>

                                </ul>

                                <div class="clearfix"></div>

                                <div class="clearfix clear-top-margin"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group align-centre">

                                <button class="btn btn-color" type="submit"><?php echo "Submit"; ?></button>

                                <button class="btn btn-default" type="reset"><?php echo "Clean";?></button>

                            </div>

                        </div>

                    </div>

            </form>

            <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

        </div>

    </div>

</div>

</div>

<!-- // End Add Magazine modal -->

<!-- add issue modal -->

<div id="add_magazine_issue" style="display:none;">

    <div class="add_magazine_issue_content" style="width: 850px;">

        <div class="row" style="text-align: center;">

            <div class="col-md-6">

                <div class="form-group" style="height: 40px;">

                    <div class="col-md-8" style="padding: 0px; background-color: #d3d3d3"><label id="issue_modal_name"></label></div>

                </div>

                <div class="form-group" style="height: 40px; text-align: left;">

                    <div class="col-md-3" style="padding: 0px;">

                        <input type="hidden" id="current_issue_num" name="current_issue_num" value="">

                        <select name="issue_modal_issues" id="issue_model_issues" onchange="show_current_issue();" style="height: 30px; font-size: 12pt; font-weight: bold;">

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select name="issue_modal_year" id="issue_modal_year" style="height: 30px; font-size: 12pt; font-weight: bold;">

                            <?php $y=date("Y"); for($i=$y;$i<$y+10;$i++){ ?>

                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-3">

                        <select name="issue_modal_month" id="issue_modal_month" style="height: 30px; font-size: 12pt; font-weight: bold;">

                            <option value="January">January</option>

                            <option value="February">February</option>

                            <option value="March">March</option>

                            <option value="April">April</option>

                            <option value="May">May</option>

                            <option value="June">June</option>

                            <option value="July">July</option>

                            <option value="August">August</option>

                            <option value="September">September</option>

                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" style="padding: 0px;">
                        <textarea rows="7" name="issue_modal_description" id="issue_modal_description" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="featured-img">
                    <input type="hidden" name="magazine_featured_img_issue" id="magazine_featured-img-input_issue" onchange="test1();" value="">
                    <img id="magazine_featured-img_issue" src="">
                    <div class="upload-button" id="magazine_issue_upload_button" identfy="1" onclick="test();"><?php echo lang_key('upload');?></div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" style="padding: 0px; margin-top: 15px;">
                        <input type="text" name="issue_modal_url" id="issue_modal_url" value="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group align-centre" style="margin-top: 20px; margin-bottom: 0px;">
                    <button class="btn btn-color" type="button" onclick="update_issue();"><?php echo lang_key('submit');?></button>
                    <button class="btn btn-default" type="button" onclick="clear_form();"><?php echo lang_key('reset');?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end issue modal -->
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script src="<?php echo theme_url();?>/assets/js/markercluster.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map-icons.min.js"></script>
<script src="<?php echo theme_url();?>/assets/js/map_config.js"></script>
<script src="<?php echo theme_url();?>/assets/js/jquery.form.js"></script>
<?php require'multiple-uploader.php';?>
<?php require'bulk_uploader_view.php';?>
<script type="text/javascript">

jQuery(document).ready(function(){

// *************************************************************************************************** //

// -- gallery (basic) -- //

    jQuery('#multiple-uploads > #dragandrophandler').click(function(){

        jQuery('#photoimg').attr('target','#multiple-uploads');

        jQuery('#photoimg').attr('input','gallery');

        jQuery('#photoimg').click();

    });

// ============================= //



// -- gallery (app) -- //

    jQuery('#app_multiple-uploads > #app_dragandrophandler').click(function(){

        jQuery('#app_photoimg').attr('target','#app_multiple-uploads');

        jQuery('#app_photoimg').attr('input','app_gallery');

        jQuery('#app_photoimg').click();

    });

// ============================= //



// -- gallery (app_new) -- //

    jQuery('#app_multiple-uploads0 > #app_dragandrophandler0').click(function(){

        jQuery('#app_photoimg0').attr('target','#app_multiple-uploads0');

        jQuery('#app_photoimg0').attr('input','app_gallery0');

        jQuery('#app_photoimg0').click();

    });

// ============================= //



// -- gallery (magazine) -- //

    jQuery('#magazine_multiple-uploads > #magazine_dragandrophandler').click(function(){

        jQuery('#magazine_photoimg').attr('target','#magazine_multiple-uploads');

        jQuery('#magazine_photoimg').attr('input','magazine_gallery');

        jQuery('#magazine_photoimg').click();

    });

// ============================= //



// -- gallery (magazine_new) -- //

    jQuery('#magazine_multiple-uploads0 > #magazine_dragandrophandler0').click(function(){

        jQuery('#magazine_photoimg0').attr('target','#magazine_multiple-uploads0');

        jQuery('#magazine_photoimg0').attr('input','magazine_gallery0');

        jQuery('#magazine_photoimg0').click();

    });

// ============================= //

// **************************************************************************************************** //

});

</script>
<script type="text/javascript">

jQuery(document).ready(function(){



    for(var i=1; i<=7; i++)

    {

        var startTimeTextBox = $('#start-time-' + i);

        var endTimeTextBox = $('#end-time-' + i);



        $.timepicker.timeRange(

            startTimeTextBox,

            endTimeTextBox,

            {

                minInterval: (1000*60*60), // 1hr

                timeFormat: 'HH:mm TT',

                start: {}, // start picker options

                end: {} // end picker options

            }

        );

    }





    jQuery('.close-days').click(function(){

        var val = jQuery(this).attr('checked');

        if(val=='checked')

        {

            jQuery(this).parent().parent().parent().find('input[type=text]').val('<?php echo lang_key("closed"); ?>');

            jQuery(this).parent().parent().parent().find('input[type=text]').attr('readonly','readonly');

        }

        else

        {

            jQuery(this).parent().parent().parent().find('input[type=text]').val('09:00 AM');

            jQuery(this).parent().parent().parent().find('input[type=text]').removeAttr("readonly");

        }

    });



    jQuery('.close-days').each(function(){

        var val = jQuery(this).attr('checked');

        if(val=='checked')

        {

            jQuery(this).parent().parent().parent().find('input[type=text]').val('<?php echo lang_key("closed"); ?>');

            jQuery(this).parent().parent().parent().find('input[type=text]').attr('readonly','readonly');

        }

        else

        {

            jQuery(this).parent().parent().parent().find('input[type=text]').val('09:00 AM');

            jQuery(this).parent().parent().parent().find('input[type=text]').removeAttr("readonly");

        }

    });





    var max_fields      = 10; //maximum input boxes allowed

    var wrapper         = $(".input_fields_wrap"); //Fields wrapper

    var add_button      = $(".add_field_button"); //Add button ID



    var x = 1; //initlal text box count

    $(add_button).click(function(e){ //on add input button click

        e.preventDefault();

        if(x < max_fields){ //max input box allowed

            x++; //text box increment

            $('.input_fields_wrap').append('<div><input placeholder="<?php echo lang_key('additional_features');?>" type="text" class="form-control" name="additional_features[]" style="margin-bottom:5px;"><a href="#" class="remove_field">X</a></div>'); //add input box

        }

    });



    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

        e.preventDefault(); $(this).parent('div').remove(); x--;

    })

});

</script>
<script type="text/javascript">

    function add_app_form(){

        $('#alert_app_button').click();

    }



    function add_magazine_form(){

        $('#alert_magazine_button').click();

    }



    function getUrlVars(url) {

        var vars = {};

        var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {

            vars[key] = value;

        });

        return vars;

    }



    function showVideoPreview(url)

    {

        if(url.search("youtube.com")!=-1)

        {

            var video_id = getUrlVars(url)["v"];

            //https://www.youtube.com/watch?v=jIL0ze6_GIY

            var src = '//www.youtube.com/embed/'+video_id;

            //var src  = url.replace("watch?v=","embed/");

            var code = '<iframe class="thumbnail" width="100%" height="200" src="'+src+'" frameborder="0" allowfullscreen></iframe>';

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

            var code = '<iframe class="thumbnail" src="//player.vimeo.com/video/'+video_id+'" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

            jQuery('#video_preview').html(code);

        }

        else

        {

            //alert("only youtube and video url is valid");

        }

    }



    jQuery(document).ready(function(){



    var city_field_type =  '<?php echo get_settings("business_settings", "city_dropdown", "autocomplete"); ?>' ;



    jQuery('#video_url').change(function(){

        var url = jQuery(this).val();

        showVideoPreview(url);

    }).change();



    jQuery('#contact_for_price').click(function(){

        show_hide_price();

    });

    show_hide_price();



// ***************************************************************************** //

// -- featured img (basic)  -- //

    jQuery('#upload-button').click(function(){

        jQuery('#photoimg_featured').click();

    });

// =============================== //



// -- featured img (app) -- //

    jQuery('#app_upload_button').click(function(){

        jQuery('#app_photoimg_featured').click();

    });

// =============================== //



// -- qr img (app_qr) -- //

    jQuery('#app_upload_button_qr').click(function(){

        jQuery('#app_photoimg_featured_qr').click();

    });

// ================================= //



// -- featured img (app_new) -- //

    jQuery('#app_upload_button0').click(function(){

        jQuery('#app_photoimg_featured0').click();

    });

// =====================================//



// -- featured img (app_new_qr) -- //

    jQuery('#app_upload_button_qr0').click(function(){

        jQuery('#app_photoimg_featured_qr0').click();

    });

// ===================================== //



// -- featured img (magazine) -- //

        jQuery('#magazine_upload_button').click(function(){

            jQuery('#magazine_photoimg_featured').click();

        });

// =============================== //



// -- featured img (magazine_issue) -- //

        jQuery('#magazine_issue_upload_button').click(function(){

//            jQuery('#magazine_issue_photoimg_featured').click();

        });

// =============================== //



// -- qr img (magazine_qr) -- //

        jQuery('#magazine_upload_button_qr').click(function(){

            jQuery('#magazine_photoimg_featured_qr').click();

        });

// ================================= //



// -- featured img (magazine_new) -- //

        jQuery('#magazine_upload_button0').click(function(){

            jQuery('#magazine_photoimg_featured0').click();

        });

// =====================================//



// -- featured img (magazine_new_qr) -- //

        jQuery('#magazine_upload_button_qr0').click(function(){

            jQuery('#magazine_photoimg_featured_qr0').click();

        });

// ===================================== //

// ************************************************************************ //



// -- logo img (basic) -- //

    jQuery('#logo-upload-button').click(function(){

        jQuery('#photoimg_logo').click();

    });

// ======================================= //



// ************************************************************************ //



// -- input change (basic) -- //

    jQuery('#featured-img-input').change(function(){

        var val = jQuery(this).val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/thumbs/'+val;

        jQuery( '#featured-img' ).attr('src',image_url);



    }).change();

// =================================== //



// -- input change (app) -- //

    jQuery('#app_featured-img-input1').change(function(){

        var val = jQuery(this).val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/thumbs/'+val;

        jQuery( '#app_featured-img1' ).attr('src',image_url);



    }).change();

// ========================================= //

// -- input change (app_qr) -- //

    jQuery('#app_featured-img-input_qr1').change(function(){

        var val = jQuery(this).val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/thumbs/'+val;

        jQuery( '#app_featured-img_qr1' ).attr('src',image_url);



    }).change();

// ======================================== //



// -- input change (app_new) -- //

    jQuery('#app_featured-img-input0').change(function(){

        var val = jQuery(this).val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/thumbs/'+val;

        jQuery( '#app_featured-img0' ).attr('src',image_url);



    }).change();

// ========================================= //



// -- input change (app_new_qr) -- //

    jQuery('#app_featured-img-input_qr0').change(function(){

        var val = jQuery(this).val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/thumbs/'+val;

        jQuery( '#app_featured-img_qr0' ).attr('src',image_url);



    }).change();

// =============================================== //



// -- input change (magazine) -- //

        jQuery('#magazine_featured-img-input1').change(function(){

            var val = jQuery(this).val();

            if(val=='')

            {

                val = 'no-image.png';

            }



            var base_url  = '<?php echo base_url();?>';

            var image_url = base_url+'uploads/thumbs/'+val;

            jQuery( '#magazine_featured-img1' ).attr('src',image_url);



        }).change();

// ========================================= //



// -- input change (magazine_issue) -- //

        jQuery('#magazine_featured-img-input_issue').change(function(){

/*            var val = jQuery(this).val();

            if(val=='')

            {

                val = 'no-image.png';

            }



            var base_url  = '<?php echo base_url();?>';

            var image_url = base_url+'uploads/thumbs/'+val;

            jQuery( '#magazine_featured-img_issue' ).attr('src',image_url);

*/

        }).change();

// ========================================= //

// -- input change (magazine_qr) -- //

        jQuery('#magazine_featured-img-input_qr1').change(function(){

            var val = jQuery(this).val();

            if(val=='')

            {

                val = 'no-image.png';

            }



            var base_url  = '<?php echo base_url();?>';

            var image_url = base_url+'uploads/thumbs/'+val;

            jQuery( '#magazine_featured-img_qr1' ).attr('src',image_url);



        }).change();

// ======================================== //



// -- input change (magazine_new) -- //

        jQuery('#magazine_featured-img-input0').change(function(){

            var val = jQuery(this).val();

            if(val=='')

            {

                val = 'no-image.png';

            }



            var base_url  = '<?php echo base_url();?>';

            var image_url = base_url+'uploads/thumbs/'+val;

            jQuery( '#magazine_featured-img0' ).attr('src',image_url);



        }).change();

// ========================================= //



// -- input change (magazine_new_qr) -- //

        jQuery('#magazine_featured-img-input_qr0').change(function(){

            var val = jQuery(this).val();

            if(val=='')

            {

                val = 'no-image.png';

            }



            var base_url  = '<?php echo base_url();?>';

            var image_url = base_url+'uploads/thumbs/'+val;

            jQuery( '#magazine_featured-img_qr0' ).attr('src',image_url);



        }).change();

// =============================================== //

// ************************************************************************ //



// -- input change (basic_logo) -- //

    jQuery('#business-logo-input').change(function(){

        var val = jQuery(this).val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/logos/'+val;

        jQuery( '#business-logo' ).attr('src',image_url);



    }).change();

// ============================================== //

    var site_url = '<?php echo site_url();?>';

    var val = jQuery('#country').val();

    var loadUrl = site_url+'/show/get_locations_by_parent_ajax/'+val;

    jQuery.post(

        loadUrl,

        {},

        function(responseText){

            jQuery('#state').html(responseText);

            var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):$post->country;?>';

            var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';

            if(val==sel_country)

                jQuery('#state').val(sel_state);

            else

                jQuery('#state').val('');

            jQuery('#state').focus();

            jQuery('#state').trigger('change');

        }

    );

    jQuery('#country').change(function(){

        jQuery('#city').val('');

        var val = jQuery(this).val();

        var loadUrl = site_url+'/show/get_locations_by_parent_ajax/'+val;

        jQuery.post(

            loadUrl,

            {},

            function(responseText){

                <?php if($state_active=='yes'){?>

                jQuery('#state').html(responseText);

                var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):$post->country;?>';

                var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';

                if(val==sel_country)

                jQuery('#state').val(sel_state);

                else

                jQuery('#state').val('');

                jQuery('#state').focus();

                jQuery('#state').trigger('change');

                <?php }else{?>

                var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):$post->country;?>';

                var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):$post->city;?>';

                var city   = '<?php echo (set_value("city")!='')?set_value("city"):get_location_name_by_id($post->city);?>';

                if(city_field_type=='dropdown')

                populate_city(val);

                if(val==sel_country)

                {

                    jQuery('#selected_city').val(sel_city);

                    jQuery('#city').val(city);

                }

                else

                {

                    jQuery('#selected_city').val('');

                    jQuery('#city').val('');            

                }

                <?php }?>

            }

        );

     });



    jQuery('#state').change(function(){

        <?php if($state_active=='yes'){?>

        var val = jQuery(this).val();

        var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';

        var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):$post->city;?>';

        var city   = '<?php echo (set_value("city")!='')?set_value("city"):get_location_name_by_id($post->city);?>';

        

        if(city_field_type=='dropdown')

        populate_city(val); //populate the city drop down



        if(val==sel_state)

        {

            jQuery('#selected_city').val(sel_city);

            jQuery('#city').val(city);

        }

        else

        {

            jQuery('#selected_city').val('');

            jQuery('#city').val('');            

        }

        <?php }?>

    });



    <?php if($state_active == 'yes'){ ?>

        if(city_field_type=='dropdown'){

            

            var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):$post->state;?>';

            populate_city(sel_state);

        }

    var parent = '#state';

    <?php } else { ?>

        if(city_field_type=='dropdown'){

            

            var sel_country = jQuery('#country').val();

            populate_city(sel_country);

        }

    var parent = '#country';

    <?php } ?>



    if(city_field_type=='autocomplete') {

        jQuery( "#city" ).bind( "keydown", function( event ) {

            if ( event.keyCode === jQuery.ui.keyCode.TAB &&

                jQuery( this ).data( "ui-autocomplete" ).menu.active ) {

                event.preventDefault();

            }

        })

            .autocomplete({

                source: function( request, response ) {



                    jQuery.post(

                        "<?php echo site_url('show/get_cities_ajax');?>/",

                        {term: request.term,parent: jQuery(parent).val()},

                        function(responseText){

                            response(responseText);

                            jQuery('#selected_city').val('');

                            jQuery('.city-loading').html('');

                        },

                        "json"

                    );

                },

                search: function() {

                    // custom minLength

                    var term = this.value ;

                    if ( term.length < 2 || jQuery(parent).val()=='') {

                        return false;

                    }

                    else

                    {

                        jQuery('.city-loading').html('Loading...');

                    }

                },

                focus: function() {

                    // prevent value inserted on focus

                    return false;

                },

                select: function( event, ui ) {

                    this.value = ui.item.value;

                    jQuery('#selected_city').val(ui.item.id);

                    jQuery('.city-loading').html('');

                    return false;

                }

            });

    }

    else if(city_field_type=='dropdown') {

        jQuery('#city_dropdown').change(function (){

            var val = jQuery('option:selected', this).attr('city_id');

            jQuery('#selected_city').val(val);

        });

    }



});

function show_hide_price()

{

    var val = jQuery('#contact_for_price').attr('checked');

    if(val=='checked')

    {

        jQuery('.price-input-holder').hide();

    }

    else

    {

        jQuery('.price-input-holder').show();        

    }

}



function populate_city(parent) {

    //alert(parent);

    var site_url = '<?php echo site_url();?>';

    var loadUrl = site_url+'/show/get_city_dropdown_by_parent_ajax/'+parent;

        jQuery.post(

            loadUrl,

            {},

            function(responseText){

                jQuery('#city_dropdown').html(responseText);

                var sel_city   = '<?php echo get_location_name_by_id($selected_city);?>';

                //alert(sel_city);

                jQuery('#city_dropdown').val(sel_city);

            }

        );

}



</script>
<script type="text/javascript">

    var markers = [];

    //    var map;

    var Ireland = "Dhaka, Bangladesh";

    function initialize() {

        

        geocoder = new google.maps.Geocoder();

        var mapOptions = {

            center: new google.maps.LatLng(-34.397, 150.644),

            zoom: 13,

            mapTypeId: google.maps.MapTypeId.ROADMAP,

            styles: MAP_STYLE

        };

        map = new google.maps.Map(document.getElementById("form-map"),

            mapOptions);

//        codeAddress();//call the function

        var ex_latitude = $('#latitude').val();

        var ex_longitude = $('#longitude').val();



        if (ex_latitude != '' && ex_longitude != ''){

            map.setCenter(new google.maps.LatLng(ex_latitude, ex_longitude));//center the map over the result

            var marker = new google.maps.Marker(

                {

                    map: map,

                    draggable:true,

                    animation: google.maps.Animation.DROP,

                    position: new google.maps.LatLng(ex_latitude, ex_longitude)

                });



            markers.push(marker);

            google.maps.event.addListener(marker, 'dragend', function()

            {

                var marker_positions = marker.getPosition();

                $('#latitude').val(marker_positions.lat());

                $('#longitude').val(marker_positions.lng());

//                        console.log(marker.getPosition());

            });



        }



    }



    function codeAddress()

    {

        var main_address = $('#address').val();

        var country = $('#country').find(':selected').data('name');

        var state = $('#state').find(':selected').data('name');

        var city = $('#city').val();



        <?php if($state_active == 'yes'){ ?>



        var address = [main_address, city, state, country].join();

        <?php } else { ?>



        var address = [main_address, city, country].join();

        <?php } ?>

//        console.log(address);

        if(country != '' && city != '')

        {





            setAllMap(null); //Clears the existing marker



            geocoder.geocode( {address:address}, function(results, status)

            {

                if (status == google.maps.GeocoderStatus.OK)

                {

//                    console.log(results[0].geometry.location.lat());

                    $('#latitude').val(results[0].geometry.location.lat());

                    $('#longitude').val(results[0].geometry.location.lng());

                    map.setCenter(results[0].geometry.location);//center the map over the result





                    //place a marker at the location

                    var marker = new google.maps.Marker(

                        {

                            map: map,

                            draggable:true,

                            animation: google.maps.Animation.DROP,

                            position: results[0].geometry.location

                        });



                    markers.push(marker);





                    google.maps.event.addListener(marker, 'dragend', function()

                    {

                        var marker_positions = marker.getPosition();

                        $('#latitude').val(marker_positions.lat());

                        $('#longitude').val(marker_positions.lng());

//                        console.log(marker.getPosition());

                    });

                } else {

                    alert('Geocode was not successful for the following reason: ' + status);

                }

            });



        }

        else{

            alert('You must enter at least country and city');

        }



    }



    function setAllMap(map) {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(map);

        }

    }



    google.maps.event.addDomListener(window, 'load', initialize);



//

    // Animated popup

    $('.animated_popup').popup({

        show				: function($popup, $back){



            var plugin = this,

                center = plugin.getCenter();



            $popup

                .css({

                    top     : - $popup.children().outerHeight(),

                    left    : center.left,

                    opacity	: 1

                })

                .animate({top : center.top}, 500, 'easeOutBack', function(){

                    // Call the open callback

                    plugin.o.afterOpen.call(plugin);

                });



        }

    });

//

    function select_default_url(id){

        var input_text = $('#extra_video_url_input_'+id).val();

        if(input_text == ""){

            //alert("empty");

            var txt_title = "<p>Warning</p>";

            var txt = "<p>Video url is empty.  Please insert url.</p>";

            $('#insert_text').empty();

            $('#insert_text').append(txt);

            $('#insert_text_title').empty();

            $('#insert_text_title').append(txt_title);

            $('#alert_url_button').click();

            return false;

        }

        $('#video_url').val(input_text);

        var text_url = $('#extra_video_url_input_1').val();

        for(var i=2;i<11;i++){

            text_url += '+' + $('#extra_video_url_input_'+i).val()

        }

        $('#extra_video_urls').val(text_url);

        $('.popup_close').click();



    }



    function show_current_app(){

        var app_num = $('#app_list').val();



        $.ajax({

            url: '<?php echo site_url("user/customajax");?>',

            type: "POST",

            dataType: "json",

            data: {

                app_id: app_num

            },

            success: function (data) {

                if (data.result == "success") {

                    var data_result = data.content;

                    $('#app_num').val(data_result['id']);

                    $('#app_num1').val(data_result['id']);

                    $('#app_title1').val(data_result['title']);



                    $('#textarea_div_app').empty();

                    var add_html = "<textarea rows='15' name='app_description1' id='app_description1' class='form-control rich'>"+ data_result['description'] +"</textarea>";

                    $('#textarea_div_app').append(add_html);

                    tinymce.init({

                        convert_urls : 0,

                        selector: ".rich",

                        menubar: false,

                        toolbar: "styleselect | bold | link | bullist | numlist | code",

                        plugins: [



                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",



                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",



                            "save code table contextmenu directionality emoticons template paste textcolor"



                        ]



                    });

                    //$('#app_description1').empty();

                    //$('#app_description1').append(data_result['description']);



                    $('#app_window1').val(data_result['window']);

                    $('#app_mac1').val(data_result['mac']);

                    $('#app_android1').val(data_result['android']);

                    var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + data_result['featured_img'];

                    $('#app_featured-img1').attr('src', new_src);



                    var gallery = data_result['gallery'];

                    var galleryArr = new Array();

                    galleryArr =  gallery.split('"');

                    var len = galleryArr.length;

                    var realsize = (len - 1) / 2;

                    var add_li = "";

                    for(var i=0;i<realsize;i++){



                        add_li += '<li class="gallery-img-list">' +

                                    '<input type="hidden" name="app_gallery[]" value="' + galleryArr[i*2+1] + '" />' +

                                    '<img src="' + '<?php echo base_url('uploads/gallery/'); ?>' + '/' + galleryArr[i*2+1] + '" />' +

                                    '<div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>' +

                                  '</li>';

                    }

                    $('#li_wrap_app').empty();

                    $('#li_wrap_app').append(add_li);



                    $('#app_tags1').empty();

                    $('#app_tags1').append(data_result['tags']);

                    var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + data_result['qr'];

                    $('#app_featured-img_qr1').attr('src', new_src);



                }

            }

        });

    }



    function show_current_magazine(){

        var magazine_num = $('#magazine_list').val();



        $.ajax({

            url: '<?php echo site_url("user/customajaxmagazine");?>',

            type: "POST",

            dataType: "json",

            data: {

                magazine_id: magazine_num

            },

            success: function (data) {

                if (data.result == "success") {

                    var data_result = data.content;

                    var data_result_issue = data.content_issue;

                    $('#magazine_num').val(data_result['id']);

                    $('#magazine_num1').val(data_result['id']);



                    $('#issue_num').val(data_result_issue['id']);



                    $('#magazine_title1').val(data_result['title']);



                    $('#textarea_div_magazine').empty();

                    var add_html = "<textarea rows='15' name='magazine_description1' id='magazine_description1' class='form-control rich'>"+ data_result['description'] +"</textarea>";

                    $('#textarea_div_magazine').append(add_html);

                    tinymce.init({

                        convert_urls : 0,

                        selector: ".rich",

                        menubar: false,

                        toolbar: "styleselect | bold | link | bullist | numlist | code",

                        plugins: [



                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",



                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",



                            "save code table contextmenu directionality emoticons template paste textcolor"



                        ]



                    });

                    //$('#app_description1').empty();

                    //$('#app_description1').append(data_result['description']);



                    $('#magazine_window1').val(data_result['window']);

                    $('#magazine_mac1').val(data_result['mac']);

                    $('#magazine_android1').val(data_result['android']);

                    $('#magazine_featured-img-input1').val(data_result_issue['featured_img']);

                    var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + data_result_issue['featured_img'];

                    $('#magazine_featured-img1').attr('src', new_src);



                    var gallery = data_result['gallery'];

                    var galleryArr = new Array();

                    galleryArr =  gallery.split('"');

                    var len = galleryArr.length;

                    var realsize = (len - 1) / 2;

                    var add_li = "";

                    for(var i=0;i<realsize;i++){



                        add_li += '<li class="gallery-img-list">' +

                        '<input type="hidden" name="magazine_gallery[]" value="' + galleryArr[i*2+1] + '" />' +

                        '<img src="' + '<?php echo base_url('uploads/gallery/'); ?>' + '/' + galleryArr[i*2+1] + '" />' +

                        '<div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>' +

                        '</li>';

                    }

                    $('#li_wrap_magazine').empty();

                    $('#li_wrap_magazine').append(add_li);



                    $('#magazine_tags1').empty();

                    $('#magazine_tags1').append(data_result['tags']);

                    $('#magazine_featured-img-input_qr1').val(data_result['qr']);

                    var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + data_result['qr'];

                    $('#magazine_featured-img_qr1').attr('src', new_src);

                    $('#magazine_magazine_name1').val(data_result_issue['name']);

                    $('#magazine_magazine_url1').val(data_result_issue['url']);

                    $('#magazine_magazine_year1').val(data_result_issue['year']);

                    $('#magazine_magazine_month1').val(data_result_issue['month']);

                    $('#magazine_magazine_language1').val(data_result['magazine_language']);

                    $('#magazine_magazine_frequency1').val(data_result['magazine_frequency']);

                    $('#magazine_issue_description1').val(data_result_issue['description']);



                }

            }

        });

    }



    function delete_current_app(){

        $('#delete_app').submit();

    }



    function delete_current_magazine(){

        $('#delete_magazine').submit();

    }



    function show_issue_modal(){

        var issue_id = $('#issue_num').val();

        var issue_name = $('#magazine_magazine_name1').val();

        var issue_year = $('#magazine_magazine_year1').val();

        var issue_month = $('#magazine_magazine_month1').val();

        var issue_description = $('#magazine_issue_description1').val();

        var issue_featured_img = $('#magazine_featured-img-input1').val();

        var issue_url = $('#magazine_magazine_url1').val();



        $('#current_issue_num').val(issue_id);



        $('#issue_modal_name').empty(issue_name);

        $('#issue_modal_name').append(issue_name);

        $('#issue_modal_year').val(issue_year);

        $('#issue_modal_month').val(issue_month);

        $('#issue_modal_description').val(issue_description);

        $('#magazine_featured-img-input_issue').val(issue_featured_img);

        var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + issue_featured_img;

        $('#magazine_featured-img_issue').attr('src', new_src);

        $('#issue_modal_url').val(issue_url);



        var magazine_num = $('#magazine_list').val();

        $.ajax({

            url: '<?php echo site_url("user/customajaxmagazine_issue");?>',

            type: "POST",

            dataType: "json",

            data: {

                magazine_id: magazine_num

            },

            success: function (data) {

                if (data.result == "success") {

                    var data_result = data.content;

                    var data_rows = data.num_rows;

                    var add_option = "<option value='0'> New </option>";

                    for(var i=0;i<data_rows;i++){

                        if(data_result[i]['id'] ==  issue_id) var txt = 'selected';

                        else var txt = '';

                        add_option += "<option value='" + data_result[i]['id'] + "' " + txt + "> issue " + (i+1)  + " </option>";

                    }

                    $('#issue_model_issues').empty();

                    $('#issue_model_issues').append(add_option);



                    $('#show_add_issue_modal').click();

                }

            }

        });

    }



    function show_current_issue(){

        var issue_id = $('#issue_model_issues').val();

        if(issue_id == 0){

            $('#current_issue_num').val(issue_id);

            clear_form();

        }

        else{

            $.ajax({

                url: '<?php echo site_url("user/customajaxmagazine_current_issue");?>',

                type: "POST",

                dataType: "json",

                data: {

                    issue_id: issue_id

                },

                success: function (data) {

                    if (data.result == "success") {

                        var data_result = data.content;



                        $('#current_issue_num').val(issue_id);



                        $('#issue_modal_year').val(data_result[0]['year']);

                        $('#issue_modal_month').val(data_result[0]['month']);

                        $('#issue_modal_description').val(data_result[0]['description']);

                        $('#magazine_featured-img-input_issue').val(data_result[0]['featured_img']);

                        var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + data_result[0]['featured_img'];

                        $('#magazine_featured-img_issue').attr('src', new_src);

                        $('#issue_modal_url').val(data_result[0]['url']);

                    }

                }

            });

        }



    }



    function clear_form(){

        $('#issue_modal_year').val('2015');

        $('#issue_modal_month').val('January');

        $('#issue_modal_description').val('');

        $('#magazine_featured-img-input_issue').val('no-image.png');

        var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/no-image.png";

        $('#magazine_featured-img_issue').attr('src', new_src);

        $('#issue_modal_url').val('');



    }



    function update_issue(){



        var issue_id = $('#current_issue_num').val();

        var issue_year = $('#issue_modal_year').val();

        var issue_month = $('#issue_modal_month').val();

        var issue_description = $('#issue_modal_description').val();

        var issue_featured_img = $('#magazine_featured-img-input_issue').val();

        var issue_url = $('#issue_modal_url').val();



        var issue_name = $('#magazine_magazine_name1').val();

        var post_id = $('#id').val();

        var magazine_id = $('#magazine_num').val();



//        $('#issue_num').val(issue_id);

        $('#magazine_magazine_year1').val(issue_year);

        $('#magazine_magazine_month1').val(issue_month);

        $('#magazine_issue_description1').val(issue_description);

        $('#magazine_featured-img-input1').val(issue_featured_img);

        $('#magazine_magazine_url1').val(issue_url);

        var new_src = '<?php echo base_url('uploads/thumbs/');?>' + "/" + issue_featured_img;

        $('#magazine_featured-img1').attr('src', new_src);



            $.ajax({

                url: '<?php echo site_url("user/customajaxmagazine_update_issue");?>',

                type: "POST",

                dataType: "json",

                data: {

                    name: issue_name,

                    year: issue_year,

                    month: issue_month,

                    description: issue_description,

                    featured_img: issue_featured_img,

                    url: issue_url,

                    post_id: post_id,

                    magazine_id: magazine_id,

                    issue_id: issue_id

                },

                success: function (data) {

                    if (data.result == "success") {

                        $('#issue_num').val(data.issue_id);

                        $('.popup_close').click();

                    }

                }

            });



    }



function test(){

    jQuery('#magazine_issue_photoimg_featured').click();

}



    function test1(){

        var val = jQuery('#magazine_featured-img-input_issue').val();

        if(val=='')

        {

            val = 'no-image.png';

        }



        var base_url  = '<?php echo base_url();?>';

        var image_url = base_url+'uploads/thumbs/'+val;

        jQuery( '#magazine_featured-img_issue' ).attr('src',image_url);



    }



    //$('.extra_video_url_radio').click(function(){

    //});



</script>



