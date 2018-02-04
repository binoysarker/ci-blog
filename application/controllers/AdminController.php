<?php 
/**
* 
*/
class AdminController extends MY_Controller
{
	public function index()
		{
			echo 'testing admin';
		}
		public function send()
			{
				$this->form_validation->set_rules('username','User Name','required|alpha');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('pass','Password','required|numeric|max_length[12]');
				// run the validation
				if ($this->form_validation->run()) {
					echo "validation successfull";
				}
				else{
					echo validation_errors();
				}
			}	
}