<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo lang_key('edit_category');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
      		
            <form class="form-horizontal" id="addcategory" action="<?php echo site_url('admin/category/updatecategory');?>" method="post">
      			<input type="hidden" name="id" value="<?php echo $post->id;?>"/>
				<div class="form-group">
               
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('name');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="text" name="title" value="<?php echo(set_value('fa_icon')!='')?set_value('fa_icon'):$post->title;?>" placeholder="<?php echo lang_key('type_something');?>" class="form-control input-sm" >
						<?php echo form_error('title'); ?>
					</div>
				</div>			

 
<?php 


			$type = '';

			if(set_value('type')!='')

				$type = set_value('type');

			else if(isset($post) && isset($post->type))

				$type = $post->type;

		?>
		

		<div class="form-group">

			<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('type');?></label>

			<div class="col-sm-4 col-md-4 controls">
				<?php 
					$this->config->load('business_directory');
					$options = $this->config->item('blog_post_types');
				?>
				<select name="type" class="form-control">
					<?php foreach ($options as $key => $val) {
						$sel = ($type==$key)?'selected="selected"':'';
					?>
						<option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo lang_key($val);?></option>
					<?php
					}?>
				</select>

				<span class="help-inline">&nbsp;</span>

				<?php echo form_error('type'); ?>

			</div>

		</div>

				<div class="form-group icon-class-holder">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('fa_icon');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="text" name="fa_icon" value="<?php echo(set_value('fa_icon')!='')?set_value('fa_icon'):$post->fa_icon;?>" placeholder="<?php echo lang_key('fa-car');?>" class="form-control input-sm" >
						<?php echo form_error('fa_icon'); ?>
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
						<?php $featured_img = (set_value('featured_img')!='')?set_value('featured_img'):$post->featured_img;?>
						<img class="thumbnail" id="featured_photo" src="<?php //echo get_featured_photo_by_id($featured_img);?>" style="width:256px;">
					</div>
					<div class="clearfix"></div>
					<span id="featured-photo-error"></span>
				</div>

				<div class="form-group">
					<label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('featured_image');?>:</label>
					<div class="col-sm-4 col-md-4 controls">
						<input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo $featured_img; ?>">
						<iframe src="<?php echo site_url('admin/category/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
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