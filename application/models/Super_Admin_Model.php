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


}