<?php
defined('BASEPATH') OR exit('No direct script access allowed');   
/**
* 
*/
class Home extends MY_Controller
{
	
	public function index()
	{
		$data['main_content'] = $this->load->view('pages/home_content','',true);
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