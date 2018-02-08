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
		// unsetting user data sesstion
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
	public function manage_category()
	{
		// getting all the category and passing in the page
		$result['all_category'] = $this->Super_Admin_Model->get_all_category();
		$data['admin_content'] = $this->load->view('admin/pages/admin_manage_category',$result,true);
		$this->load->view('admin/admin_master',$data);
	}
	public function manage_post()
	{
		// getting all the category and passing in the page
		$result['all_post'] = $this->Super_Admin_Model->get_all_post();
		$data['admin_content'] = $this->load->view('admin/pages/admin_manage_post',$result,true);
		$this->load->view('admin/admin_master',$data);
	}
	public function add_post()
	{
		$data['admin_content'] = $this->load->view('admin/pages/admin_add_post','',true);
		$this->load->view('admin/admin_master',$data);
	}
	public function edit_category($category_id)
	{
		$result['category'] = $this->Super_Admin_Model->get_specific_category($category_id);
		$data['admin_content'] = $this->load->view('admin/pages/admin_edit_category',$result,true);
		$this->load->view('admin/admin_master',$data);
	}
	public function edit_post($post_id)
	{
		$result['post'] = $this->Super_Admin_Model->get_specific_post($post_id);
		$data['admin_content'] = $this->load->view('admin/pages/admin_edit_post',$result,true);
		$this->load->view('admin/admin_master',$data);
	}
	
	// save data
	public function save_category()
	{
		$result = $this->Super_Admin_Model->save_category_info();
		if ($result) {
			$sdata['success_message'] = 'Category is addedd successfully';
			$this->session->set_userdata($sdata);
			redirect('add-category','refresh');
		}
		else{
			$sdata['error_message'] = 'Category is not addedd';
			$this->session->set_userdata($sdata);
			redirect('add-category','refresh');
		}
	}
	public function save_post()
	{
		$result = $this->Super_Admin_Model->save_post_info();
		if ($result) {
			$sdata['success_message'] = 'Post is addedd successfully';
			$this->session->set_userdata($sdata);
			redirect('add-post','refresh');
		}
		else{
			$sdata['error_message'] = 'Post is not addedd';
			$this->session->set_userdata($sdata);
			redirect('add-post','refresh');
		}
	}

	// update data
	public function publish_status($category_id)
	{
		$result = $this->Super_Admin_Model->publish_status_info($category_id);
		redirect('/manage-category','refresh');
	}
	public function publish_post_status($post_id)
	{
		$result = $this->Super_Admin_Model->publish_post_status_info($post_id);
		redirect('/manage-post','refresh');
	}
	public function unpublish_status($category_id)
	{
		$result = $this->Super_Admin_Model->unpublish_status_info($category_id);
		redirect('/manage-category','refresh');
	}
	public function unpublish_post_status($post_id)
	{
		$result = $this->Super_Admin_Model->unpublish_post_status_info($post_id);
		redirect('/manage-post','refresh');
	}
	public function update_category()
	{
		$result = $this->Super_Admin_Model->update_category_info();
		$sdata['success_message'] = 'Category is update';
		$this->session->set_userdata($sdata);
		redirect('/manage-category','refresh');
	}
	public function update_post()
	{
		$result = $this->Super_Admin_Model->update_post_info();
		$sdata['success_message'] = 'Post is updated';
		$this->session->set_userdata($sdata);
		redirect('/manage-post','refresh');
	}


	// delete category
	public function delete_category($category_id)
	{
		$this->db->where('category_id',$category_id)
			->delete('tbl_category');
		redirect('/manage-category','refresh');
	}
	public function delete_post($post_id)
	{
		$this->db->where('post_id',$post_id)
			->delete('tbl_post');
		redirect('/manage-post','refresh');
	}


}