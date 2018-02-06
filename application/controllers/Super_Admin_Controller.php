<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
* 
*/

class Super_Admin_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Super_Admin_Model');
		$admin_id = $this->session->userdata('admin_id');
		if ($admin_id == Null) {
			redirect('/admin','refresh');
		}
	}
	public function index()
	{
		$data['admin_content'] = $this->load->view('admin/pages/admin_dashboard','',true);
		$this->load->view('admin/admin_master',$data);
	}
	public function logout()
	{
		// unsetting use data sesstion
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$sdata['success_message'] = 'You are successfully logged out';
		$this->session->set_userdata($sdata);
		redirect('/admin','refresh');
	}

	// pages loading section
	public function add_category()
	{
		$data['admin_content'] = $this->load->view('admin/pages/admin_add_category','',true);
		$this->load->view('admin/admin_master',$data);
	}
	public function add_posts()
	{
		$data['admin_content'] = $this->load->view('admin/pages/admin_add_post','',true);
		$this->load->view('admin/admin_master',$data);
	}
	
	// save data
	public function save_category()
	{
		$result = $this->Super_Admin_Model->save_category_info();
		if ($result) {
			echo "successfully";
		}
		else{
			echo "not successfully";
		}
	}
}