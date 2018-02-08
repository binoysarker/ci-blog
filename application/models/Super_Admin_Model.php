<?php 
/**
* 
*/
class Super_Admin_Model extends CI_Model
{
	public function save_category_info()
	{
		$data['category_name'] = $this->input->post('category_name');
		$data['category_description'] = $this->input->post('category_description');
		$data['publication_status'] = $this->input->post('publication_status');
		return $this->db->insert('tbl_category',$data);
	}
	public function update_category_info()
	{
		$category_id = $this->input->post('category_id');
		$category_name = $this->input->post('category_name');
		$category_description = $this->input->post('category_description');
		$publication_status = $this->input->post('publication_status');
		// replce the row of that table with the data 
		$this->db->where('category_id',$category_id)
		->set('category_name',$category_name)
		->set('category_description',$category_description)
		->set('publication_status',$publication_status)
		->update('tbl_category');
	}
	public function update_post_info()
	{
		$post_id = $this->input->post('post_id');
		$category_id = $this->input->post('category_id');
		$post_title = $this->input->post('post_title');
		$post_description = $this->input->post('post_description');
		$publication_status = $this->input->post('publication_status');
		// replce the row of that table with the data 
		$this->db->where('post_id',$post_id)
		->set('category_id',$category_id)
		->set('post_title',$post_title)
		->set('post_description',$post_description)
		->set('publication_status',$publication_status)
		->update('tbl_post');
	}
	public function save_post_info()
	{
		$data['category_id'] = $this->input->post('category_id');
		$data['post_title'] = $this->input->post('post_title');
		$data['post_description'] = $this->input->post('post_description');
		$data['publication_status'] = $this->input->post('publication_status');
		return $this->db->insert('tbl_post',$data);
	}
	// now time to display all the published category in the user home page
	public function get_all_category()
	{
		$query = $this->db->get('tbl_category');
		$result = $query->result();
		return $result;
	}
	public function get_all_post()
	{
		$query = $this->db->get('tbl_post');
		$result = $query->result();
		return $result;
	}
	
	public function select_all_published_category()
	{
		$query = $this->db->where('publication_status',1)->get('tbl_category');
		$result = $query->result();
		return $result;
	}
	// now time to display all the published posts in the user home page
	public function select_all_published_post()
	{
		$query = $this->db->where('publication_status',1)->get('tbl_post');
		$result = $query->result();
		return $result;
	}
	public function post_by_category($category_id)
	{
		$query = $this->db->where('publication_status',1)->where('category_id',$category_id)->get('tbl_post');
		$result = $query->result();
		return $result;
	}
	public function publish_status_info($category_id)
	{
		$query =  $this->db->set('publication_status',1)
			->where('category_id',$category_id)
			->update('tbl_category');
	}
	public function publish_post_status_info($post_id)
	{
		$query =  $this->db->set('publication_status',1)
			->where('post_id',$post_id)
			->update('tbl_post');
	}
	public function unpublish_status_info($category_id)
	{
		$query =  $this->db->set('publication_status',0)
			->where('category_id',$category_id)
			->update('tbl_category');
	}
	public function unpublish_post_status_info($post_id)
	{
		$query =  $this->db->set('publication_status',0)
			->where('post_id',$post_id)
			->update('tbl_post');
	}
	public function get_specific_category($category_id)
	{
		$query = $this->db->where('category_id',$category_id)
			->get('tbl_category');
		return $query->result();
	}
	public function get_specific_post($post_id)
	{
		$query = $this->db->where('post_id',$post_id)
			->get('tbl_post');
		return $query->result();
	}


}