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
		// loading model
		$this->load->model('Admin_Model');
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
			// form validation seection 
			$this->form_validation->set_rules('email_address','Email Address','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|alpha_numeric|max_length[6]');
			$this->form_validation->run();
			if ($this->form_validation->run() == FALSE) {
				// there is some problem so redirect back
				$this->load->view('admin/admin_login');
			}
			else{
				$email_address = $this->input->post('email_address',true);
				$password = $this->input->post('password',true);
				
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
					
					$this->session->set_userdata($sdata);
					redirect('/dashboard','refresh');
				}
				else{
					$sdata['message'] = 'your user id or password is invalid';
					$this->session->set_userdata($sdata); 
					redirect('/admin','refresh');
				}
				redirect('/dashboard','refresh');
			}

			
		}		
}