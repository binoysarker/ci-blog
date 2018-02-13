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
	public function save_post_info($image_path)
	{
		
		$data['post_image'] = $image_path;
		$data['post_title'] = $this->input->post('post_title');
		$data['category_id'] = $this->input->post('category_id');
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

	// comment and reply section
	public function save_comment_info($post_id,$comment_body)
	{
		$data= [
			'post_id'=>$post_id,
			'comment_body'=>$comment_body,
			'publication_status'=>0
		];
		$this->db->insert('tbl_comments',$data);
	}
	public function save_reply_info($post_id,$reply_body,$comment_id)
	{
		$data= [
			'post_id'=>$post_id,
			'comment_id'=>$comment_id,
			'reply_body'=>$reply_body,
			'publication_status'=>0
		];
		$this->db->insert('tbl_reply',$data);
	}
	public function get_comment_by_post($post_id)
	{
		$query = $this->db->where('post_id',$post_id)->order_by('comment_body','DESC')->get('tbl_comments');
		$result = $query->result();
		return $result;
	}
	public function get_reply_by_post($post_id)
	{
		$query = $this->db->where('post_id',$post_id)->order_by('reply_body','DESC')->get('tbl_reply');
		$result = $query->result();
		return $result;
	}
	// query from view to model
	public function get_reply_by_comment($comment_id)
	{
		$query = $this->db->where('comment_id',$comment_id)->get('tbl_reply');
		$result = $query->result();
		return $result;
	}


}