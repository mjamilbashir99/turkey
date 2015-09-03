<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory category_model_core model
 *
 * This class handles category_model_core management related functionality
 *
 * @package		Admin
 * @subpackage	category_model_core
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */
class Banners_model_core extends CI_Model 
{
	var $advertes,$menu;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->advertes = array();
	}

	function get_all_parent_banners_by_range()
	{
		$this->db->order_by('id', "asc");
		$this->db->where('parent',0); 
		//$this->db->where('status',1); 
		$query = $this->db->get('dbc_advertesing');
		return $query;
	}
	
	function get_all_banners_by_range($start,$sort_by='')
	{
		$this->db->order_by($sort_by, "asc");
		$this->db->where('status',1); 
		$query = $this->db->get('dbc_advertesing');
		return $query;
	}
	
	
	
	/*function get_all_banners_area()
	{
		$query = $this->db->get('dbc_banners_area');
		return $query;
	}
	*/
	function get_all_banners_area()
	{
		$banners = array();
		$this->db->select('*');
		$this->db->from('dbc_banners_area');
		$query = $this->db->get();
		return $banners = $query->result();
	}
	

	function delete_banners_by_id($id)
	{
		$data['status'] = 0;
		$this->db->update('dbc_advertesing',$data,array('id'=>$id));
	}

	function insert_banners($data)
	{
		$this->db->insert('dbc_advertesing',$data);
		return $this->db->insert_id();
	}

	function update_banners($data,$id)
	{
		$this->db->update('dbc_advertesing',$data,array('id'=>$id));
	}

	function get_banners_by_id($id)
	{
		$query = $this->db->get_where('dbc_advertesing',array('id'=>$id));
		if($query->num_rows()<=0)
		{
			echo 'Invalid banners id';die;
		}
		else
		{
			return $query->row();
		}
	}

}

/* End of file category_model_core.php */
/* Location: ./system/application/models/category_model_core.php */