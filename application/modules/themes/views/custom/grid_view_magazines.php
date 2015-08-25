<?php $CI = get_instance();?>df asdf  hhfhfg hfhfj asd
<div class="img-box-4 text-center">
    <?php
    if($magazines->num_rows()<=0)
    {
        echo '<div class="alert alert-info">'.lang_key('no_posts').'</div>';
    }
    else
    {
    $i = 0;
    foreach($magazines->result() as $post){
        $i++;
        $detail_link = site_url('emagazine_details/'.$post->id);
    ?>
    <div class="col-md-4 col-sm-6">
        <div class="img-box-4-item">
            <!-- Image style one starts -->

            <div class="image-style-one">
                <!-- Image -->
                <a href="<?php echo $detail_link;?>">
                <?php $image = str_replace(array('"','[',']',"'"),array(''),$post->gallery)?>
                    <img class="img-responsive" alt="" src="<?php echo get_gallery_image('');?>">                        <!-- image hover style for image #1 -->
                </a>

            </div>

            <div class="img-box-4-content">
                <?php if($post->featured == 1){ ?>
                    <span class="hot-tag" data-toggle="tooltip" data-placement="left" data-original-title="<?php echo lang_key('featured');?>"><i class="fa fa-bookmark"></i></span>


                <?php } ?>
                <?php
                $class = "fa ";
                
                    $class .= $CI->post_model->get_category_icon($post->category);
                
                if($i%4 == 1)
                    $class .= " bg-lblue";
                else if($i%4 == 2)
                    $class .= " bg-green";
                else if($i%4 == 3)
                    $class .= " bg-orange";
                else
                    $class .= " bg-red";
                ?>
                 
               
                <h4 class="item-title"><a href="<?php echo $detail_link;?>"><?php echo $post->title;?></a></h4>
                <div class="bor bg-red"></div>
        
                 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 info-dta"><a href="<?php echo $detail_link;?>">Read | Detail</a></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>                

    <?php 
        }
    }
    ?>
</div>
<div class="clearfix"></div>
<?php  echo (isset($pages))?'<ul class="pagination">'.$pages.'</ul>':'';?>