<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo lang_key('edit_banners');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
	
      		<form class="form-horizontal" id="updatebanners" action="<?php echo site_url('admin/banners/updatebanners');?>" method="post">

		<input type="hidden" name="action_type" value="<?php echo (isset($action_type))?$action_type:'update';?>">

		<?php if(isset($post) && isset($post->id)){?>

		<input type="hidden" name="id" value="<?php echo $post->id;?>">

		<?php }?>


            <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('select_state');?></label>
                                        <div class="col-sm-4 col-md-4 controls">
                                        <select id="input-11" name="state" class="form-control chosen-select">
                                            <option data-name="" value="any"><?php echo lang_key('any_state');?></option>
                                              <?php foreach (get_all_locations_by_type('state')->result() as $row) {
												  $v = (set_value('state')!='')?set_value('state'):$row->id;
                                                  $sel = ($v==$post->county)?'selected="selected"':'';
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
												  $v = (set_value('city')!='')?set_value('city'):$row->id;
                                                  $sel = ($v==$post->city)?'selected="selected"':'';
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
												   $v = (set_value('category')!='')?set_value('category'):$row->id;
                                                  $sel = ($v==$post->categories)?'selected="selected"':'';
                                              ?>
                                                  <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->title);?></option>
                                              <?php
                                              }?>
                                        </select>
                                    </div>
                                </div>
                               <?php //var_dump($post)?>
                              <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Target Area');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
                      <select id="input-14" name="target_area" class="form-control chosen-select">
                          <option value="any"><?php echo lang_key('Target Area');?></option>
                          <?php foreach($banners as $banner){ 
						   $v = (set_value('banner')!='')?set_value('banner'):$banner->id;
                           $sel = ($v==$post->target_area)?'selected="selected"':'';
						  ?>
						 <option value="<?php echo $banner->id;?>"<?php echo $sel;?>><?php echo $banner->banner_area; ?></option>
                                             <?php } ?>
                                        </select>
						<?php echo form_error('target_area'); ?>
					</div>
				</div>  
				<div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('url');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="text" name="url" value="<?php echo $post->url?>" placeholder="<?php echo lang_key('url');?>" class="form-control input-sm" >
						<?php echo form_error('url'); ?>
					</div>
				</div>
                    <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Lower (Description)');?>:</label>
					<div class="col-sm-8 col-md-8 controls">
						<textarea type="text" name="lower_description" value="" placeholder="<?php echo lang_key('Lower Description');?>" class="form-control input-sm" ><?php echo $post->lower_description?></textarea>
						<?php echo form_error('lower_description'); ?>
					</div>
				</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('width');?>:</label>
					<div class="col-sm-2 col-md-2 controls">
						<input type="text" name="width" value="<?php echo $post->width?>" placeholder="<?php echo lang_key('width');?>" class="form-control input-sm" >
						<?php echo form_error('width'); ?>
					</div>
				</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Height');?>:</label>
					<div class="col-sm-2 col-md-2 controls">
						<input type="text" name="height" value="<?php echo $post->height?>" placeholder="<?php echo lang_key('height');?>" class="form-control input-sm" >
						<?php echo form_error('height'); ?>
					</div>
				</div>
                <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
            <div class="col-sm-4 col-lg-5 controls">
                <img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id('');?>" style="width:256px;">
            </div>
            <div class="clearfix"></div>                   
            <span id="featured-photo-error"></span> 
        </div>

        <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('advertesing');?>:</label>
            <div class="col-sm-4 col-lg-5 controls">                    
            	<?php $advertesing = (isset($post->advertesing))?$post->advertesing:'';?>
            	<?php $v = (set_value('advertesing')!='')?set_value('advertesing'):$advertesing;?>
                <input type="hidden" name="advertesing" id="featured_photo_input" value="<?php echo $v;?>">                    
                <iframe src="<?php echo site_url('admin/banners/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                <span class="help-inline">&nbsp;</span>
            </div>          
        </div>
                 
                <div class="form-group icon-class-holder">
					<label class="col-sm-2 col-md-2 control-label"><?php echo lang_key('Ad type');?>:</label>
					<div class="col-sm-12 col-md-12 controls">
                   <label class="radio-inline"><input type="radio" name="ad_type" value="1" <?php if ($post->ad_type == '1') echo 'checked="checked"'; ?>>picture</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="2" <?php if ($post->ad_type == '2') echo 'checked="checked"'; ?>>Adveresting Code</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="3" <?php if ($post->ad_type == '3') echo 'checked="checked"'; ?>>8 second opening</label>
                     <label class="radio-inline"><input type="radio" name="ad_type" value="4" <?php if ($post->ad_type == '4') echo 'checked="checked"'; ?>>Background</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="5" <?php if ($post->ad_type == '5') echo 'checked="checked"'; ?>>Flash</label>
                    <label class="radio-inline"><input type="radio" name="ad_type" value="6" <?php if ($post->ad_type == '6') echo 'checked="checked"'; ?>>Growing Flash</label>
						<?php echo form_error('Ad type'); ?>
					</div>
				</div>
                
                <div class="form-group icon-class-holder">
      <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Start Date');?>:</label>           
    <div class="btn-group">
     <?php 
	 $start_date = $post->start_date; 
	 $start_years    = date('Y',$start_date);
	 $start_months   = date('m',$start_date);
	 $start_days     = date('j',$start_date);
	 $start_Hours    = date('G',$start_date);
	 $start_Mins     = date('i',$start_date);
	 
echo '<select name="start_day">'; 
for($d = 1;$d <= 31; $d++){ 
if($sel = ($d==$start_days)?'selected="selected"':""){
    echo "<option value='$start_days' $sel>$start_days</option>";
}
else{
    echo "<option value='$d' >$d</option>"; 
	 }
} 
echo "</select>"; 
?>
      <?php 
echo '<select name="start_month">'; 
for($m = 1;$m <= 12; $m++){ 
    $month =  date("m", mktime(0, 0, 0, $m));
	if($sel = ($month==$start_months)?'selected="selected"':""){ 
    echo "<option value='$start_months' $sel >$start_months</option>"; 
}

 else{
    echo "<option value='$month' >$month</option>"; 
	 }
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
	if($sel = ($r==$start_years)?'selected="selected"':""){ 
echo '<option value="'.$start_years.'" '.$sel.'>'.$start_years.'</option>';
}
else{
    echo "<option value='$r' >$r</option>"; 
	 }
}
 
//Echo the closing select tag
echo '</select>';
?>
</div>

<label>- Time : Hour</label>

<div class="btn-group">
     <?php 
echo '<select name="start_Hour">'; 
for($h = 00;$h <= 23; $h++){ 
	if($sel = ($h==$start_Hours)?'selected="selected"':""){ 

    echo "<option value='$h' $sel>$h</option>"; 
}

else{
    echo "<option value='$h' >$h</option>"; 
	 }

 }
echo "</select>"; 
?>
<label>min</label>
<?php 
echo '<select name="start_Min">'; 
for($m = 00;$m <= 60; $m++){ 
if($sel = ($m==$start_Mins)?'selected="selected"':""){
    echo "<option value='$m' $sel>$m</option>"; 
}

else{
    echo "<option value='$m' >$m</option>"; 
	 }

 }
echo "</select>"; 
?>
</div>

<div class="form-group icon-class-holder">
      <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('End Date');?>:</label>           
       <div class="btn-group">
      <?php 
	 $end_date   = $post->end_date; 
	 $end_years  = date('Y',$end_date);
	 $end_months = date('m',$end_date);
	 $end_days   = date('j',$end_date);
	 $end_Hours  = date('G',$end_date);
	 $end_Mins   = date('i',$end_date);
	 
echo '<select name="end_day">'; 
for($d = 1;$d <= 31; $d++){ 
if($sel = ($d==$end_days)?'selected="selected"':""){
    echo "<option value='$end_days' $sel>$end_days</option>";
}
else{
    echo "<option value='$d' >$d</option>"; 
	 }
} 
echo "</select>"; 
?>
      <?php 
echo '<select name="end_month">'; 
for($m = 1;$m <= 12; $m++){ 
    $month =  date("m", mktime(0, 0, 0, $m));
	if($sel = ($month==$end_months)?'selected="selected"':""){ 
    echo "<option value='$end_months' $sel >$end_months</option>"; 
}
else{
    echo "<option value='$month' >$month</option>"; 
	 }

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
	if($sel = ($r==$end_years)?'selected="selected"':""){ 
echo '<option value="'.$end_years.'" '.$sel.'>'.$end_years.'</option>';
}
else{
    echo "<option value='$r' >$r</option>"; 
	 }
}
 
//Echo the closing select tag
echo '</select>';
?>
</div>

<label>- Time : Hour</label>

<div class="btn-group">
     <?php 
echo '<select name="end_Hour">'; 
for($h = 00;$h <= 23; $h++){ 
	if($sel = ($h==$end_Hours)?'selected="selected"':""){ 

    echo "<option value='$h' $sel>$h</option>"; 
} 
else{
    echo "<option value='$h' >$h</option>"; 
	 }

}
echo "</select>"; 
?>
<label>min</label>
<?php 
echo '<select name="end_Min">'; 
for($m = 00;$m <= 60; $m++){ 
if($sel = ($m==$end_Mins)?'selected="selected"':""){ 
    echo "<option value='$m' $sel>$m</option>"; 
}
else{
    echo "<option value='$m' >$m</option>"; 
	 }

 }
echo "</select>"; 
?>
</div>
</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Impression');?>:</label>
					<div class="col-sm-2 col-md-2 controls">
						<input type="text" name="impression" value="<?php echo $post->impression?>" placeholder="<?php echo lang_key('impression');?>" class="form-control input-sm" >
						<?php echo form_error('impression'); ?>
					</div>
				</div>
                <div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Script Area');?>:</label>
					<div class="col-sm-8 col-md-8 controls">
						<textarea type="text" name="script_area" value="" placeholder="<?php echo lang_key('Script Area');?>" class="form-control input-sm" ><?php  echo $post->script_area?></textarea>
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