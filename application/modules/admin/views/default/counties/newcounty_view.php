<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo lang_key('new_county');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>

      		<div class="box-content">
      		<form class="form-horizontal" id="addcounty" action="<?php echo site_url('admin/county/addcounty');?>" method="post">
			<div class="form-group">
                                 <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Select County');?></label>
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
                                                  <option data-name="<?php echo $row->name;?>" class="cities city-<?php echo $row->parent;?>" value="<?php echo $row->name;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                                              <?php }?>
                                        </select>
                                    </div>
                                </div>


				
                
                
<div style="clear:both"></div>

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

							<label class="col-sm-12 col-lg-12 control-label"style="text-align:left;"><?php echo lang_key('description');?> :</label>


							<div class="col-sm-12 col-md-12 controls">

								<?php 

									$description = '';

									if(set_value('description_'.$lang)!='')

										$description = set_value('description_'.$lang);

									else if(isset($post) && isset($post->description))
									{
										$data = json_decode($post->description);
										$description = $data->{$lang};
									}

								?>		

								<textarea name="description_<?php echo $lang;?>" class="rich" style="height:434px"><?php echo $description;?></textarea>

								<span class="help-inline">&nbsp;</span>

								<?php echo form_error('description_'.$lang); ?>

							</div>

						</div>



                    </div>
                    <?php $flag++; }?>
                </div>
            </div>
            
            
            		<div style="clear:both"></div>	

				<div class="form-group">
					<label class="col-sm-3 col-md-3 control-label">&nbsp;</label>
					<div class="col-sm-4 col-md-4 controls">
						<img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id('');?>" style="width:256px;">
					</div>
					<div class="clearfix"></div>
					<span id="featured-photo-error"></span>
				</div>

				<div class="form-group">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('featured_image');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo(set_value('featured_img')!='')?set_value('featured_img'):'';?>">
						<iframe src="<?php echo site_url('admin/county/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
						<?php echo form_error('featured_img');?>
						<span class="help-inline">&nbsp;</span>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="form-group">
					<label class="col-sm-3 col-md-3 control-label">&nbsp;</label>
					<div class="col-sm-4 col-md-4 controls">
				<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> <?php echo lang_key('save');?></button>
					</div>
				</div>
				<div class="clearfix"></div>

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