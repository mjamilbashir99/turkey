<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo lang_key('edit_sponsor_message');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
	
      		<form class="form-horizontal" id="update_sponser_message" action="<?php echo site_url('admin/banners/update_sponser_message');?>" method="post">

		<input type="hidden" name="action_type" value="<?php echo (isset($action_type))?$action_type:'update';?>">

		<?php if(isset($post) && isset($post->id)){?>

		<input type="hidden" name="id" value="<?php echo $post->id;?>">

		<?php }?>

                        <div class="form-group icon-class-holder">
                        <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Advertiser');?>:</label>
                        <div class="col-sm-4 col-md-4 controls">
                        <input type="text" name="advertiser" value="<?php echo $post->advertiser?>"  class="form-control input-sm" >
                        <?php echo form_error('advertiser'); ?>
                        </div>
                        </div>
                        <div class="form-group icon-class-holder">
                        <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('Sponsor Add');?>:</label>
                        <div class="col-sm-4 col-md-4 controls">
                        <input type="text" name="sponsor_add" value="<?php echo $post->sponsor_add?>"  class="form-control input-sm" >
                        <?php echo form_error('sponsor_add'); ?>
                        </div>
                         <div class="col-sm-4 col-md-4 controls">
                         <input type="checkbox" name="show_sponsor_add" value="1" checked class="form-control input-sm">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo lang_key('City');?>:</label>
                        <div class="col-md-4">                        
                        <select id="state" name="state" class="form-control chosen-select">
                        <option name="state" selected="selected" value="all"><?php echo lang_key('all');?></option>
                        <?php //var_dump($post) ?>
                        <?php foreach (get_all_locations_by_type('state')->result() as $row) {
                        $v = (set_value('state')!='')?set_value('state'):$row->id;
                        $sel = ($v==$post->city)?'selected="selected"':'';                        
                        ?>
                        <option data-name="<?php echo $row->name;?>" value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                        <?php }?>                        
                        </select>
                        <?php echo form_error('state');?>                        
                        </div>
                        </div>                        
                        <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo lang_key('counties');?>:</label>
                        <div class="col-md-4">                       
                        <select  id="county" name="county" class="form-control chosen-select">
                        <option name="county" id="county" selected="selected" value="all"><?php echo lang_key('all');?></option>
                        <?php //var_dump($post) ?>
                        <?php foreach (get_all_locations_by_type('city')->result() as $row) {
                        $v = (set_value('county')!='')?set_value('county'):$row->id;
                        $sel = ($v==$post->county)?'selected="selected"':'';                        
                        ?>
                        <option data-name="<?php echo $row->name;?>" id="county"  value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                        <?php }?>                        </select>
                        <?php echo form_error('county');?>                        
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label"><?php echo lang_key('select_category');?>:</label>
                        <div class="col-sm-4 col-md-4 controls">
                        <?php
                        $CI = get_instance();
                        $CI->load->model('user/post_model');
                        $categories = $CI->post_model->get_all_categories();
                        ?>
                        <select id="input-14" name="category" class="form-control chosen-select">
                        <option value="all" selected="selected"><?php echo lang_key('all');?></option>
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