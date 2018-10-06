<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_category extends CI_Controller {

	function _construct(){
		parent::_construct();
		//$this->load->model('Resturent');
	}

	public function showCategory(){

		//$result=$this->Resturent->showRestaurant();
		$userID=$_SESSION['user_id'];
		$this->load->model('Category');
        $responce= $this->Category->showCategory($userID);
		echo json_encode($responce);

	}

		public function enterCategory(){

		//$result=$this->Resturent->showRestaurant();
		//$this->form_validation->set_rules('RestName', 'Resturent Name', 'required');
			$userID=$_SESSION['user_id'];
		$this->load->model('Category');
		$responce= $this->Category->enterCategory($userID);
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);

	}

	public function editCategory(){

		
		$this->load->model('Category');
		$responce= $this->Category->editCategory();
		
        
		echo json_encode($responce);

	}

	public function updateCategory(){
		$this->load->model('Category');
		$responce= $this->Category->updateCategory();
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);
	}

	public function updateCategoryWI(){
		$this->load->model('Category');
		$responce= $this->Category->updateCategoryWI();
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);
	}

	public function deleteCategory(){
		$this->load->model('Category');
		$responce= $this->Category->deleteCategory();
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);
	}

}
?>