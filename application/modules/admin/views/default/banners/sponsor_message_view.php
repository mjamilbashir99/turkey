<div class="row">	
<div class="col-md-12">
<?php echo $this->session->flashdata('msg');?>
<div class="box">
<div class="box-title">
<h3><i class="fa fa-bars"></i> <?php echo lang_key('Sponsor Message');?></h3>
<div class="box-tool">
<a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
</div>
</div>
<div class="box-content">	
<form class="form-horizontal" id="addcounty" action="<?php echo site_url('admin/banners/addsponsor_message');?>" method="post">
            <!--///////////// sponsor add//////////////////-->
            <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Advertiser');?></label>
            <div class="col-sm-4 col-md-4 controls">
            <input type="text" name="advertiser" value="<?php echo(set_value('advertiser')!='')?set_value('advertiser'):'';?>" class="form-control input-sm" >
            <?php echo form_error('advertiser'); ?>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Sponsor Add');?></label>
            <div class="col-sm-4 col-md-4 controls">
            <input type="text" name="sponsor_add" value="<?php echo(set_value('sponsor_add')!='')?set_value('sponsor_add'):'';?>" class="form-control input-sm" >
            <?php echo form_error('sponsor_add'); ?>
            </div>
            <div class="col-sm-4 col-md-4 controls">
            <input type="checkbox" name="show_sponsor_add" value="1" checked class="form-control input-sm">
            </div>
            </div>
            <div class="form-group">            
            <label class="col-md-3 control-label"><?php echo lang_key('city');?></label>
            <div class="col-md-4">
            <select name="state" id="state" class="form-control">
            <option value="all" selected="selected"><?php echo lang_key('all');?></option>
            <?php foreach (get_all_locations_by_type('state')->result() as $row) {
            $sel = ($row->id==set_value('city'))?'selected="selected"':'';
            ?>
            <option data-name="<?php echo $row->name;?>" id="state" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
            <?php }?>
            </select>
            <?php echo form_error('state');?>
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label"><?php echo lang_key('county');?></label>
            <div class="col-md-4">
            <select name="county" id="county" class="form-control">
            <option  name="county" value="all" selected="selected"><?php echo lang_key('all');?></option>
            <?php foreach (get_all_locations_by_type('city')->result() as $row) {
            $sel = ($row->id==set_value('county'))?'selected="selected"':'';
            ?>
            <option data-name="<?php echo $row->name;?>" id="county" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
            <?php }?>                                        
            </select>
            <?php echo form_error('city');?>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('select_category');?></label>
            <div class="col-sm-4 col-md-4 controls">
            <?php
            $CI = get_instance();
            $CI->load->model('user/post_model');
            $categories = $CI->post_model->get_all_categories();
            ?>
            <?php //var_dump($categories) ?>
            <select id="input-14" name="category" class="form-control chosen-select">
            <option value="all" selected="selected"><?php echo lang_key('all');?></option>
            <?php foreach ($categories as $row) {
            $sel = (set_value('category')==$row->id)?'selected="selected"':'';
            ?>
            <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->title);?></option>
            <?php
            }?>
            </select>
            </div>
            </div>
<div style="clear:both"></div>
<div class="clearfix"></div>
<div class="form-group">
<label class="col-sm-3 col-md-3 control-label">&nbsp;</label>
<div class="col-sm-4 col-md-4 controls">
<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> <?php echo lang_key('save');?></button>
</div>
</div>
<div style="margin-bottom:20px;"></div>
<div class="clearfix"></div>
</div>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js');?>"></script>
<script>
jQuery(document).ready(function(){

jQuery("#state").change(function(){
currentstate=jQuery(this).val();
//alert(currentstate);
if(currentstate!="all"){
  jQuery.post( "<?php echo site_url('admin/banners/select_county');?>", { state: currentstate }, function( data ) {
  jQuery("#county").html('');
  jQuery("#county").append(data.html_str);
}, "json");
	}
else{
  jQuery.post( "<?php echo site_url('admin/banners/all_county');?>", { state: currentstate }, function( data ) {
  jQuery("#county").html('');
  jQuery("#county").append(data.html_str);
}, "json");	
	}
	});
});	
</script>
<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
jQuery(document).ready(function(){
jQuery('#featured_photo_input').change(function(){
var val = jQuery(this).val();
if(val!='')
{
var src = base_url+'uploads/thumbs/'+val;
}
else
{
var src = base_url+'assets/admin/img/preview.jpg'
}
jQuery('#featured_photo').attr('src',src);
}).change();

});
</script>
<script type="text/javascript">
tinymce.init({
convert_urls : 0,
selector: ".rich",

plugins: [

"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

"save code table contextmenu directionality emoticons template paste textcolor"

]

});
</script>
<script type="text/javascript">

jQuery(document).ready(function(){



var city_field_type =  '<?php echo get_settings("business_settings", "city_dropdown", "autocomplete"); ?>' ;

//alert(city_field_type);

jQuery('#contact_for_price').click(function(){

show_hide_price();

});

show_hide_price();



jQuery('.upload-button').click(function(){

jQuery('#photoimg_featured').click();

});



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



var site_url = '<?php echo site_url();?>';

jQuery('#country').change(function(){

// jQuery('#city').val('');

// jQuery('#selected_city').val('');

var val = jQuery(this).val();



var loadUrl = site_url+'/show/get_locations_by_parent_ajax/'+val;



jQuery.post(

loadUrl,

{},

function(responseText){

<?php if($state_active=='yes'){?>

jQuery('#state').html(responseText);

var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):'';?>';

var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):'';?>';

if(val==sel_country)

jQuery('#state').val(sel_state);

else

jQuery('#state').val('');

jQuery('#state').focus();

jQuery('#state').trigger('change');

<?php }else{?>

var sel_country = '<?php echo (set_value("country")!='')?set_value("country"):'';?>';

var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):'';?>';

var city   = '<?php echo (set_value("city")!='')?set_value("city"):'';?>';

if(city_field_type=='dropdown')

populate_city(val); //populate the city drop down

if(val==sel_country)

{

    jQuery('#selected_city').val(sel_city);

    jQuery('#city').val(city);

}

else

{

    jQuery('#selected_city').val(sel_city);

    jQuery('#city').val('');            

}

<?php }?>



}

);

}).change();



jQuery('#state').change(function(){

<?php if($state_active=='yes'){?>

var val = jQuery(this).val();

var sel_state   = '<?php echo (set_value("state")!='')?set_value("state"):'';?>';

var sel_city   = '<?php echo (set_value("selected_city")!='')?set_value("selected_city"):'';?>';

var city   = '<?php echo (set_value("city")!='')?set_value("city"):'';?>';



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



var parent = '#state';

<?php } else { ?>



var parent = '#city';

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

var site_url = '<?php echo site_url();?>';

var loadUrl = site_url+'/show/get_city_dropdown_by_parent_ajax/'+parent;

jQuery.post(

loadUrl,

{},

function(responseText){

jQuery('#city_dropdown').html(responseText);

var sel_city   = '<?php echo (set_value("city")!='')?set_value("city"):'';?>';

jQuery('#city_dropdown').val(sel_city);

}

);

}

</script>
<script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js');?>"></script>
 <script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){
 var sel_city   = '<?php $row->city=="all"?>';
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process.php",
                              data:"name="+name+"&message="+message,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });
       </script>
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