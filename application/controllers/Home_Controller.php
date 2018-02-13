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
		// get data from the comments table
		$result['comments'] = $this->Super_Admin_Model->get_comment_by_post($post_id);
		$result['replies'] = $this->Super_Admin_Model->get_reply_by_post($post_id);
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
	public function add_comment()
	{
		$post_id = $this->input->post('post_id');
		$category_id = $this->input->post('category_id');
		$comment_body = $this->input->post('comment_body');

		$data = ['success'=>false,'message'=>[]];
		
		$this->form_validation->set_rules('comment_body', 'Comment Body', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('post_id', 'Post Id', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Id', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		if ($this->form_validation->run() == TRUE) {

			// now trying to post data in the comments table 
			$this->Super_Admin_Model->save_comment_info($post_id,$comment_body);
			// get data from the comments table
			$data['comments'] = $this->Super_Admin_Model->get_comment_by_post($post_id);
			// show the value in the console
			$data['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}
	public function add_reply()
	{
		$post_id = $this->input->post('post_id');
		$category_id = $this->input->post('category_id');
		$comment_id = $this->input->post('comment_id');
		$reply_body = $this->input->post('reply_body');

		$data = ['success'=>false,'message'=>[]];
		$this->form_validation->set_rules('reply_body', 'Reply Body', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('post_id', 'Post Id', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Id', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		if ($this->form_validation->run() == TRUE) {
			
			// now trying to post data in the comments table 
			$result = $this->Super_Admin_Model->save_reply_info($post_id,$reply_body,$comment_id);
			// get data from the comments table
			$data['comments'] = $this->Super_Admin_Model->get_comment_by_post($post_id);
			// show the value in the console
			$data['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}
}
 ?>