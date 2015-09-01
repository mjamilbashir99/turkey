<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory admin Controller
 *
 * This class handles user account related functionality
 *
 * @package		User
 * @subpackage	User
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */
require_once'user_core.php';
class User extends User_core {

	public function __construct()
	{
		parent::__construct();
	}

    public function editpost($page='0',$id='')
    {
        $value = array();
        $value['categories'] 	= $this->post_model->get_all_categories();
        $value['post']			= $this->post_model->get_post_by_id($id);
//
        $user_id = $this->session->userdata('user_id');
        $value['extra_urls']	= $this->post_model->get_extra_urls($user_id);
//
        $value['apps_data']     = $this->post_model->get_apps_data($id);
        $value['apps_data_num']  = $this->post_model->get_apps_data_num($id);
//
//
        $value['magazines_data']     = $this->post_model->get_magazines_data($id);
        $value['magazines_data_num']  = $this->post_model->get_magazines_data_num($id);

        $getresult = $value['magazines_data']->result();
        $getid = $getresult[0]->id;
        $active = 1;
        $value['issues_data']   = $this->post_model->get_issues_data($id, $getid, $active);

//
        $value['page']			= $page;
        $data['content'] 		= load_view('edit_ad_view',$value,TRUE);
        load_template($data,$this->active_theme);
    }

    public function create_ad()
    {
        $state_active = get_settings('business_settings', 'show_state_province', 'yes');

        $this->form_validation->set_rules('category', lang_key('category'), 'required');
        $this->form_validation->set_rules('phone_no', lang_key('phone'), 'required');
        $this->form_validation->set_rules('email', lang_key('email'), 'required');

        $this->form_validation->set_rules('country', 			lang_key('country'), 			'required');
        if($state_active == 'yes')
            $this->form_validation->set_rules('state', 			lang_key('state'), 				'required');

        $this->form_validation->set_rules('selected_city', 		lang_key('city'), 				'xss_clean');
        $this->form_validation->set_rules('city', 				lang_key('city'), 				'required');
        $this->form_validation->set_rules('zip_code', 			lang_key('zip_code'), 			'xss_clean');
        $this->form_validation->set_rules('address', 			lang_key('address'), 			'required');
        $this->form_validation->set_rules('latitude', 			lang_key('latitude'), 			'required');
        $this->form_validation->set_rules('longitude', 			lang_key('longitude'), 			'required');

        $this->form_validation->set_rules('title_'.default_lang(), 				lang_key('title'), 				'required');
        $this->form_validation->set_rules('description_'.default_lang(), 		lang_key('description'), 		'required');

        $this->form_validation->set_rules('featured_img', 		lang_key('featured_img'), 		'required');
        $this->create_post_validation();

        if ($this->form_validation->run() == FALSE)
        {
            $msg = '<div class="alert alert-danger form-error">'.lang_key('ad_creation_error').'</div>';
            $this->new_ad($msg);
        }
        else
        {
            $meta_search_text = '';		//meta information for simple searching

            $this->load->helper('date');
            $format = 'DATE_RFC822';
            $time = time();

            $data 						= array();
            $data['unique_id']			= uniqid();


            $data['category'] 			= $this->input->post('category');
            $meta_search_text .= get_category_title_by_id($data['category']).' ';

            $data['price_range'] 		= $this->input->post('price_range');
            $data['phone_no'] 			= $this->input->post('phone_no');
            $data['email'] 				= $this->input->post('email');
            $data['website'] 			= $this->input->post('website');
//
            $data['project_website'] 	= $this->input->post('project_website');
            $extra_url 						= array();
            $extra_url['user_id'] = $this->session->userdata('user_id');
//
            $data['founded'] 			= $this->input->post('founded');
            $meta_search_text .= $data['founded'].' ';

            $data['country'] 			= $this->input->post('country');
            $meta_search_text .= get_location_name_by_id($data['country']).' ';

            $data['state'] 				= $state_active == 'yes' ? $this->input->post('state') : 0;
            $meta_search_text .= get_location_name_by_id($data['state']).' ';

            $selected_city = $this->input->post('selected_city');
            $city = $this->input->post('city');
            if($selected_city == ''){
                $new_city_id = $this->post_model->get_location_id_by_name($city, 'city', $data['state'], $data['country']);
            }
            else{
                $new_city_id = $selected_city;
            }

            $data['city'] 				= $new_city_id;
            $meta_search_text .= get_location_name_by_id($data['city']).' ';

            $data['zip_code'] 			= $this->input->post('zip_code');
            $meta_search_text .= $data['zip_code'].' ';

            $data['address'] 			= $this->input->post('address');
            $meta_search_text .= $data['address'].' ';

            $data['latitude'] 			= $this->input->post('latitude');
            $data['longitude'] 			= $this->input->post('longitude');

            $this->load->model('admin/system_model');
            $langs = $this->system_model->get_all_langs();
            $titles = array();
            $descriptions = array();
            foreach ($langs as $lang=>$long_name)
            {
                $titles[$lang] = $this->input->post('title_'.$lang);
                $meta_search_text .= $titles[$lang].' ';

                $descriptions[$lang] = $this->input->post('description_'.$lang);
            }
            $data['title'] 			= json_encode($titles);
            $data['description'] 	= json_encode($descriptions);

            $data['tags'] 				= $this->input->post('tags');
            $meta_search_text		.=  $data['tags'].' ';

            $data['featured_img'] 		= $this->input->post('featured_img');


            $data['created_by']			= $this->session->userdata('user_id');
            $data['create_time'] 		= $time;
            $data['publish_time'] 		= $time;
            $data['last_update_time'] 	= $time;

            $publish_directly 			= get_settings('business_settings','publish_directly','Yes');
            $enable_pricing				= get_settings('package_settings','enable_pricing','Yes');

            /**************************

            status=0: post is deleted
            status=1: post is active
            status=2: post requires admin approval
            status=3: post requires payment
            status=4: post is expired

             **************************/

            if($enable_pricing=='Yes') {
                $data['status'] = 3;
            }
            else {
                $data['status']	= ($publish_directly=='Yes')?1:2; // 2 = pending
            }

            $data['featured'] 			= 0;
            $data['report'] 			= 0;
            $data['total_view'] 		= 0;
            $data['total_view'] 		= 0;
            $data['search_meta'] = $meta_search_text;

            $this->before_post_creation();

            if(constant("ENVIRONMENT")=='demo')
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
            }
            else
            {
                $post_id = $this->post_model->insert_post($data);
                $this->post_model->insert_extra_video_urls($extra_url['user_id']);
                $this->after_post_creation($post_id);

                $this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('ad_created').'</div>');
            }
            redirect(site_url('list-businessbusiness'));
        }
    }

    public function updatepost()
    {
        $state_active = get_settings('business_settings', 'show_state_province', 'yes');
        $id 	= $this->input->post('id');
        $page 	= $this->input->post('page');


        $this->form_validation->set_rules('category', lang_key('category'), 'required');
        $this->form_validation->set_rules('phone_no', lang_key('phone'), 'required');
        $this->form_validation->set_rules('email', lang_key('email'), 'required');


        $this->form_validation->set_rules('country', 			lang_key('country'), 			'required');
        if($state_active == 'yes')
            $this->form_validation->set_rules('state', 				lang_key('state'), 				'required');

        $this->form_validation->set_rules('selected_city', 		lang_key('city'), 				'xss_clean');
        $this->form_validation->set_rules('city', 				lang_key('city'), 				'required');
        $this->form_validation->set_rules('zip_code', 			lang_key('zip_code'), 			'xss_clean');
        $this->form_validation->set_rules('address', 			lang_key('address'), 			'required');
        $this->form_validation->set_rules('latitude', 			lang_key('latitude'), 			'required');
        $this->form_validation->set_rules('longitude', 			lang_key('longitude'), 			'required');

        $this->form_validation->set_rules('title_'.default_lang(), 				lang_key('title'), 				'required');
        $this->form_validation->set_rules('description_'.default_lang(), 		lang_key('description'), 		'required');

        $this->form_validation->set_rules('featured_img', 		lang_key('featured_img'), 		'required');
        $this->update_post_validation();


        if ($this->form_validation->run() == FALSE)
        {
            $this->editpost($page,$id);
        }
        else
        {
            $meta_search_text = '';		//meta information for simple searching

            $this->load->helper('date');
            $format = 'DATE_RFC822';
            $time = time();

            $data 						= array();

            $data['category'] 			= $this->input->post('category');
            $meta_search_text .= get_category_title_by_id($data['category']).' ';

            $data['price_range'] 				= $this->input->post('price_range');
            $data['phone_no'] 			= $this->input->post('phone_no');
            $data['email'] 			= $this->input->post('email');
            $data['website'] 			= $this->input->post('website');
//
            $data['project_website'] 	= $this->input->post('project_website');
//
            $data['founded'] 			= $this->input->post('founded');
            $meta_search_text .= $data['founded'].' ';

            $data['country'] 			= $this->input->post('country');
            $meta_search_text .= get_location_name_by_id($data['country']).' ';

            $data['state'] 				= $state_active == 'yes' ? $this->input->post('state') : 0;
            $meta_search_text .= get_location_name_by_id($data['state']).' ';

            $selected_city = $this->input->post('selected_city');
            $city = $this->input->post('city');
//
            $video_urls = $this->input->post('extra_video_urls');
            $new_array = array();
            $new_array = explode("+",$video_urls);
            $array_url = array('url_0'=>$new_array[0],'url_1'=>$new_array[1],'url_2'=>$new_array[2],'url_3'=>$new_array[3],'url_4'=>$new_array[4],'url_5'=>$new_array[5],'url_6'=>$new_array[6],'url_7'=>$new_array[7],'url_8'=>$new_array[8],'url_9'=>$new_array[9]);
            $user_id = $this->session->userdata('user_id');
//
            $apps = array();
            $apps_id = $this->input->post('app_num');
            $apps['post_id'] = $id;
            $apps['title'] = $this->input->post('app_title1');
            $apps['description'] = $this->input->post('app_description1');
            $apps['window'] = $this->input->post('app_window1');
            $apps['mac'] = $this->input->post('app_mac1');
            $apps['android'] = $this->input->post('app_android1');
            $apps['featured_img'] = $this->input->post('app_featured_img1');
            $apps['gallery'] = ($this->input->post('app_gallery')!=false)?json_encode($this->input->post('app_gallery')):'[]';
            $apps['tags'] = $this->input->post('app_tags1');
            $apps['qr'] = $this->input->post('app_featured_img_qr1');
//
//
            $magazines = array();
                $issues = array();
            $magazines_id = $this->input->post('magazine_num');
                $issues['magazine_id'] = $this->input->post('magazine_num');
                $issues_id = $this->input->post('issue_num');
            $magazines['post_id'] = $id;
                $issues['post_id'] = $id;
            $magazines['title'] = $this->input->post('magazine_title1');
            $magazines['description'] = $this->input->post('magazine_description1');
            $magazines['window'] = $this->input->post('magazine_window1');
            $magazines['mac'] = $this->input->post('magazine_mac1');
            $magazines['android'] = $this->input->post('magazine_android1');
//            $magazines['featured_img'] = $this->input->post('magazine_featured_img1');
                $issues['featured_img'] = $this->input->post('magazine_featured_img1');
            $magazines['gallery'] = ($this->input->post('magazine_gallery')!=false)?json_encode($this->input->post('magazine_gallery')):'[]';
            $magazines['tags'] = $this->input->post('magazine_tags1');
            $magazines['qr'] = $this->input->post('magazine_featured_img_qr1');
//            $magazines['magazine_name'] = $this->input->post('magazine_magazine_name1');
                $issues['name'] = $this->input->post('magazine_magazine_name1');
//            $magazines['magazine_url'] = $this->input->post('magazine_magazine_url1');
                $issues['url'] = $this->input->post('magazine_magazine_url1');
//            $magazines['magazine_year'] = $this->input->post('magazine_magazine_year1');
                $issues['year'] = $this->input->post('magazine_magazine_year1');
//            $magazines['magazine_month'] = $this->input->post('magazine_magazine_month1');
                $issues['month'] = $this->input->post('magazine_magazine_month1');
            $magazines['magazine_language'] = $this->input->post('magazine_magazine_language1');
            $magazines['magazine_frequency'] = $this->input->post('magazine_magazine_frequency1');
//            $magazines['issue_description'] = $this->input->post('magazine_issue_description1');
                $issues['description'] = $this->input->post('magazine_issue_description1');
                $issues['active'] = 1;
//
            if($selected_city == ''){
                $new_city_id = $this->post_model->get_location_id_by_name($city, 'city', $data['state'], $data['country']);
            }
            else{
                $new_city_id = $selected_city;
            }

            $data['city'] 				= $new_city_id;
            $meta_search_text .= get_location_name_by_id($data['city']).' ';

            $data['zip_code'] 			= $this->input->post('zip_code');
            $meta_search_text .= $data['zip_code'].' ';

            $data['address'] 			= $this->input->post('address');
            $meta_search_text .= $data['address'].' ';

            $data['latitude'] 			= $this->input->post('latitude');
            $data['longitude'] 			= $this->input->post('longitude');

            $this->load->model('admin/system_model');
            $langs = $this->system_model->get_all_langs();
            $titles = array();
            $descriptions = array();
            foreach ($langs as $lang=>$long_name)
            {
                $titles[$lang] = $this->input->post('title_'.$lang);
                $meta_search_text .= $titles[$lang].' ';

                $descriptions[$lang] = $this->input->post('description_'.$lang);
            }
            $data['title'] 			= json_encode($titles);
            $data['description'] 	= json_encode($descriptions);

            $data['tags'] 				= $this->input->post('tags');
            $meta_search_text		.=  $data['tags'].' ';

            $data['featured_img'] 		= $this->input->post('featured_img');
            $data['video_url'] 			= $this->input->post('video_url');
            $data['gallery'] 			= ($this->input->post('gallery')!=false)?json_encode($this->input->post('gallery')):'[]';


            $opening_hours = array();
            $days = $this->input->post('days');
            $opening_times = $this->input->post('opening_hour');
            $closing_times = $this->input->post('closing_hour');
            foreach($days as $key=>$day)
            {
                $opening_hour = array();
                if ($opening_times[$key] == 'Closed')
                {
                    $opening_hour['day'] = $day;
                    $opening_hour['closed'] = 1;
                    $opening_hour['start_time'] = '';
                    $opening_hour['close_time'] = '';
                }
                else
                {
                    $opening_hour['day'] = $day;
                    $opening_hour['closed'] = 0;
                    $opening_hour['start_time'] = $opening_times[$key];
                    $opening_hour['close_time'] = $closing_times[$key];
                }
                array_push($opening_hours,$opening_hour);
            }

            $data['opening_hour'] = json_encode($opening_hours);
            $data['additional_features'] = ($this->input->post('additional_features') != '') ? json_encode(array_filter($this->input->post('additional_features'))) : '[]';
            $data['last_update_time'] 	= $time;

            $data['search_meta'] = $meta_search_text;

            $this->before_post_update();

            if(constant("ENVIRONMENT")=='demo')
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
            }
            else
            {
                $post_id = $id;
                $this->post_model->update_post($data,$id);
                $this->post_model->update_video_urls($array_url,$user_id);
//
                if($apps_id == 0){
                    $this->post_model->insert_apps($apps);
                }else{
                    $this->post_model->update_apps($apps,$apps_id);
                }
//
//
                if($magazines_id == 0){
                    $this->post_model->insert_magazines($magazines);
                    $row_data = $this->post_model->get_maxid_row();
                    $getid = $row_data[0]->id;
                    $issues['magazine_id'] = $getid;

                }else{
                    $this->post_model->update_magazines($magazines,$magazines_id);
                }

                if($issues_id == 0){
                    $this->post_model->insert_issues($issues);
                }else{
                    $this->post_model->update_issues($issues,$issues_id);
                }
//
                add_post_meta($post_id,'facebook_profile',$_POST['facebook_profile']);
                add_post_meta($post_id,'twitter_profile',$_POST['twitter_profile']);
                add_post_meta($post_id,'linkedin_profile',$_POST['linkedin_profile']);
                add_post_meta($post_id,'pinterest_profile',$_POST['pinterest_profile']);
                add_post_meta($post_id,'googleplus_profile',$_POST['googleplus_profile']);
                add_post_meta($post_id,'business_logo',$this->input->post('business_logo'));
                $this->after_post_update($post_id);

                $this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('post_updated').'</div>');
            }
            redirect(site_url('edit-business/'.$page.'/'.$id));
        }
    }

    public function updateapp()
    {
        $id 	= $this->input->post('id');
        $page 	= $this->input->post('page');

        $apps = array();
        $apps['post_id'] = $id;
        $apps['title'] = $this->input->post('app_title0');
        $apps['description'] = $this->input->post('app_description0');
        $apps['window'] = $this->input->post('app_window0');
        $apps['mac'] = $this->input->post('app_mac0');
        $apps['android'] = $this->input->post('app_android0');
        $apps['featured_img'] = $this->input->post('app_featured_img0');
        $apps['gallery'] = ($this->input->post('app_gallery0')!=false)?json_encode($this->input->post('app_gallery0')):'[]';
        $apps['tags'] = $this->input->post('app_tags0');
        $apps['qr'] = $this->input->post('app_featured_img_qr0');

        if(constant("ENVIRONMENT")=='demo')
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
        }
        else
        {
            $this->post_model->insert_apps($apps);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">App Added</div>');
        }
        redirect(site_url('edit-business/'.$page.'/'.$id));

    }

    public function updatemagazine()
    {
        $id 	= $this->input->post('id');
        $page 	= $this->input->post('page');

        $magazines = array();
            $issues = array();
        $magazines['post_id'] = $id;
            $issues['post_id'] = $id;
        $magazines['title'] = $this->input->post('magazine_title0');
        $magazines['description'] = $this->input->post('magazine_description0');
        $magazines['window'] = $this->input->post('magazine_window0');
        $magazines['mac'] = $this->input->post('magazine_mac0');
        $magazines['android'] = $this->input->post('magazine_android0');
//        $magazines['featured_img'] = $this->input->post('magazine_featured_img0');
            $issues['featured_img'] = $this->input->post('magazine_featured_img0');
        $magazines['gallery'] = ($this->input->post('magazine_gallery0')!=false)?json_encode($this->input->post('magazine_gallery0')):'[]';
        $magazines['tags'] = $this->input->post('magazine_tags0');
        $magazines['qr'] = $this->input->post('magazine_featured_img_qr0');
//        $magazines['magazine_name'] = $this->input->post('magazine_magazine_name0');
            $issues['name'] = $this->input->post('magazine_magazine_name0');
//        $magazines['magazine_url'] = $this->input->post('magazine_magazine_url0');
            $issues['url'] = $this->input->post('magazine_magazine_url0');
//        $magazines['magazine_year'] = $this->input->post('magazine_magazine_year0');
            $issues['year'] = $this->input->post('magazine_magazine_year0');
//        $magazines['magazine_month'] = $this->input->post('magazine_magazine_month0');
            $issues['month'] = $this->input->post('magazine_magazine_month0');
        $magazines['magazine_language'] = $this->input->post('magazine_magazine_language0');
        $magazines['magazine_frequency'] = $this->input->post('magazine_magazine_frequency0');
//        $magazines['issue_description'] = $this->input->post('magazine_issue_description0');
            $issues['description'] = $this->input->post('magazine_issue_description0');
            $issues['active'] = 1;

        if(constant("ENVIRONMENT")=='demo')
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
        }
        else
        {
            $this->post_model->insert_magazines($magazines);

            $row_data = $this->post_model->get_maxid_row();
            $getid = $row_data[0]->id;
            $issues['magazine_id'] = $getid;

            $this->post_model->insert_issues($issues);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Magazine Added</div>');
        }
        redirect(site_url('edit-business/'.$page.'/'.$id));

    }

    public function deleteapp()
    {
        $id 	= $this->input->post('id');
        $page 	= $this->input->post('page');
        $app_id= $this->input->post('app_num1');

        if(constant("ENVIRONMENT")=='demo')
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
        }
        else
        {
            $this->post_model->delete_apps($app_id);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">App Deleted</div>');
        }
        redirect(site_url('edit-business/'.$page.'/'.$id));

    }

    public function deletemagazine()
    {
        $id 	= $this->input->post('id');
        $page 	= $this->input->post('page');
        $magazine_id= $this->input->post('magazine_num1');

        if(constant("ENVIRONMENT")=='demo')
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
        }
        else
        {
            $this->post_model->delete_magazines($magazine_id);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Magazine Deleted</div>');
        }
        redirect(site_url('edit-business/'.$page.'/'.$id));

    }

    public function app_uploadfeaturedfile()
    {

        $dir_name 					= 'images/';
        $config['upload_path'] 		= './uploads/'.$dir_name;
        $config['allowed_types'] 	= 'gif|jpg|png';
        $config['max_size'] 		= '5120';
        $config['min_width'] 		= '300';
        $config['min_height'] 		= '256';

        $this->load->library('dbcupload', $config);
        $this->dbcupload->display_errors('', '');

        if($this->dbcupload->do_upload('photoimg'))
        {

            $data = $this->dbcupload->data();
            $this->load->helper('date');
            $format = 'DATE_RFC822';
            $time = time();
            create_rectangle_thumb('./uploads/'.$dir_name.$data['file_name'],'./uploads/thumbs/');
            $media['media_name'] 		= $data['file_name'];
            $media['media_url']  		= base_url().'uploads/'.$dir_name.$data['file_name'];
            $media['create_time'] 		= standard_date($format, $time);
            $media['status']			= 1;

            $status['error'] 	= 0;
            $status['name']	= $data['file_name'];
        }
        else
        {

            $errors = $this->dbcupload->display_errors();
            $errors = str_replace('<p>','',$errors);
            $errors = str_replace('</p>','',$errors);
            $status = array('error'=>$errors,'name'=>'');
        }

        echo json_encode($status);
        die;
    }

    public function app_uploadgalleryfile()
    {

        $config['upload_path'] = './uploads/gallery/';
        $config['allowed_types'] = 'gif|jpg|JPG|png';
        $config['max_size'] = '5120';

        $this->load->library('dbcupload', $config);
        $this->dbcupload->display_errors('', '');

        if($this->dbcupload->do_upload('photoimg'))
        {

            $data = $this->dbcupload->data();
            $this->load->helper('date');
            $format = 'DATE_RFC822';
            $time = time();

            $media['media_name'] 		= $data['file_name'];
            $media['media_url']  		= base_url().'uploads/gallery/'.$data['file_name'];
            $media['create_time'] 		= standard_date($format, $time);
            $media['status']			= 1;

            $status['error'] 	= 0;
            $status['name']	= $data['file_name'];
        }
        else
        {

            $errors = $this->dbcupload->display_errors();
            $errors = str_replace('<p>','',$errors);
            $errors = str_replace('</p>','',$errors);
            $status = array('error'=>$errors,'name'=>'');
        }

        echo json_encode($status);
        die;
    }

    public function customajax()
    {
        $app_id = $_POST['app_id'];


        $sql_data = $this->post_model->get_current_app($app_id);
        $row_data = $sql_data->row();

        $result = "success";
        $app_data = array();
        $app_data['result'] = $result;
        $app_data['content'] = $row_data;
        //header('Content-Type: application/json');

        echo json_encode($app_data);
    }

    public function customajaxmagazine()
    {
        $magazine_id = $_POST['magazine_id'];


        $sql_data = $this->post_model->get_current_magazine($magazine_id);
        $row_data = $sql_data->row();

        $sql_data_issue = $this->post_model->get_current_magazine_issue($magazine_id);
        $row_data_issue = $sql_data_issue->row();

        $result = "success";
        $magazine_data = array();
        $magazine_data['result'] = $result;
        $magazine_data['content'] = $row_data;
        $magazine_data['content_issue'] = $row_data_issue;
        //header('Content-Type: application/json');

        echo json_encode($magazine_data);
    }

    public function customajaxmagazine_issue()
    {
        $magazine_id = $_POST['magazine_id'];

        $sql_data_issue = $this->post_model->get_current_magazine_issue_all($magazine_id);
        $num_rows = $sql_data_issue->num_rows();
        $row_data_issue = $sql_data_issue->result();

        $result = "success";
        $magazine_data = array();
        $magazine_data['result'] = $result;
        $magazine_data['content'] = $row_data_issue;
        $magazine_data['num_rows'] = $num_rows;
        //header('Content-Type: application/json');

        echo json_encode($magazine_data);
    }

    public function customajaxmagazine_current_issue()
    {
        $issue_id = $_POST['issue_id'];

        $sql_current_issue = $this->post_model->get_current_issue($issue_id);
        $current_issue = $sql_current_issue->result();

        $result = "success";
        $magazine_data = array();
        $magazine_data['result'] = $result;
        $magazine_data['content'] = $current_issue;
        //header('Content-Type: application/json');

        echo json_encode($magazine_data);
    }

    public function customajaxmagazine_update_issue()
    {
        $data = array();
        $id = $_POST['issue_id'];
        $data['name'] = $_POST['name'];
        $data['year'] = $_POST['year'];
        $data['month'] = $_POST['month'];
        $data['description'] = $_POST['description'];
        $data['featured_img'] = $_POST['featured_img'];
        $data['url'] = $_POST['url'];
        $data['post_id'] = $_POST['post_id'];
        $data['magazine_id'] = $_POST['magazine_id'];
        //$data['active'] = 0;

        $sql_active_row = $this->post_model->get_issues_data($data['post_id'], $data['magazine_id']);
        $get_active_row = $sql_active_row->result();
        $newarray = array();
		$newarray['active'] = 0;
		$this->post_model->update_issues_active($newarray,$get_active_row[0]->id);

        $data['active'] = 1;

        $magazine_data = array();

        if($id == 0){
            $this->post_model->insert_issues($data);

            $row_data = $this->post_model->get_maxid_row_issue();
            $getid = $row_data[0]->id;
            $magazine_data['issue_id'] = $getid;

        }
        else{
            $this->post_model->update_issues($data, $id);
            $magazine_data['issue_id'] = $id;
        }

        $result = "success";
		$magazine_data['aa'] = $aa;
        $magazine_data['result'] = $result;
 //       $magazine_data['content'] = $get_active_row[0]->id;
        //header('Content-Type: application/json');

        echo json_encode($magazine_data);
    }


}
/* End of file install.php */
/* Location: ./application/modules/user/controllers/user.php */