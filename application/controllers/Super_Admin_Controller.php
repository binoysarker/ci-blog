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
		$result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
		$data['admin_content'] = $this->load->view('admin/pages/admin_add_post',$result,true);
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
		$result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
		$result['post'] = $this->Super_Admin_Model->get_specific_post($post_id);
		$data['admin_content'] = $this->load->view('admin/pages/admin_edit_post',$result,true);
		$this->load->view('admin/admin_master',$data);
	}
	
	// save data
	public function save_category()
	{
		// validation of form and then do other things
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|max_length[55]');
		$this->form_validation->set_rules('category_description', 'Category Description', 'required');
		$this->form_validation->set_rules('publication_status', 'Publication Status', 'required|integer');
		if ($this->form_validation->run() == FALSE) {
			$data['admin_content'] = $this->load->view('admin/pages/admin_add_category','',true);
			$this->load->view('admin/admin_master',$data);
		} else {
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
		
	}
	public function save_post()
	{
		// validation of form and then do other things
		$this->form_validation->set_rules('post_title', 'Post Title', 'required|max_length[100]');
		$this->form_validation->set_rules('post_description', 'Post Description', 'required');
		$this->form_validation->set_rules('publication_status', 'Publication Status', 'required|integer');
		if ($this->form_validation->run() == FALSE) {
			$this->add_post();
		} else {
			// file upload section
			$config['upload_path']          = 'admin_asset/images/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1000;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);
      /*echo "<pre>";
      print_r($config);
      exit();*/

      if ( ! $this->upload->do_upload('post_image'))
      {
        $result['error'] = $this->upload->display_errors();
        $result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
    		$data['admin_content'] = $this->load->view('admin/pages/admin_add_post',$result,true);
    		$this->load->view('admin/admin_master',$data);
      }
      else
      {
        $result['upload_data'] = $this->upload->data();
        $result['published_category'] = $this->Super_Admin_Model->select_all_published_category();
    		$data['admin_content'] = $this->load->view('admin/pages/admin_add_post',$result,true);
    		$this->load->view('admin/admin_master',$data);
    		$image_path = $result['upload_data']['full_path'];
        
        // inserting data in the database
        $result = $this->Super_Admin_Model->save_post_info($image_path);
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