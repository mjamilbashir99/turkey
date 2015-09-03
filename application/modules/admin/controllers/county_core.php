<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory Category Controller
 *
 * This class handles category management functionality
 *
 * @package		Admin
 * @subpackage	Category
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */


class County_core extends CI_Controller {
	
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

		$this->load->model('county_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="margin:0">', '</div>');
	}
	
	public function index()
	{
		$this->all();
	}

	#load all services view with paging
	public function all($start='0')
	{
		$value['posts']  	 = $this->county_model->get_all_counties_by_range($start,'id');
        $data['title'] = lang_key('all_counties');
        $data['content'] = load_admin_view('counties/allcounties_view',$value,TRUE);
		 load_admin_view('template/template_view',$data);		
	}

	#load new service view
	public function newcounty()
	{
        $data['title'] = lang_key('new_county');
        $data['content'] = load_admin_view('counties/newcounty_view','',TRUE);
		load_admin_view('template/template_view',$data);
	}
	
	#load edit service view
	public function edit($id='')
	{
		$value['post']  = $this->county_model->get_county_by_id($id);
		$data['title'] = lang_key('edit_county');
		$data['content'] = load_admin_view('counties/editcounty_view',$value,TRUE);
		load_admin_view('template/template_view',$data);		
	}
	
	#delete a service
	public function delete($id='',$confirmation='')
	{
		if($confirmation=='')
		{
			$data['content'] = load_admin_view('confirmation_view',array('id'=>$id,'url'=>site_url('admin/county/delete')),TRUE);
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
					$this->county_model->delete_county_by_id($id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('data_updated').'</div>');
				}
			}
			redirect(site_url('admin/county/all'));		
			
		}		
	}

	#add a service
	public function addcounty()
	{	
		//echo 'I am hear'; exit;
		$this->form_validation->set_rules('state', lang_key('county'), 'required');
		$this->form_validation->set_rules('city', lang_key('select_city'), 'required');
		$this->form_validation->set_rules('featured_img', lang_key('featured_img'), 'required');

		if ($this->form_validation->run() == FALSE)
		{
		
			$this->newcounty();	
		}
		else
		{
			
			$this->load->helper('date');
			$format = 'DATE_RFC822';
			$time = time();
			$data 					= array();	
			$data['parent_country'] = 92;
		    $data['parent']         = $this->input->post('state');
			$data['name'] 	        = $this->input->post('city');
			$data['type']           = 'city';
			$data['featured_img'] 	= $this->input->post('featured_img');
			$data['status']			= 1;
			$this->load->model('admin/system_model');
            $langs = $this->system_model->get_all_langs();
            $descriptions = array();
            foreach ($langs as $lang=>$long_name)
            { 
            	$descriptions[$lang] = $this->input->post('description_'.$lang);
            }        	
			$data['description'] 	 = json_encode($descriptions);
			
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$this->county_model->insert_county($data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('data_inserted').'</div>');				
			}
			redirect(site_url('admin/county/newcounty'));		
		}
	}
	
	
	#update a service
	public function updatecounty()
	{
		
		$this->form_validation->set_rules('state', lang_key('county'), 'required');
		$this->form_validation->set_rules('city', lang_key('select_city'), 'required');
		$this->form_validation->set_rules('featured_img', lang_key('featured_img'), 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$id = $this->input->post('id');
			$this->editcounty($id);	
		}
		else
		{
			$id = $this->input->post('id');

		$this->load->helper('date');
			$format = 'DATE_RFC822';
			$time = time();
			$data 					= array();			
			$data['parent_country'] = 92;
		    $data['parent']         = $this->input->post('state');
			$data['name'] 	        = $this->input->post('city');
			$data['type']           = 'city';
			$data['featured_img'] 	= $this->input->post('featured_img');
			$data['status']			= 1;
			$this->load->model('admin/system_model');
            $langs = $this->system_model->get_all_langs();
            $descriptions = array();
            foreach ($langs as $lang=>$long_name)
            { 
            	$descriptions[$lang] = $this->input->post('description_'.$lang);
            }        	
			$data['description'] 	 = json_encode($descriptions);
			
			if(constant("ENVIRONMENT")=='demo')
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
			}
			else
			{
				$this->county_model->update_county($data,$id);
				$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('data_updated').'</div>');
			}
			redirect(site_url('admin/county/edit/'.$id));		
		}
	}

	public function featuredimguploader()

	{

		load_admin_view('counties/featured_img_uploader_view');

	}

	public function uploadfeaturedfile()
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

}

/* End of file admin.php */
/* Location: ./application/modules/admin/controllers/admin.php */