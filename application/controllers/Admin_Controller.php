<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
/**
* 
*/
class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('admin_id');
		if ($admin_id != Null) {
			redirect('/dashboard','refresh');
		}
	}
	public function index()
		{
			$this->load->view('admin/admin_login');
		}
	public function admin_login_check()
		{
			$email_address = $this->input->post('email_address',true);
			$password = $this->input->post('password',true);
			// loading model
			$this->load->model('Admin_Model');
			$result = $this->Admin_Model->check_admin_login_info($email_address,$password);
				if ($result) {
				// $this->load->view('admin/admin_dashboard');
				foreach ($result as $key => $value) {
					$sdata['admin_id'] = $value['admin_id'];
					$sdata['admin_name'] = $value['admin_name'];
				}
				/*
				checking for admin id. If thers is admin id then you must need to logout. Other wise you will be redirected to dashboard page
				 */
				$admin_id = $this->session->userdata('admin_id');
				if ($admin_id != Null) {
					redirect('/dashboard','refresh');
				}
				/*print_r($sdata['admin_name']);
				exit();*/
				$this->session->set_userdata($sdata);
				redirect('/dashboard','refresh');
			}
			else{
				$sdata['message'] = 'your user id or password is invalid';
				$this->session->set_userdata($sdata); 
				redirect('/admin','refresh');
			}
		}		
}