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
		$limit =18;
		if($this->input->get('category'))
		    $category =$this->input->get('category');
		if($this->input->get('region'))
		    $region =$this->input->get('region');
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
		$limit =18;
		$value['magazine_data'] = $this->show_model->getMagazineDetails($id);
		$value['module']="emagazine";
   		$magazine_id=$value['magazine_data']->magazine_id;
		$value['back']      = $this->show_model->getMagazineBackIssues($magazine_id);
		$value['featured'] = $this->show_model->listMagazines('featured','','',4);
		$data['content']   = load_view('emagazines_details',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
	public function ajax_emagazine_details()
	{
		$value = array();
        if($this->input->post('mag_id'))
		    $id = $this->input->post('mag_id');
		else	
			$id=0;
		$row = $this->show_model->getMagazineDetails($id);
		//var_dump($row);
		$value = (array) $row;
		$value['mag_image']= get_app_large_image($row->issue_image);
		$images = json_decode($value['gallery']);
		$gallery_images ='';
		 for($img=0;$img<count($images);$img++){
        $gallery_images .='<li>';
		$gallery_images .='<div class="mtop">';
		$gallery_images .='<a href="'.get_gallery_image($images[$img]).'" class="lightbox">';
		$gallery_images .='<img src="'.get_gallery_image($images[$img]).'" width="84" height="100"/>';
		$gallery_images .='	</a>';
		$gallery_images .='</div>';
		$gallery_images .='</li>';
        }
		$value['gallery_images']=$gallery_images;
		
		echo json_encode($value);
		exit;
	}
	public function ajax_emagazine_issues()
	{
		$value = array();
        if($this->input->post('pid'))
		    $id = $this->input->post('pid');
		else	
			$id=0;
		$issues = $this->show_model->get_issues_post_id($id);
		$n=count($issues); 
		$str = '';            
		foreach ($issues as $issue) 
		{
			$str .= '<a class="publications" href="'.$issue->id.'" rel="'.$issue->magazine_id.'">'.$issue->name.' '.$n--.'</a> |';
		} 
		echo json_encode(array('issues_str'=>$str));
		exit;
	}
	public function apps()
	{
		$value = array();
		$value['module']="apps";
		$region = '';
		$category ='';
		$limit =18;
		if($this->input->get('category'))
		    $category =$this->input->get('category');
		if($this->input->get('region'))
		    $region =$this->input->get('region');
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
		$value['module']="apps";
		$value['featured'] = $this->show_model->listApps('featured','','',4);
		$value['app_data'] = $this->show_model->getAppsDetails($id);
		$data['content']   = load_view('apps_details',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
	public function ajax_apps_details()
	{
        $value = array();
	
        if($this->input->post('app_id'))
		    $id = $this->input->post('app_id');
		else	
			$id=0;
		$row = $this->show_model->getAppsDetails($id);
		//var_dump($row);
		$value = (array) $row;
		$value['featured_image']= get_app_large_image($row->app_img);
		$images = json_decode($value['app_gallery']);
		$gallery_images ='';
		 for($img=0;$img<count($images);$img++){
        $gallery_images .='<li>';
		$gallery_images .='<div class="mtop">';
		$gallery_images .='<a href="'.get_gallery_image($images[$img]).'" class="lightbox">';
		$gallery_images .='<img src="'.get_gallery_image($images[$img]).'" width="84" height="100"/>';
		$gallery_images .='	</a>';
		$gallery_images .='</div>';
		$gallery_images .='</li>';
        }
		$value['gallery_images']=$gallery_images;
		echo json_encode($value);
		exit;
	
	
	
	
	}
	public function videos()
	{
		$value = array();
		$value['module']="videos";
		$value['current_video_id']='';
		$region = '';
		$category ='';
		$limit =18;
		if($this->input->get('category'))
		    $category =$this->input->get('category');
		if($this->input->get('region'))
		    $region =$this->input->get('region');
		if($this->input->post('search'))
		{
			$region   = $this->input->post('region');
			$category = $this->input->post('category');
			$limit    = $this->input->post('limit');
			$value['topVideo'] = $this->show_model->topVideo('latest',$region,$category);
		}
		elseif($this->input->get('watch'))
		{
			$watch = $this->input->get('watch');
			$tmp_array = explode("-",$watch);
			$main_video_id = $tmp_array[0];
			if(count($tmp_array)>1)
			{
			   $sub_video_id = $tmp_array[1];
			   $value['current_video_id']=$sub_video_id;
			}
			 $value['topVideo'] = $this->show_model->topVideo('latest',$region,$category,$main_video_id);
		}
		else
		{
			$value['topVideo'] = $this->show_model->topVideo('latest',$region,$category);
		}
		$value['all']      = $this->show_model->listVideos('all',$region,$category,$limit);
		$value['latest']   = $this->show_model->listVideos('latest',$region,$category,$limit);
		//var_dump($value['latest']);
		$value['featured'] = $this->show_model->listVideos('featured','','',$limit);
	
		$data['content']   = load_view('videos_view',$value,TRUE);
		load_template($data,$this->active_theme);
		//$this->output->enable_profiler(TRUE);
	}
}
/* End of file install.php */
/* Location: ./application/modules/show/controllers/show.php */