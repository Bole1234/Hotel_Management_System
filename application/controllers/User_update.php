<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_update extends CI_Controller {

	function _construct(){
		parent::_construct();
		
	}

	public function showUser(){

		
		$userID=$_SESSION['user_id'];
		$this->load->model('User_updates');
        $responce= $this->User_updates->showUser($userID);
		echo json_encode($responce);

	}

	public function updateResturent(){
				$this->load->library('form_validation');
                $this->form_validation->set_rules('uname', 'Resturent Name', 'required');
                
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('TelNum', 'Phone Number', 'required|min_length[10]|max_length[10]|numeric');
               

				 if ($this->form_validation->run() == FALSE)
				                {
				                      echo '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  '.validation_errors().'
				</div>';
				                }
				                else
				                {
						
						$userID=$_SESSION['user_id'];
						$this->load->model('User_updates');
				        $responce= $this->User_updates->updateUser($userID);
				        
						if($responce){
							echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Data is updated.
</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error</strong>
				</div>';

						}
				        
						

				}

	}

	public function PasswordChange(){
			$this->load->library('form_validation');
                $this->form_validation->set_rules('currentPW', 'Current Password', 'required');
                
                $this->form_validation->set_rules('newPW', 'New Password', 'required|min_length[8]');
                $this->form_validation->set_rules('cnewPW', 'Confirm Password', 'required|matches[newPW]');
               

				 if ($this->form_validation->run() == FALSE)
				                {
				          echo '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  '.validation_errors().'
				</div>';

				                }else{

				        $userID=$_SESSION['user_id'];
						$this->load->model('User_updates');
				        $responce= $this->User_updates->UpdatePassword($userID);
				        
						if($responce){
							echo $responce;
						}else{
							echo '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error</strong>
				</div>';

						}

				                }

	}

}
?>