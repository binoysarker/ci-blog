<?php 
/**
* 
*/
class Admin_Model extends CI_Model
{
	public function check_admin_login_info($email_address,$password)
	{
		$query = $this->db->where('email_address',$email_address)->where('password',md5($password))->get('tbl_admin');
		return $query->result_array();
	}
}