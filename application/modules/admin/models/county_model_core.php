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
class County_model_core extends CI_Model 
{
	var $category,$menu;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->county = array();
	}

	function get_all_parent_counties_by_range()
	{
		$this->db->order_by('id', "asc");
		$this->db->where('parent',0); 
		$this->db->where('status',1); 
		$query = $this->db->get('locations');
		return $query;
	}


	function get_all_counties_by_range($start,$sort_by='')
	{
		$this->db->order_by($sort_by, "asc");
		$this->db->where('status',1); 
		$query = $this->db->get('locations');
		return $query;
	}

	function delete_county_by_id($id)
	{
		$data['status'] = 0;
		$this->db->update('locations',$data,array('id'=>$id));
	}

	function insert_county($data)
	{
		$this->db->insert('dbc_locations',$data);
		return $this->db->insert_id();
	}

	function update_county($data,$id)
	{
		$this->db->update('locations',$data,array('id'=>$id));
	}

	function get_county_by_id($id)
	{
		$query = $this->db->get_where('locations',array('id'=>$id));
		if($query->num_rows()<=0)
		{
			echo 'Invalid county id';die;
		}
		else
		{
			return $query->row();
		}
	}

}

/* End of file category_model_core.php */
/* Location: ./system/application/models/category_model_core.php */