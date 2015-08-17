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
class Videos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
			$value['page']			= 'Videos';
			$data['content'] 		= load_view('videos_view',$value,TRUE);
			load_template($data,$this->active_theme);
	}
}
/* End of file install.php */
/* Location: ./application/modules/user/controllers/user.php */