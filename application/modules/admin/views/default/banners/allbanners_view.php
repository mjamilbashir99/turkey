<link href="<?php echo base_url();?>assets/datatable/dataTables.bootstrap.css" rel="stylesheet">

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo lang_key('all_Banners');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>
      <div class="box-content">
        <?php $this->load->helper('text');?>
        <?php echo $this->session->flashdata('msg');?>
        <?php if($posts->num_rows()<=0){?>
        <div class="alert alert-info">No Banners</div>
        <?php }else{?>
        <div id="no-more-tables">
        <table id="all-posts" class="table table-hover">
           <thead>
               <tr>
                  <th class="numeric">#</th>
                   <th class="numeric"><?php echo lang_key('Target area');?></th>
                  <th class="numeric"><?php echo lang_key('County');?></th>
                  <th class="numeric"><?php echo lang_key('City');?></th>
                  <th class="numeric"><?php echo lang_key('Category');?></th>
                  <th class="numeric"><?php echo lang_key('Advertesing');?></th>
                  <th class="numeric"><?php echo lang_key('Url');?></th>
                  <th class="numeric"><?php echo lang_key('Impression');?></th>
                  <th class="numeric"><?php echo lang_key('actions');?></th>
               </tr>
           </thead>
           <tbody>
           <?php // var_dump($posts->result())?>
        	<?php $i=1;foreach($posts->result() as $row):?>
               <tr>
                  <td data-title="#" class="numeric"><?php echo $i;?></td>
 <td data-title="<?php echo lang_key('Ad type');?>" class="numeric"><?php echo get_all_banners_area_by_id($row->target_area);?></td>
                  <td data-title="<?php echo lang_key('County');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo get_location_name_by_id($row->county);?></a></td>
                 <td data-title="<?php echo lang_key('city');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo get_location_name_by_id($row->city);?></a></td>
                  <td data-title="<?php echo lang_key('Category');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo get_category_title_by_id($row->categories);?></a></td>
                  <td data-title="<?php echo lang_key('image');?>" class="numeric"><img class="thumbnail" style="width:50px;margin-bottom:0px;" src="<?php echo get_featured_photo_by_id($row->advertesing);?>" /></td>
                  <td data-title="<?php echo lang_key('Url');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo lang_key($row->url);?></a></td>
                  <td data-title="<?php echo lang_key('Impression');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo lang_key($row->impression);?></a></td>
                  <td data-title="<?php echo lang_key('actions');?>" class="numeric">
                    <div class="btn-group">
                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog"></i> <?php echo lang_key('action');?> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-info">
                          <li><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo lang_key('edit');?></a></li>
                          <li><a href="<?php echo site_url('admin/banners/delete/'.$row->id);?>"><?php echo lang_key('delete');?></a></li>
                      </ul>
                    </div>
                  </td>
               </tr>
            <?php $i++;endforeach;?>   
           </tbody>
        </table>
        </div>

        <?php }?>
        </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatable/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#all-posts').dataTable();
    });
</script>