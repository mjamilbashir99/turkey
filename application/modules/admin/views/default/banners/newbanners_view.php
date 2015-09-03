<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo lang_key('new_Banners');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>

      	<div class="box-content">	
      		<form class="form-horizontal" id="addcounty" action="<?php echo site_url('admin/banners/addbanners');?>" method="post">
			<div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('select_state');?></label>
                                        <div class="col-sm-4 col-md-4 controls">
                                        <select id="input-11" name="state" class="form-control chosen-select">
                                            <option data-name="" value="any"><?php echo lang_key('any_state');?></option>
                                              <?php foreach (get_all_locations_by_type('state')->result() as $row) {
                                                  $sel = ($row->id==set_value('state'))?'selected="selected"':'';
                                                  ?>
                                                  <option data-name="<?php echo $row->name;?>" class="cities state-<?php echo $row->parent;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                                              <?php }?>
                                        </select>
                                    </div>
                                </div>				

        
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('select_city');?></label>
                                        <div class="col-sm-4 col-md-4 controls">
                                        <select id="input-11" name="city" class="form-control chosen-select">
                                            <option data-name="" value="any"><?php echo lang_key('any_city');?></option>
                                              <?php foreach (get_all_locations_by_type('city')->result() as $row) {
                                                  $sel = ($row->id==set_value('city'))?'selected="selected"':'';
                                                  ?>
                                                  <option data-name="<?php echo $row->name;?>" class="cities city-<?php echo $row->parent;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                                              <?php }?>
                                        </select>
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
                                        <select id="input-14" name="category" class="form-control chosen-select">
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
                                
                             
                                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Target Area');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
                      <select id="input-14" name="target_area" class="form-control chosen-select">
                          <option value="any"><?php echo lang_key('Target Area');?></option>
                          <?php foreach($banners as $banner){ ?>
						 <option value="<?php echo $banner->id;?>"><?php echo $banner->banner_area; ?></option>
                                             <?php } ?>
                                        </select>
						<?php echo form_error('target_area'); ?>
					</div>
				</div>  
				<div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('url');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="text" name="url" value="<?php echo(set_value('url')!='')?set_value('url'):'';?>" placeholder="<?php echo lang_key('url');?>" class="form-control input-sm" >
						<?php echo form_error('url'); ?>
					</div>
				</div>
                    <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Lower (Description)');?>:</label>
					<div class="col-sm-8 col-md-8 controls">
						<textarea type="text" name="lower_description" value="<?php echo(set_value('lower_description')!='')?set_value('lower_description'):'';?>" placeholder="<?php echo lang_key('Lower Description');?>" class="form-control input-sm" ></textarea>
						<?php echo form_error('lower_description'); ?>
					</div>
				</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('width');?>:</label>
					<div class="col-sm-2 col-md-2 controls">
						<input type="text" name="width" value="<?php echo(set_value('width')!='')?set_value('width'):'';?>" placeholder="<?php echo lang_key('width');?>" class="form-control input-sm" >
						<?php echo form_error('width'); ?>
					</div>
				</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Height');?>:</label>
					<div class="col-sm-2 col-md-2 controls">
						<input type="text" name="height" value="<?php echo(set_value('height')!='')?set_value('height'):'';?>" placeholder="<?php echo lang_key('height');?>" class="form-control input-sm" >
						<?php echo form_error('height'); ?>
					</div>
				</div>
                <div class="form-group">
					<label class="col-sm-3 col-md-3 control-label">&nbsp;</label>
					<div class="col-sm-4 col-md-4 controls">
						<img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id('');?>" style="width:256px;">
					</div>
					<div class="clearfix"></div>
					<span id="featured-photo-error"></span>
				</div>

				<div class="form-group">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('advertesing');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo(set_value('advertesing')!='')?set_value('advertesing'):'';?>">
						<iframe src="<?php echo site_url('admin/banners/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
						<?php echo form_error('advertesing');?>
						<span class="help-inline">&nbsp;</span>
					</div>
				</div>
                 
                <div class="form-group icon-class-holder">
					<label class="col-sm-2 col-md-2 control-label"><?php echo lang_key('Ad type');?>:</label>
					<div class="col-sm-12 col-md-12 controls">
                   <label class="radio-inline"><input type="radio" name="ad_type" value="1">picture</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="2">Adveresting Code</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="3">8 second opening</label>
                     <label class="radio-inline"><input type="radio" name="ad_type" value="4">Background</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="5">Flash</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="6">Growing Flash</label>
						<?php echo form_error('Ad type'); ?>
					</div>
				</div>
                
                <div class="form-group icon-class-holder">
      <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Start Date');?>:</label>           
    <div class="btn-group">
     <?php 
echo '<select name="start_day">'; 
for($d = 1;$d <= 31; $d++){ 
    echo "<option value='$d'>$d</option>"; 
} 
echo "</select>"; 
?>
      <?php 
echo '<select name="start_month">'; 
for($m = 1;$m <= 12; $m++){ 
    $month =  date("F", mktime(0, 0, 0, $m)); 
    echo "<option value='$m'>$month</option>"; 
} 
echo "</select>"; 
?>
<?php
$current_year = date("Y");
$range = range($current_year, ($current_year - 50));
echo '<select name="start_year" id="contact-year" tabindex="7">';
 
//Now we use a foreach loop and build the option tags
foreach($range as $r)
{
echo '<option value="'.$r.'">'.$r.'</option>';
}
 
//Echo the closing select tag
echo '</select>';
?>
</div>

<label>- Time : Hour</label>

<div class="btn-group">
     <?php 
echo '<select name="start_Hour">'; 
for($h = 00;$h <= 24; $h++){ 
    echo "<option value='$h'>$h</option>"; 
} 
echo "</select>"; 
?>
<label>min</label>
<?php 
echo '<select name="start_Min">'; 
for($m = 00;$m <= 60; $m++){ 
    echo "<option value='$m'>$m</option>"; 
} 
echo "</select>"; 
?>
</div>

<div class="form-group icon-class-holder">
      <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('End Date');?>:</label>           
       <div class="btn-group">
     <?php 
echo '<select name="end_day">'; 
for($d = 1;$d <= 31; $d++){ 
    echo "<option value='$d'>$d</option>"; 
} 
echo "</select>"; 
?>
      <?php 
echo '<select name="end_month">'; 
for($m = 1;$m <= 12; $m++){ 
    $month =  date("F", mktime(0, 0, 0, $m)); 
    echo "<option value='$m'>$month</option>"; 
} 
echo "</select>"; 
?>
<?php
$current_year = date("Y");
$range = range($current_year, ($current_year - 50));
echo '<select name="end_year" id="contact-year" tabindex="7">';
 
//Now we use a foreach loop and build the option tags
foreach($range as $r)
{
echo '<option value="'.$r.'">'.$r.'</option>';
}
 
//Echo the closing select tag
echo '</select>';
?>
</div>

<label>- Time : Hour</label>

<div class="btn-group">
     <?php 
echo '<select name="end_Hour">'; 
for($h = 00;$h <= 24; $h++){ 
    echo "<option value='$h'>$h</option>"; 
} 
echo "</select>"; 
?>
<label>min</label>
<?php 
echo '<select name="end_Min">'; 
for($m = 00;$m <= 60; $m++){ 
    echo "<option value='$m'>$m</option>"; 
} 
echo "</select>"; 
?>
</div>
</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Impression');?>:</label>
					<div class="col-sm-2 col-md-2 controls">
						<input type="text" name="impression" value="<?php echo(set_value('impression')!='')?set_value('impression'):'';?>" placeholder="<?php echo lang_key('impression');?>" class="form-control input-sm" >
						<?php echo form_error('impression'); ?>
					</div>
				</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Script Area');?>:</label>
					<div class="col-sm-8 col-md-8 controls">
						<textarea type="text" name="script_area" value="<?php echo(set_value('script_area')!='')?set_value('script_area'):'';?>" placeholder="<?php echo lang_key('Script Area');?>" class="form-control input-sm" ></textarea>
						<?php echo form_error('script_area'); ?>
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