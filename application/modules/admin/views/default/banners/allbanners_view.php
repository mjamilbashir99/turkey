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
                  <th class="numeric"><?php echo lang_key('sponsor_add');?></th>
                  <th class="numeric"><?php echo lang_key('ad_type');?></th>
                  <th class="numeric"><?php echo lang_key('Target Area');?></th>
                  <th class="numeric"><?php echo lang_key('City');?></th>
                  <th class="numeric"><?php echo lang_key('County');?></th>
                  <th class="numeric"><?php echo lang_key('Category');?></th>
                  <th class="numeric"><?php echo lang_key('Advertiser');?></th>
                  <th class="numeric"><?php echo lang_key('Addition date');?></th>
                  <th class="numeric"><?php echo lang_key('status');?></th>
                  <th class="numeric"><?php echo lang_key('actions');?></th>
               </tr>
           </thead>
           <tbody>
           <?php   //var_dump($posts->result())?>
        	<?php $i=1;
			
			foreach($posts->result() as $row):?>
               <tr>
                  <td data-title="#" class="numeric"><?php echo $i;?></td>
                  <td data-title="<?php echo lang_key('sponsor_add');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo lang_key($row->sponsor_add);?></a></td>
                    <td data-title="<?php echo lang_key('ad_type');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>">
                    <?php
                    if($row->ad_type==1)
                    {
                    $img= get_thumbs_image($row->advertesing); 
					echo '<img src="'.$img.'" style="width:30%;hight:20%">'; 
                    }
                    elseif($row->ad_type==2)
                    {
                    echo lang_key('Adveresting Code');
                    }
                    elseif($row->ad_type==5)
                    {
                    echo lang_key('Flash');
                    }
					elseif($row->ad_type==7){
                    echo lang_key('Sponsor Message');
                    }
                    else{
                    echo lang_key('Not Selected');
                    }?>
                    </a></td>
                    <td data-title="<?php echo lang_key('Target Area');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php
				   
				    echo get_banner_area_by_target_area($row->target_area);
				   
				   ?></a></td>
                   <td data-title="<?php echo lang_key('city');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php
				   if($row->city=="all"){
				    echo lang_key($row->city);
				   }else
				   echo get_location_name_by_id($row->city);
				   ?></a></td>
                  <td data-title="<?php echo lang_key('County');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php  
				  if($row->county=="all"){
				    echo lang_key($row->county);
				   }else
				   echo get_location_name_by_id($row->county);
				  ?></a></td>
                  <td data-title="<?php echo lang_key('Category');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php                   if($row->categories=="all"){
				  echo lang_key($row->categories);
				  }else
				  echo get_category_title_by_id($row->categories);
				  ?></a></td>
                  <td data-title="<?php echo lang_key('advertiser');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo lang_key($row->advertiser);?></a></td>
                  <td data-title="<?php echo lang_key('start_date');?>" class="numeric"><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php  $a=$row->created_date;;  echo date('d,m,Y H:i:s',$a); ?></a></td>
                  <td data-title="<?php echo lang_key('status');?>" class="numeric">
				  <?php 
				  if (lang_key($row->status)==1 && $row->ad_type==7){?>
                  <a href="<?php echo site_url('admin/banners/edit_sponsor_message/'.$row->id);?>">
				  <i class="btn btn-success btn-md"> <?php echo lang_key('  Published  ');?> </i>
				 <?php }
				 elseif (lang_key($row->status)==1 && $row->ad_type !==7) {?>
                 <a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>">
				 <i class="btn btn-success btn-md"> <?php echo lang_key('Published');?></i> 
				 <?php }
				 else {?>
                 <a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>">
				 <i class="btn btn-warning btn-md"> <?php echo lang_key('Not Published');?></i> 
				  <?php }?>
                  </td>
                  <td data-title="<?php echo lang_key('actions');?>" class="numeric">
                    <div class="btn-group">
                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog"></i> <?php echo lang_key('action');?> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-info">
                      <?php if($row->ad_type== 7){?>
                          <li><a href="<?php echo site_url('admin/banners/edit_sponsor_message/'.$row->id);?>"><?php echo lang_key('edit');?></a></li>
                          <li><a href="<?php echo site_url('admin/banners/delete/'.$row->id);?>"><?php echo lang_key('delete');?></a></li>
                          <?php }else{?>
                          <li><a href="<?php echo site_url('admin/banners/edit/'.$row->id);?>"><?php echo lang_key('edit');?></a></li>
                          <li><a href="<?php echo site_url('admin/banners/delete/'.$row->id);?>"><?php echo lang_key('delete');?></a></li>
                          <?php }?>
                          
                      </ul>
                    </div>
                  </td>

               </tr>
            <?php $i++;
			endforeach;?> <?php //echo var_dump($posts);?>  
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