<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory admin Controller
 *
 * This class handles user account related functionality
 *
 * @package		Show
 * @subpackage	ShowModel
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */
require_once'show_model_core.php';
class Show_model extends Show_model_core {

	public function __construct()
	{
		parent::__construct();
	}
 function listMagazines($type='all',$region='',$category='',$limit=18)
 {
  $this->db->select('magazines.*,posts.category,posts.city,magazines.id as mag_id');
  $this->db->from('magazines');
  $this->db->join('posts', 'posts.id = magazines.post_id');
  $this->db->limit($limit);
  if($type!='all')
   $this->db->where('posts.featured',1);
     if($region!='')
   $this->db->where('posts.city', $region);  
     if($category!='')
     $this->db->where('posts.category', $category); 

  $this->db->order_by("magazines.id","desc");  
  $this->db->group_by("magazines.id");   
  $query = $this->db->get();
  return $query->result();
 }
 function get_all_magazines_user_id($created_by)
 {
  $this->db->select('magazines.*,posts.category,posts.city,magazines.id as emag_id');
  $this->db->from('magazines');
  $this->db->join('posts', 'posts.id = magazines.post_id');
  $this->db->limit($limit);
  $this->db->where('posts.created_by', $created_by); 
  $this->db->order_by("magazines.id","desc");  
  $this->db->group_by("magazines.id");   
  $query = $this->db->get();
  return $query->result();
 }
 function getMagazineDetails($id)
 {
  $select = 'magazines.*,issues.id as mag_id,issues.*,issues.featured_img as issue_image,posts.category,posts.created_by,posts.title,';
  $select .= 'magazines.title as mag_title,magazines.description as mag_description,issues.description as issue_description';
  $this->db->select($select);
  $this->db->from('magazines');
  $this->db->join('posts', 'posts.id = magazines.post_id');
  $this->db->join('issues', 'issues.magazine_id = magazines.id');
  $this->db->where('issues.id', $id); 
  $query = $this->db->get();
  return $query->row();
 }
	
	function getMagazineBackIssues($id)
	{
		$this->db->select('magazines.*,magazines.id as mag_id,issues.*');
		$this->db->from('magazines');
		$this->db->join('issues', 'issues.magazine_id = magazines.id');
		$this->db->where('magazines.id', $id);
		$this->db->order_by("issues.id","desc");    
		$query = $this->db->get();
		return $query->result();
	}
	function listApps($type='all',$region='',$category='',$limit=18)
	{
			
		$this->db->select('apps.*,posts.category,posts.city');
		$this->db->from('apps');
		$this->db->join('posts', 'posts.id = apps.post_id');
		$this->db->limit($limit);
		if($type!='all')
			$this->db->where('posts.featured',1);
	    if($region!='')
			$this->db->where('posts.state', $region);		
	    if($category!='')
		   $this->db->where('posts.category', $category); 
		$this->db->order_by('apps.id', "desc");    
		$query = $this->db->get();
		return $query->result();
	}
	function getAppsDetails($id)
	{
		$this->db->select('apps.*,apps.title as app_title,apps.description as app_description,apps.featured_img as app_img,apps.gallery as app_gallery,posts.*');
		$this->db->from('apps');
		$this->db->join('posts', 'posts.id = apps.post_id');
		$this->db->where('apps.id', $id); 
		$query = $this->db->get();
		return $query->row();
	}
	function listVideos($type='all',$region='',$category='',$limit=18)
	{
			
		$this->db->select('dbc_extra_video_urls.*,dbc_extra_video_urls.id as video_id,posts.category,posts.city,posts.video_url,posts.title,posts.last_update_time,posts.id as post_id,posts.created_by as created_by');
		$this->db->from('posts');
		$this->db->join('dbc_extra_video_urls','posts.created_by = dbc_extra_video_urls.user_id','left');
		$this->db->limit($limit);
		//$this->db->group_by('dbc_extra_video_urls.id');
		if($type=='featured')
			$this->db->where('posts.featured',1);
	    if($region!='')
			$this->db->where('posts.state', $region);		
	    if($category!='')
		   $this->db->where('posts.category', $category); 
		if($type=='latest')
		   $this->db->order_by('posts.total_view desc');
		else
		  $this->db->order_by('posts.id desc');   
		$query = $this->db->get();
		return $query->result();
	}
	function topVideo($type='latest',$region='',$category='',$post_id=0)
	{
		$this->db->select('dbc_extra_video_urls.*,dbc_extra_video_urls.id as video_id,posts.category,posts.city,posts.video_url,posts.title,posts.last_update_time,posts.id as post_id');
		$this->db->from('posts');
		$this->db->join('dbc_extra_video_urls','posts.created_by = dbc_extra_video_urls.user_id','left');
		$this->db->limit(1);
	   if($post_id!=0)
			$this->db->where('posts.id', $post_id);
		if($region!='')
			$this->db->where('posts.state', $region);		
	    if($category!='')
		   $this->db->where('posts.category', $category); 
		$this->db->where('video_url !=','');
		if($type=='latest')
		   $this->db->order_by('posts.total_view desc');
		else
		  $this->db->order_by('posts.id desc');   
		$query = $this->db->get();
		return $query->row();
	}
}
/* End of file install.php */
/* Location: ./application/modules/show/models/show_model.php */