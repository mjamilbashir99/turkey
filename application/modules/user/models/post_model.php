<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory admin Controller
 *
 * This class handles user account related functionality
 *
 * @package		User
 * @subpackage	UserModel
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */
require_once'post_model_core.php';
class Post_model extends Post_model_core {

	public function __construct()
	{
		parent::__construct();
	}

    function get_extra_urls($user_id)
    {
        $query = $this->db->get_where('extra_video_urls',array('user_id'=>$user_id));
        if($query->num_rows()<=0)
        {
            echo 'Invalid post id';
            die;
        }
        else
        {
            return $query;
        }
    }

    function get_apps_data($id)
    {
        $query = $this->db->get_where('apps',array('post_id'=>$id));
            return $query;
    }

    function get_magazines_data($id)
    {
        $query = $this->db->get_where('magazines',array('post_id'=>$id));
            return $query;
    }

    function get_maxid_row()
    {
        $sql = "SELECT * FROM dbc_magazines ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_maxid_row_issue()
    {
        $sql = "SELECT * FROM dbc_issues ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function get_issues_data($post_id, $magazine_id, $active=1)
    {
        $query = $this->db->get_where('issues',array('post_id'=>$post_id, 'magazine_id'=>$magazine_id, 'active'=>$active));
            return $query;
    }

    function get_current_app($app_id)
    {
        $query = $this->db->get_where('apps',array('id'=>$app_id));
        return $query;
    }

    function get_current_issue($issue_id)
    {
        $query = $this->db->get_where('issues',array('id'=>$issue_id));
        return $query;
    }

    function get_issue_rows($magazine_id)
    {
        $query = $this->db->get_where('issues',array('magazine_id'=>$magazine_id));
        return $query;
    }

    function get_current_magazine($magazine_id)
    {
        $query = $this->db->get_where('magazines',array('id'=>$magazine_id));
        return $query;
    }

    function get_current_magazine_issue($magazine_id)
    {
        $query = $this->db->get_where('issues',array('magazine_id'=>$magazine_id, 'active'=>1));
        return $query;
    }

    function get_current_magazine_issue_all($magazine_id)
    {
        $query = $this->db->get_where('issues',array('magazine_id'=>$magazine_id));
        return $query;
    }

    function get_apps_data_num($id)
    {
        $query = $this->db->get_where('apps',array('post_id'=>$id));
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_magazines_data_num($id)
    {
        $query = $this->db->get_where('magazines',array('post_id'=>$id));
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function insert_extra_video_urls($data)
    {
        $query = $this->db->get_where('extra_video_urls',array('user_id'=>$data));
        if($query->num_rows()<=0)
        {
            $array_data = array();
            $array_data['user_id'] = $data;
            $this->db->insert('extra_video_urls',$array_data);
        }
    }

    function insert_apps($data)
    {
            $this->db->insert('apps',$data);
    }

    function insert_magazines($data)
    {
            $this->db->insert('magazines',$data);
    }

    function insert_issues($data)
    {
            $this->db->insert('issues',$data);
    }

    function delete_apps($app_id)
    {
            $this->db->delete('apps',array('id'=>$app_id));
    }

    function delete_magazines($magazine_id)
    {
            $this->db->delete('magazines',array('id'=>$magazine_id));
    }

    function update_video_urls($data,$id)
    {

        $this->db->update('extra_video_urls',$data,array('user_id'=>$id));
    }

    function update_apps($data,$id)
    {

        $this->db->update('apps',$data,array('id'=>$id));
    }

    function update_magazines($data,$id)
    {

        $this->db->update('magazines',$data,array('id'=>$id));
    }

    function update_issues($data,$id)
    {

        $this->db->update('issues',$data,array('id'=>$id));
    }

	function update_issues_active($data,$id)
    {
        $this->db->update('issues',$data,array('id'=>$id));
    }

}
/* End of file install.php */
/* Location: ./application/modules/user/models/user_model.php */