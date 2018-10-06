<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resturent_load extends CI_Controller {

	function _construct(){
		parent::_construct();
		//$this->load->model('Resturent');
	}

	public function showRestaurant(){

		//$result=$this->Resturent->showRestaurant();
		$userID=$_SESSION['user_id'];
		$this->load->model('Resturent');
        $responce= $this->Resturent->showRestaurant($userID);
		echo json_encode($responce);

	}

	public function updateResturent(){
				$this->load->library('form_validation');
                $this->form_validation->set_rules('RestName', 'Resturent Name', 'required');
                $this->form_validation->set_rules('addressLine1', 'Resturent Address', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('phoneNo', 'Phone Number', 'required|min_length[10]');
                $this->form_validation->set_rules('ownerName', 'Owner Name', 'required');

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
						$this->load->model('Resturent');
				        $responce1= $this->Resturent->getResturnt($userID);
				        if($responce1!=FALSE){
				                       	
				                          $resturntID=$responce1->restaurantID;
				                        
				                       }
						$this->load->model('Resturent');
				        $responce= $this->Resturent->updateResturent($resturntID);
						$msg='<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				 <strong>Error </strong>
				</div>';
						if($responce){
							$msg='<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Data is updated.
</div>';
						}
				        echo $msg;
						

				}

	}

}
?>