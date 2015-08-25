<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory admin Controller
 *
 * This class handles user account related functionality
 *
 * @package		Show
 * @subpackage	Show
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */
require_once 'show_core.php';
class Show extends Show_core {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('show/show_model','show_model');
	}
	public function emagazine()
	{
		$value = array();
		$region = '';
		$category ='';
		$limit =12;
		if ( $this->input->post('search'))
		{
			$region   = $this->input->post('region');
			$category = $this->input->post('category');
			$limit    = $this->input->post('limit');
		}
		$value['all']      = $this->show_model->listMagazines('all',$region,$category,$limit);
		$value['featured'] = $this->show_model->listMagazines('featured','','',4);
		$value['module']="emagazine";
		$data['content']   = load_view('emagazines_view',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
    public function emagazine_details($id)
	{
		$value = array();
		$region = '';
		$category ='';
		$limit =12;
		$value['back']      = $this->show_model->getMagazineBackIssues($id);
		$value['featured'] = $this->show_model->listMagazines('featured','','',4);
		$value['magazine_data'] = $this->show_model->getMagazineDetails($id);
		$data['content']   = load_view('emagazines_details',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
	public function apps()
	{
		$value = array();
		$value['module']="apps";
		$region = '';
		$category ='';
		$limit =12;
		if ( $this->input->post('search'))
		{
			$region   = $this->input->post('region');
			$category = $this->input->post('category');
			$limit    = $this->input->post('limit');
		}
		$value['all']      = $this->show_model->listApps('all',$region,$category,$limit);
		$value['featured'] = $this->show_model->listApps('featured','','',4);
		$data['content']   = load_view('apps_view',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
    public function apps_details($id)
	{
		$value = array();
		$value['featured'] = $this->show_model->listApps('featured','','',4);
		$value['app_data'] = $this->show_model->getAppsDetails($id);
		$data['content']   = load_view('apps_details',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
	public function videos()
	{
		$value = array();
		$value['module']="videos";
		$region = '';
		$category ='';
		$limit =12;
		if($this->input->post('search'))
		{
			$region   = $this->input->post('region');
			$category = $this->input->post('category');
			$limit    = $this->input->post('limit');
		}
		$value['topVideo'] = $this->show_model->topVideo('latest',$region,$category);
		$value['all']      = $this->show_model->listVideos('all',$region,$category,$limit);
		$value['latest']   = $this->show_model->listVideos('latest',$region,$category,$limit);
		$value['featured'] = $this->show_model->listVideos('featured','','',$limit);
		$data['content']   = load_view('videos_view',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
}
/* End of file install.php */
/* Location: ./application/modules/show/controllers/show.php */