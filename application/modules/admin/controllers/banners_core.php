<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
l * BusinessDirectory Category Controller
 *
 * This class handles category management functionality
 *
 * @package		Admin
 * @subpackage	Category
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */


class Banners_core extends CI_Controller {
	
	var $per_page = 10;
	
	public function __construct()
	{
		parent::__construct();
		is_installed(); #defined in auth helper
		checksavedlogin(); #defined in auth helper
		
		if(!is_admin())
		{
			if(count($_POST)<=0)
			$this->session->set_userdata('req_url',current_url());
			redirect(site_url('admin/auth'));
		}

		$this->per_page = get_per_page_value();#defined in auth helper

		$this->load->model('banners_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="margin:0">', '</div>');
	}
	
	public function index()
	{
		$this->all();
	}

	#load all services view with paging
	public function all($start='0')
	{
		$value['posts']  	 = $this->banners_model->get_all_banners_by_range($start,'id');
        $data['title']       = lang_key('all_banners');
		$data['banners']     = $this->banners_model->get_all_banners_area();
		
        $data['content']     = load_admin_view('banners/allbanners_view',$value,TRUE);
		 load_admin_view('template/template_view',$data);		
	}

	#load new service view
	public function newbanners()
	{
        $data['title']     = lang_key('new_banners');
		$value['banners']   = $this->banners_model->get_all_banners_area();
        $data['content']   = load_admin_view('banners/newbanners_view',$value,TRUE);
		load_admin_view('template/template_view',$data);
	}
	#load new service view
	public function sponsor_message()
	{
        $data['title']     = lang_key('Sponsor Message');
		$value['banners']   = $this->banners_model->get_all_banners_area();
        $data['content']   = load_admin_view('banners/sponsor_message_view',$value,TRUE);
		load_admin_view('template/template_view',$data);
	}
	
	#load edit service view
	public function edit($id='')
	{
		$value['post']    = $this->banners_model->get_banners_by_id($id);
		$data['title']    = lang_key('edit_banners');
		$value['banners']  = $this->banners_model->get_all_banners_area();
		$data['content']  = load_admin_view('banners/editbanners_view',$value,TRUE);
		load_admin_view('template/template_view',$data);
		
	}
	#load edit sponsor message view
	public function edit_sponsor_message($id='')
	{
		$value['post']    = $this->banners_model->get_banners_by_id($id);
		$data['title']    = lang_key('edit_sponsor_message');
		$value['banners']  = $this->banners_model->get_all_banners_area();
		$data['content']  = load_admin_view('banners/edit_sponsor_message_view',$value,TRUE);
		load_admin_view('template/template_view',$data);
		
	}
	
	#delete a service
	public function delete($id='',$confirmation='')
	{
		if($confirmation=='')
		{
			$data['content'] = load_admin_view('confirmation_view',array('id'=>$id,'url'=>site_url('admin/banners/delete')),TRUE);
			 load_admin_view('template/template_view',$data);
		}
		else
		{
			if($confirmation=='yes')
			{
				if(constant("ENVIRONMENT")=='demo')
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
				}
				else
				{
					$this->banners_model->delete_banners_by_id($id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('data_updated').'</div>');
				}
			}
			redirect(site_url('admin/banners/all'));		
			
		}		
	}

	#add a service
	public function addbanners()
	{	
		$this->form_validation->set_rules('state', lang_key('state'), 'required');
		$this->form_validation->set_rules('county', lang_key('county'), 'required');
		$this->form_validation->set_rules('lower_description', lang_key('Lower (Description)'), 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->newbanners();	
		}
		else
		{
			$this->load->helper('date');
			$format = 'DATE_RFC822';
			$time = time();
			$data 					   = array();
			$data['advertiser'] 	   = $this->input->post('advertiser');			
			$data['city'] 		       = $this->input->post('state');
			$data['county'] 		   = $this->input->post('county');
			$data['categories'] 	   = $this->input->post('category');
			$data['target_area'] 	   = $this->input->post('target_area');
			$data['url'] 		       = $this->input->post('url');
			$data['lower_description'] = $this->input->post('lower_description');
			$data['width'] 	           = $this->input->post('width');
			$data['height'] 	       = $this->input->post('height');
			$data['advertesing'] 	   = $this->input->post('advertesing');
			$data['ad_type'] 	       = $this->input->post('ad_type');
			$data['impression'] 	   = $this->input->post('impression');
			$data['script_area']	   = $this->input->post('script_area');
			$data['status']			   = 1;
			$data['created_date']	  = time();
				
				$start_day 		       = $this->input->post('start_day');
				$start_month           = $this->input->post('start_month');
				$start_year	           = $this->input->post('start_year');
				$start_Hour	           = $this->input->post('start_Hour');
				$start_Min 	           = $this->input->post('start_Min');
				$end_day 	           = $this->input->post('end_day');
				$end_month 	           = $this->input->post('end_month');
				$end_year	           = $this->input->post('end_year');
				$end_Hour 	           = $this->input->post('end_Hour');
				$end_Min	           = $this->input->post('end_Min');
				$sec                   = 0;
				$data['start_date']    =mktime($start_Hour,$start_Min,$sec,$start_month,$start_day,$start_year);
				$data['end_date']      =mktime($end_day,$end_month,$end_year,$end_Hour,$end_Min);
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$this->banners_model->insert_banners($data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('data_inserted').'</div>');				
			}
			redirect(site_url('admin/banners/newbanners'));		
		}
	}
	#add a sponsor message
	public function addsponsor_message()
	{	
		$this->form_validation->set_rules('state', lang_key('state'), 'required');
		$this->form_validation->set_rules('county', lang_key('county'), 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->sponsor_message();	
		}
		else
		{
			$this->load->helper('date');
			$format = 'DATE_RFC822';
			$time = time();
			$data 					   = array();
			$data['advertiser'] 	   = $this->input->post('advertiser');
			$data['sponsor_add'] 	   = $this->input->post('sponsor_add');
			$data['show_sponsor_add']  = $this->input->post('show_sponsor_add');			
			$data['city'] 		       = $this->input->post('state');
			$data['county'] 		   = $this->input->post('county');
			$data['categories'] 	   = $this->input->post('category');
			$data['status']			   = 1;
			$data['ad_type'] 	       = 7;
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$this->banners_model->insert_banners($data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('data_inserted').'</div>');				
			}
		  redirect(site_url('admin/banners/sponsor_message'));	
			
		}
	}	
	#update a ssposor message
	public function update_sponser_message()
	{
		$this->form_validation->set_rules('state', lang_key('state'), 'required');
		$this->form_validation->set_rules('county', lang_key('county'), 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$id = $this->input->post('id');
			$this->edit_sponsor_message($id);	
		}
		else
		{
			$id = $this->input->post('id');
			$data 					   = array();
			$data['advertiser'] 	   = $this->input->post('advertiser');
			$data['sponsor_add'] 	   = $this->input->post('sponsor_add');
			$data['show_sponsor_add']  = $this->input->post('show_sponsor_add');			
             $data['city'] 		       = $this->input->post('state');
			$data['county'] 		   = $this->input->post('county');
			$data['categories'] 	   = $this->input->post('category');
			$data['status']			   = 1;
			$data['ad_type'] 	       = 7;
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				if($this->input->post('action_type')=='update')
				{
					$id = $this->input->post('id');
					$this->banners_model->update_banners($data,$id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('post_updated').'</div>');
				}
							
			} 	
			redirect(site_url('admin/banners/all/'.$id));		
		}
	}
		#update a service
	public function updatebanners()
	{
		$this->form_validation->set_rules('state', lang_key('state'), 'required');
		$this->form_validation->set_rules('county', lang_key('county'), 'required');
		$this->form_validation->set_rules('lower_description', lang_key('Lower (Description)'), 'required');   
		if ($this->form_validation->run() == FALSE)
		{
			$id = $this->input->post('id');
			$this->editbanners($id);	
		}
		else
		{
			$id = $this->input->post('id');
			$data 					   = array();
			$data['advertiser'] 	   = $this->input->post('advertiser');			
             $data['city'] 		       = $this->input->post('state');
			$data['county'] 		   = $this->input->post('county');
			$data['categories'] 	   = $this->input->post('category');
			$data['target_area'] 	   = $this->input->post('target_area');
			$data['url'] 		       = $this->input->post('url');
			$data['lower_description'] = $this->input->post('lower_description');
			$data['width'] 	           = $this->input->post('width');
			$data['height'] 	       = $this->input->post('height');
			$data['advertesing'] 	   = $this->input->post('advertesing');
			$data['ad_type'] 	       = $this->input->post('ad_type');
			$data['impression'] 	   = $this->input->post('impression');
			$data['script_area']	   = $this->input->post('script_area');
			
			
			$start_day 		       = $this->input->post('start_day');
			$start_month           = $this->input->post('start_month');
			$start_year	           = $this->input->post('start_year');
			$start_Hour	           = $this->input->post('start_Hour');
			$start_Min 	           = $this->input->post('start_Min');
			$end_day 	           = $this->input->post('end_day');
			$end_month 	           = $this->input->post('end_month');
			$end_year	           = $this->input->post('end_year');
			$end_Hour 	           = $this->input->post('end_Hour');
			$end_Min	           = $this->input->post('end_Min');
			$sec                   = 00;
			$data['created_date']	  = time();
			$data['status']			   = 1;
			$data['start_date']    =mktime($start_Hour,$start_Min,$sec,$start_month,$start_day,$start_year);
			$data['end_date']      =mktime($end_Hour,$end_Min,$sec,$end_month,$end_day,$end_year);
			//var_dump($data);
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				if($this->input->post('action_type')=='update')
				{
					$id = $this->input->post('id');
					$this->banners_model->update_banners($data,$id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('post_updated').'</div>');
				}
							
			}	
			redirect(site_url('admin/banners/all/'.$id));		
		}
	}

	public function featuredimguploader()

	{

		load_admin_view('banners/featured_img_uploader_view');

	}

	public function uploadfeaturedfile()
	{
		$dir_name 					= 'images/';
		$config['upload_path'] 		= './uploads/thumbs/';
		$config['allowed_types'] 	= 'gif|jpg|png|swf';
		$config['max_size'] 		= '5120';
		$config['min_width'] 		= '100';
		$config['min_height'] 		= '100';

		$this->load->library('dbcupload', $config);
		$this->dbcupload->display_errors('', '');

		if($this->dbcupload->do_upload('photoimg'))
		{
			$data = $this->dbcupload->data();
			$this->load->helper('date');
			$format = 'DATE_RFC822';
			$time = time();
			$media['media_name'] 		= $data['file_name'];
			$media['media_url']  		= base_url().'uploads/thumbs/'.$data['file_name'];
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
	public function select_county($id){
		
		 $id = $this->input->post('state');
		 $value =$this->banners_model->get_county_by_city_id($id);
	
		$str= '';
		$str.= "<option value=all> All</option>";
		foreach ($value as $row)
		   {
			  // echo $row->name;
		      $str.= "<option value='". $row->id."'>".$row->name."</option>";
			
		   }
		echo json_encode(array('html_str'=>$str));
		exit;
		}
	public function all_county($id)
	{
	   $str= '';
		$str.= "<option value=all> All</option>";
        foreach (get_all_locations_by_type('city')->result() as $row)
		{
            $str.= "<option value='". $row->id."'>".$row->name."</option>";;
		}
		echo json_encode(array('html_str'=>$str));
		exit;
	}
}

/* End of file admin.php */
/* Location: ./application/modules/admin/controllers/admin.php */