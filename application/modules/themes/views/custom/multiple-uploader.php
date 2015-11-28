
<form id="uploader-form" action="<?php echo site_url('user/uploadgalleryfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg[]" id="photoimg" style="height:auto;" multiple>
</form>

<form id="featured-uploader-form" action="<?php echo site_url('user/uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="photoimg_featured" style="height:auto;" >
</form>
<!-- ******************************** app ********************************************** -->
<!-- app featured img -->
<form id="app_featured-uploader-form" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="app_photoimg_featured" style="height:auto;" >
</form>

<!-- app gallery img -->
<form id="app_uploader-form" action="<?php echo site_url('user/uploadgalleryfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="app_photoimg[]" id="app_photoimg" style="height:auto;" multiple>
</form>

<!-- app qr img -->
<form id="app_featured-uploader-form_qr" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="app_photoimg_featured_qr" style="height:auto;" >
</form>

<!-- ********************************** app new ******************************************** -->
<!-- app_new featured img -->
<form id="app_featured-uploader-form0" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg0" id="app_photoimg_featured0" style="height:auto;" >
</form>

<!-- app_new gallery img -->
<form id="app_uploader-form0" action="<?php echo site_url('user/uploadgalleryfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="app_photoimg0[]" id="app_photoimg0" style="height:auto;" multiple>
</form>

<!-- app_new qr img -->
<form id="app_featured-uploader-form_qr0" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg_qr0" id="app_photoimg_featured_qr0" style="height:auto;" >
</form>

<!-- ************************************ magazine ************************************************** -->
<!-- magazine featured img -->
<form id="magazine_featured-uploader-form" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="magazine_photoimg_featured" style="height:auto;" >
</form>

<!-- magazine featured img issue-->
<form id="magazine_issue_featured-uploader-form" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="magazine_issue_photoimg_featured" style="height:auto;" >
</form>

<!-- magazine gallery img -->
<form id="magazine_uploader-form" action="<?php echo site_url('user/uploadgalleryfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="magazine_photoimg[]" id="magazine_photoimg" style="height:auto;" multiple>
</form>

<!-- magazine qr img -->
<form id="magazine_featured-uploader-form_qr" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="magazine_photoimg_featured_qr" style="height:auto;" >
</form>

<!-- ********************************** magazine new ******************************************* -->
<!-- magazine_new featured img -->
<form id="magazine_featured-uploader-form0" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg0" id="magazine_photoimg_featured0" style="height:auto;" >
</form>

<!-- magazine_new gallery img -->
<form id="magazine_uploader-form0" action="<?php echo site_url('user/uploadgalleryfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="magazine_photoimg0[]" id="magazine_photoimg0" style="height:auto;" multiple>
</form>

<!-- magazine_new qr img -->
<form id="magazine_featured-uploader-form_qr0" action="<?php echo site_url('user/app_uploadfeaturedfile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg_qr0" id="magazine_photoimg_featured_qr0" style="height:auto;" >
</form>

<!-- ****************************************************************************** -->
<form id="logo-uploader-form" action="<?php echo site_url('user/uploadlogofile');?>" method="post" enctype="multipart/form-data" style="display:none">
    <input type="file" name="photoimg" id="photoimg_logo" style="height:auto;" >
</form>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body">
                <div class="progress span3 progress-bar-span">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>
            </div>
        </div>    
    </div>    
</div>    


<style type="text/css">
.bar{
    background: none repeat scroll 0 0 #78a;
    border-radius: 3px;
    height: 17px;
}
</style>

<script type="text/javascript">
jQuery(document).ready(function(){
    var feature_img_progress = 0;
    var pre_loader;
    var post_loader;

// ****************************************************************************** //

// -- form gallery (basic) -- //
    jQuery('#photoimg').change(function(){
        var files = $("#photoimg")[0].files;
        custom_handleFileUpload(files,$("#dragandrophandler"), 'photoimg');
    });
// =========================== //

// -- form gallery (app) -- //
    jQuery('#app_photoimg').change(function(){
        var files = $("#app_photoimg")[0].files;
        custom_handleFileUpload(files,$("#app_dragandrophandler"), 'app_photoimg');
   });
// ============================= //

// -- form gallery (app_new) --//
    jQuery('#app_photoimg0').change(function(){
        var files = $("#app_photoimg0")[0].files;
        custom_handleFileUpload(files,$("#app_dragandrophandler0"), 'app_photoimg0');
   });
// ================================== //

// -- form gallery (magazine) -- //
    jQuery('#magazine_photoimg').change(function(){
        var files = $("#magazine_photoimg")[0].files;
        custom_handleFileUpload(files,$("#magazine_dragandrophandler"), 'magazine_photoimg');
    });
// ============================= //

// -- form gallery (magazine_new) --//
    jQuery('#magazine_photoimg0').change(function(){
        var files = $("#magazine_photoimg0")[0].files;
        custom_handleFileUpload(files,$("#magazine_dragandrophandler0"), 'magazine_photoimg0');
    });
// ================================== //

// **************************************************************************************** //

// -- form img (basic) -- //
    jQuery('#photoimg_featured').change(function(){
        
            var formData = new FormData();
            var files = $("#photoimg_featured")[0].files;
            formData.append('photoimg', files[0]);

            var uploadURL = '<?php echo site_url("user/uploadfeaturedfile");?>'; //Upload URL
            var extraData ={}; //Extra Data.
            var jqXHR=$.ajax({
                    xhr: function() {
                    var xhrobj = $.ajaxSettings.xhr();
                    if (xhrobj.upload) {
                            xhrobj.upload.addEventListener('progress', function(event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = (position / total * 100);
                                    var percentVal = percent+'%';
                                    jQuery('#myModal .bar').width(percentVal);
                                    jQuery('#myModal .percent').html(percentVal); 
                                }
                                
                            }, false);
                        }
                    return xhrobj;
                },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {
                    jQuery('#myModal').modal('show');
                    var percentVal = '0%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);   
                },
                success: function(data){
                 
                    var percentVal = '100%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);

                    var response = jQuery.parseJSON(data);
                    if(response.error==0)
                    {
                        jQuery('#featured-img-input').val(response.name);
                        jQuery('#featured-img-input').trigger('change');
                        jQuery('#myModal').modal('hide');

                    }
                    else
                    {
                        if(response.error){
                            var massage = response.error;
                            jQuery('#myModal').modal('hide');
                            alert(massage);
                        }
                    }
                    jQuery('#myModal').modal('hide');               
                }
            });

    });
// ========================================================== //

// -- form img (app) -- //
    jQuery('#app_photoimg_featured').change(function(){

            var formData = new FormData();
            var files = $("#app_photoimg_featured")[0].files;
            formData.append('photoimg', files[0]);

            var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
            var extraData ={}; //Extra Data.
            var jqXHR=$.ajax({
                    xhr: function() {
                    var xhrobj = $.ajaxSettings.xhr();
                    if (xhrobj.upload) {
                            xhrobj.upload.addEventListener('progress', function(event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = (position / total * 100);
                                    var percentVal = percent+'%';
                                    jQuery('#myModal .bar').width(percentVal);
                                    jQuery('#myModal .percent').html(percentVal);
                                }

                            }, false);
                        }
                    return xhrobj;
                },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {
                    jQuery('#myModal').modal('show');
                    var percentVal = '0%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);
                },
                success: function(data){

                    var percentVal = '100%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);

                    var response = jQuery.parseJSON(data);
                    if(response.error==0)
                    {
                        jQuery('#app_featured-img-input1').val(response.name);
                        jQuery('#app_featured-img-input1').trigger('change');
                        jQuery('#myModal').modal('hide');

                    }
                    else
                    {
                        if(response.error){
                            var massage = response.error;
                            jQuery('#myModal').modal('hide');
                            alert(massage);
                        }
                    }
                    jQuery('#myModal').modal('hide');
                }
            });

    });
// ===================================================== //

// -- form img (app_qr) -- //
    jQuery('#app_photoimg_featured_qr').change(function(){

        var formData = new FormData();
        var files = $("#app_photoimg_featured_qr")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#app_featured-img-input_qr1').val(response.name);
                    jQuery('#app_featured-img-input_qr1').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// =============================================================== //

// -- form img (app_new) -- //
    jQuery('#app_photoimg_featured0').change(function(){

            var formData = new FormData();
            var files = $("#app_photoimg_featured0")[0].files;
            formData.append('photoimg', files[0]);

            var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
            var extraData ={}; //Extra Data.
            var jqXHR=$.ajax({
                    xhr: function() {
                    var xhrobj = $.ajaxSettings.xhr();
                    if (xhrobj.upload) {
                            xhrobj.upload.addEventListener('progress', function(event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = (position / total * 100);
                                    var percentVal = percent+'%';
                                    jQuery('#myModal .bar').width(percentVal);
                                    jQuery('#myModal .percent').html(percentVal);
                                }

                            }, false);
                        }
                    return xhrobj;
                },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {
                    jQuery('#myModal').modal('show');
                    var percentVal = '0%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);
                },
                success: function(data){

                    var percentVal = '100%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);

                    var response = jQuery.parseJSON(data);
                    if(response.error==0)
                    {
                        jQuery('#app_featured-img-input0').val(response.name);
                        jQuery('#app_featured-img-input0').trigger('change');
                        jQuery('#myModal').modal('hide');

                    }
                    else
                    {
                        if(response.error){
                            var massage = response.error;
                            jQuery('#myModal').modal('hide');
                            alert(massage);
                        }
                    }
                    jQuery('#myModal').modal('hide');
                }
            });

    });
// ======================================================== //

// -- form img (app_new_qr) -- //
    jQuery('#app_photoimg_featured_qr0').change(function(){

        var formData = new FormData();
        var files = $("#app_photoimg_featured_qr0")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#app_featured-img-input_qr0').val(response.name);
                    jQuery('#app_featured-img-input_qr0').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// ============================================================== //
// -- form img (magazine) -- //
    jQuery('#magazine_photoimg_featured').change(function(){

        var formData = new FormData();
        var files = $("#magazine_photoimg_featured")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#magazine_featured-img-input1').val(response.name);
                    jQuery('#magazine_featured-img-input1').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// ===================================================== //

// -- form img (magazine_issue) -- //
    jQuery('#magazine_issue_photoimg_featured').change(function(){

        var formData = new FormData();
        var files = $("#magazine_issue_photoimg_featured")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#magazine_featured-img-input_issue').val(response.name);
                    jQuery('#magazine_featured-img-input_issue').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// ===================================================== //

// -- form img (magazine_qr) -- //
    jQuery('#magazine_photoimg_featured_qr').change(function(){

        var formData = new FormData();
        var files = $("#magazine_photoimg_featured_qr")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#magazine_featured-img-input_qr1').val(response.name);
                    jQuery('#magazine_featured-img-input_qr1').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// =============================================================== //

// -- form img (magazine_new) -- //
    jQuery('#magazine_photoimg_featured0').change(function(){

        var formData = new FormData();
        var files = $("#magazine_photoimg_featured0")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#magazine_featured-img-input0').val(response.name);
                    jQuery('#magazine_featured-img-input0').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// ======================================================== //

// -- form img (magazine_new_qr) -- //
    jQuery('#magazine_photoimg_featured_qr0').change(function(){

        var formData = new FormData();
        var files = $("#magazine_photoimg_featured_qr0")[0].files;
        formData.append('photoimg', files[0]);

        var uploadURL = '<?php echo site_url("user/app_uploadfeaturedfile");?>'; //Upload URL
        var extraData ={}; //Extra Data.
        var jqXHR=$.ajax({
            xhr: function() {
                var xhrobj = $.ajaxSettings.xhr();
                if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = (position / total * 100);
                            var percentVal = percent+'%';
                            jQuery('#myModal .bar').width(percentVal);
                            jQuery('#myModal .percent').html(percentVal);
                        }

                    }, false);
                }
                return xhrobj;
            },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {
                jQuery('#myModal').modal('show');
                var percentVal = '0%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);
            },
            success: function(data){

                var percentVal = '100%';
                jQuery('#myModal .bar').width(percentVal);
                jQuery('#myModal .percent').html(percentVal);

                var response = jQuery.parseJSON(data);
                if(response.error==0)
                {
                    jQuery('#magazine_featured-img-input_qr0').val(response.name);
                    jQuery('#magazine_featured-img-input_qr0').trigger('change');
                    jQuery('#myModal').modal('hide');

                }
                else
                {
                    if(response.error){
                        var massage = response.error;
                        jQuery('#myModal').modal('hide');
                        alert(massage);
                    }
                }
                jQuery('#myModal').modal('hide');
            }
        });

    });
// ============================================================== //
// ************************************************************************************************************ //

// -- form img (basic logo) -- //
    jQuery('#photoimg_logo').change(function(){
        
            var formData = new FormData();
            var files = $("#photoimg_logo")[0].files;
            formData.append('photoimg', files[0]);

            var uploadURL = '<?php echo site_url("user/uploadlogofile");?>'; //Upload URL
            var extraData ={}; //Extra Data.
            var jqXHR=$.ajax({
                    xhr: function() {
                    var xhrobj = $.ajaxSettings.xhr();
                    if (xhrobj.upload) {
                            xhrobj.upload.addEventListener('progress', function(event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = (position / total * 100);
                                    var percentVal = percent+'%';
                                    jQuery('#myModal .bar').width(percentVal);
                                    jQuery('#myModal .percent').html(percentVal); 
                                }
                                
                            }, false);
                        }
                    return xhrobj;
                },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {
                    jQuery('#myModal').modal('show');
                    var percentVal = '0%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);   
                },
                success: function(data){
                 
                    var percentVal = '100%';
                    jQuery('#myModal .bar').width(percentVal);
                    jQuery('#myModal .percent').html(percentVal);

                    var response = jQuery.parseJSON(data);
                    if(response.error==0)
                    {
                        jQuery('#business-logo-input').val(response.name);
                        jQuery('#business-logo-input').trigger('change');
                        jQuery('#myModal').modal('hide');

                    }
                    else
                    {
                        if(response.error){
                            var massage = response.error;
                            jQuery('#myModal').modal('hide');
                            alert(massage);
                        }
                    }
                    jQuery('#myModal').modal('hide');               
                }
            });

    });
// ==================================================== //

});
</script>