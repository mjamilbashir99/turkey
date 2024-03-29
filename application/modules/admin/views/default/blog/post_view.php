<link href="<?php echo theme_url();?>/assets/css/custom.css" rel="stylesheet">

<div class="row">

  <div class="col-md-12">

	<form action="<?php echo site_url('admin/blog/add');?>" method="post">

    <div class="box">

      <div class="box-title">

        <h3><i class="fa fa-bars"></i> <?php echo $title;?></h3>

        <div class="box-tool">

          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>

      </div>

      <div class="box-content">

		<input type="hidden" id="action" name="action" value="1">

		<input type="hidden" name="action_type" value="<?php echo (isset($action_type))?$action_type:'insert';?>">

		<?php if(isset($page) && isset($page->id)){?>

		<input type="hidden" name="id" value="<?php echo $page->id;?>">

		<?php }?>

		<?php echo $this->session->flashdata('msg');?>

		<div class="form-group">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<input type="submit" value="Draft" class="btn btn-primary submit" action="2">

				<input type="submit" value="Publish" class="btn btn-success submit" action="1">

				<input type="submit" value="Delete" class="btn btn-danger submit" action="0">
			</div>
		</div>	

		<div style="margin-bottom:20px;"></div>
        
   
    
    
     <script>
		
		jQuery( document ).ready(function() {
              $("#type").change(function(){
				   type = jQuery('#type').val();
       			   if(type!='')
				   {
					jQuery.post("<?php echo site_url('admin/blog/getcat');?>", { type:type}, function( data ) {
					if(data.status==1)
					{

						jQuery( "#category" ).empty().append(data.html_str);
					}
					else
					{

					}
					}, "json");
				   }
			  
			  });                		

		});
    </script>
					

		<?php 
          $type = '';

			if(set_value('type')!='')

				$type = set_value('type');

			else if(isset($page) && isset($page->type))

				$type = $page->type;

		?>
		
		<div class="form-group">

			<label class="col-sm12 col-lg-12 control-label"><?php echo lang_key('Group');?></label>

			<div class="col-sm-12 col-lg-12 controls">
				<?php 
					$this->config->load('business_directory');
					$options = $this->config->item('blog_post_types');
				?>
				<select name="type" id="type" class="form-control">
                  <option data-name="" value=""><?php echo lang_key('Select Type');?></option>
					<?php 
					    foreach ($options as $key => $val) {
						$sel = ($type==$key)?'selected="selected"':'';
					?>
						<option value="<?php echo $key;?>" <?php echo $sel;?>>
						<?php if(lang_key($val)=="Article")
						{
						      echo "Destination";
						}else{
					          echo lang_key($val);
					    }?>
                    </option>
					<?php }?>
				</select>

				<span class="help-inline">&nbsp;</span>

				<?php echo form_error('type'); ?>

			</div>

		</div>
        
        
        <div class="form-group">
       <?php //var_dump($rw) ?>
            <label class="col-sm12 col-lg-12 control-label" for="inputEmail1"><?php echo lang_key('Category Post');?></label>
            <div class="col-sm-12 col-lg-12 controls">
                <select name="category" id="category" class="form-control">
                    <option value=""><?php echo lang_key('Select Category');?></option>
                    <?php 
				
					foreach ($categories as $row) 
					 echo $row->id;
                    {
                        $v = (set_value('category')!='')?set_value('category'):$row->id;
                        $sel = ($v==$page->category)?'selected="selected"':'';
                    ?>
                        <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo lang_key($row->name);?></option>
                    <?php
                    }?>
                </select>
                <?php echo form_error('category');?>
            </div>
                            </div>
                            
                <div class="form-group">
                <label class="col-sm12 col-lg-12 control-label"><?php echo lang_key('County');?></label>
                 <?php $rw=get_all_county_by_name();?>
                <div class="col-sm-12 col-lg-12 controls">
                <select name="county"  class="form-control">
                <option data-name="" value=""><?php echo lang_key('Select City - County ');?></option>
				<?php
				//var_dump($rw);
				
				foreach($rw as $rws)
				
                {
					
				 $v = (set_value('county')!='')?set_value('county'):$rws->name;
                $sel = ($v==$page->country)?'selected="selected"':'';
                ?>
                <option value="<?php echo $rws->id;?>-<?php echo $rws->city_id;?>" <?php echo $sel;?>><?php echo $rws->city;?>-<?php echo $rws->name;?>  </option>
                <?php }?>
                </select>
                <?php echo form_error('county');?>
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
                    


						<?php 

							$title = '';

							if(set_value('title_'.$lang)!='')

								$title = set_value('title_'.$lang);

							else if(isset($page) && isset($page->title))
							{
								$data = json_decode($page->title);
								$title = $data->{$lang};
							}

						?>

						<div class="form-group">

							<label class="col-sm12 col-lg-12 control-label"><?php echo lang_key('title');?></label>

							<div class="col-sm-12 col-lg-12 controls">

								<input type="text" class="form-control" name="title_<?php echo $lang;?>" id="title_<?php echo $lang;?>" value="<?php echo $title;?>" placeholder="<?php echo lang_key('type_something');?>" />

								<span class="help-inline">&nbsp;</span>

								<?php echo form_error('title_'.$lang); ?>

							</div>

						</div>

						<div style="clear:both"></div>

						<div class="form-group">

							<label class="col-sm-12 col-lg-12 control-label"><?php echo lang_key('description');?></label>

							<div class="col-sm-12 col-lg-12 controls">

								<?php 

									$description = '';

									if(set_value('description_'.$lang)!='')

										$description = set_value('description_'.$lang);

									else if(isset($page) && isset($page->description))
									{
										$data = json_decode($page->description);
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
            <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
            <div class="col-sm-4 col-lg-5 controls">
                <img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id('');?>" style="width:256px;">
            </div>
            <div class="clearfix"></div>                   
            <span id="featured-photo-error"></span> 
        </div>

        <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('featured_image');?>:</label>
            <div class="col-sm-4 col-lg-5 controls">                    
            	<?php $featured_img = (isset($page->featured_img))?$page->featured_img:'';?>
            	<?php $v = (set_value('featured_img')!='')?set_value('featured_img'):$featured_img;?>
                <input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo $v;?>">                    
                <iframe src="<?php echo site_url('admin/blog/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                <span class="help-inline">&nbsp;</span>
            </div>          
        </div>
   
        <div class="form-group">
                    <label class="col-md-12 control-label"><?php echo lang_key('gallery');?></label>
                    <div class="col-md-12">
             
                        <?php $tmp_gallery = ($page->gallery!='')?json_decode($page->gallery):array();?>
                    
                        <?php $gallery = (isset($_POST['gallery']))?$_POST['gallery']:$tmp_gallery; ?>
                        <ul class="multiple-uploads">
                            <?php foreach ($gallery as $item) {
                            ?>
                            <li class="gallery-img-list">
                              <input type="hidden" name="gallery[]" value="<?php echo $item;?>" />
                              <img src="<?php echo base_url('uploads/gallery/'.$item);?>" />
                              <div class="remove-image" onclick="jQuery(this).parent().remove();">X</div>
                            </li>
                            <?php }?>
                            <li class="add-image" id="dragandrophandler" style="padding-top: 0%;">+</li>
                        </ul>       
                        <div class="clearfix"></div>
                        <span class="gallery-upload-instruction">NB: you can drag drop to reorder the gallery photos. Photos are not resized.</span>
                        <div class="clearfix clear-top-margin"></div>
                    </div>
                </div>
                
        <div class="clearfix"></div>
		<div style="margin-bottom:20px;"></div>
		<div class="form-group">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<input type="submit" value="<?php echo lang_key('draft'); ?>" class="btn btn-primary submit" action="2">

				<input type="submit" value="<?php echo lang_key('publish'); ?>" class="btn btn-success submit" action="1">

				<input type="submit" value="<?php echo lang_key('delete'); ?>" class="btn btn-danger submit" action="0">
			</div>
		</div>	


	 </div>

    </div>

	</form>

  </div>

</div>

<script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js');?>"></script>
<?php require'multiple-uploader.php';?>
<?php require'bulk_uploader_view.php';?>
<script type="text/javascript">
jQuery(document).ready(function(){
    
    jQuery('#photoimg').attr('target','.multiple-uploads');
    jQuery('#photoimg').attr('input','gallery');
    var obj = $("#dragandrophandler");
    obj.on('dragenter', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('border', '2px solid #0B85A1');
    });

    obj.on('dragover', function (e)
    {
         e.stopPropagation();
         e.preventDefault();
    });

    obj.on('drop', function (e)
    {
     
         $(this).css('border', '2px dotted #0B85A1');
         e.preventDefault();
         var files = e.originalEvent.dataTransfer.files;
         //console.log(files);
         //We need to send dropped files to Server
         handleFileUpload(files,obj);
    });

    $(document).on('dragenter', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
    });

    $(document).on('dragover', function (e)
    {
      e.stopPropagation();
      e.preventDefault();
      obj.css('border', '2px dotted #0B85A1');
    });
    
    $(document).on('drop', function (e)
    {
        e.stopPropagation();
        e.preventDefault();
    });

    jQuery('.multiple-uploads > .add-image').click(function(){
        jQuery('#photoimg').attr('target','.multiple-uploads');
        jQuery('#photoimg').attr('input','gallery');
        jQuery('#photoimg').click();
    });

    jQuery( ".multiple-uploads" ).sortable();
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

	jQuery('#layout').trigger('change');

	jQuery('.submit').click(function(e){

		jQuery('#action').val(jQuery(this).attr('action'));

	});

	jQuery('#content_from').change(function(){

		var content_from = jQuery(this).val();

		if(content_from=='Manual')

		{

			jQuery('.manual').show();

			jQuery('.url').hide();

		}

		else

		{

			jQuery('.manual').hide();

			jQuery('.url').show();			

		}

	}).change();



	jQuery('#title').keyup(function(e){

		makealias(jQuery(this).val());

	});



	jQuery('#title').change(function(e){

		makealias(jQuery(this).val());

	}).change();

});



function makealias(val)

{

	val = val.toLowerCase();

	val = val.replace(/\s/g, '');

	val = val.replace('[', '');

	val = val.replace(']', '');

	jQuery('#alias').val(val);

}



jQuery('#layout').change(function(){

	var val = jQuery(this).val();

	if(val==2)

	{

		jQuery('.left-bar').hide();

		jQuery('.right-bar').hide();

		jQuery('.main-content').css('width','100%');

	}

	else if(val==0)

	{

		jQuery('.left-bar').show();

		jQuery('.right-bar').hide();

		jQuery('.main-content').css('width','75%');

		

	}

	else if(val==1)

	{

		jQuery('.left-bar').hide();

		jQuery('.right-bar').show();

		jQuery('.main-content').css('width','75%');		

	}		

});

</script>

