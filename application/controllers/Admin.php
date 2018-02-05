<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
/**
* 
*/
class Admin extends MY_Controller
{
	public function index()
		{
			$this->load->view('admin/admin_login');
		}
		public function admin_login_check()
			{
				$this->load->view('admin/admin_dashboard');
			}	
}