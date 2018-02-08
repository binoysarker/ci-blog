<?php
defined('BASEPATH') OR exit('No direct script access allowed');   
/**
* 
*/
class Home_Controller extends CI_Controller
{
	
	public function index()
	{
		$result['published_post'] = $this->Super_Admin_Model->select_all_published_post();
		$result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
		$data['main_content'] = $this->load->view('pages/home_content',$result,true);
		$this->load->view('layouts/master',$data);
	}
	public function contact()
	{
		$data['main_content'] = $this->load->view('pages/contact','',true);
		$this->load->view('layouts/master',$data);
	}
	public function about()
	{
		$data['main_content'] = $this->load->view('pages/about','',true);
		$this->load->view('layouts/master',$data);
	}
	public function posts()
	{
		$data['main_content'] = $this->load->view('pages/post','',true);
		$this->load->view('layouts/master',$data);
	}
}
 ?>