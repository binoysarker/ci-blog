<?php 
/**
* 
*/
class UsersController extends MY_Controller
{
	public function index()
	{
		$this->load->view('users/home');
	}
}