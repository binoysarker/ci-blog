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
		$result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
		$result['published_post'] = $this->Super_Admin_Model->select_all_published_post();
		$data['main_content'] = $this->load->view('pages/home_content',$result,true);
		$this->load->view('layouts/master',$data);
	}
	public function show_post($post_id)
	{

		$result['get_specific_post'] = $this->Super_Admin_Model->get_specific_post($post_id);
		foreach ($result['get_specific_post'] as $key => $value) {
			$get_category_id = $value->category_id;
		}
		$result['category'] = $this->Super_Admin_Model->get_specific_category($get_category_id);
		$data['main_content'] = $this->load->view('pages/post',$result,true);
		$this->load->view('layouts/master',$data);
	}
	public function get_post_by_category($category_id)
	{
		$result['published_post'] = $this->Super_Admin_Model->post_by_category($category_id);
		$result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
		$data['main_content'] = $this->load->view('pages/home_content',$result,true);
		$this->load->view('layouts/master',$data);
	}
}
 ?>