<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_ctrl extends CI_Controller {

	function _construct(){
		parent::_construct();
		//$this->load->model('Resturent');
	}


	public function selectFoodCategory(){

		//$result=$this->Resturent->showRestaurant();
		$resturntID=$_SESSION['resturntID'];
		$this->load->model('Menu_mdl');
        $responce= $this->Menu_mdl->selectFoodCategory($resturntID);
		echo json_encode($responce);

	}

	public function showMenu(){
		$resturntID=$_SESSION['resturntID'];
		$this->load->model('Menu_mdl');
        $responce= $this->Menu_mdl->showMenu($resturntID);
		echo json_encode($responce);

	}

	public function enterMenu(){

		//$result=$this->Resturent->showRestaurant();
		//$this->form_validation->set_rules('RestName', 'Resturent Name', 'required');
			$resturntID=$_SESSION['resturntID'];
		$this->load->model('Menu_mdl');
		$responce= $this->Menu_mdl->enterMenu($resturntID);
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);

	}

	public function deleteMenuItem(){
		$this->load->model('Menu_mdl');
		$responce= $this->Menu_mdl->deleteMenuItem();
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);
	}

	public function editMenu(){

		
		$this->load->model('Menu_mdl');
		$responce= $this->Menu_mdl->editMenu();
		
        
		echo json_encode($responce);

	}

	public function updateMenu(){
		$this->load->model('Menu_mdl');
		$responce= $this->Menu_mdl->updateMenu();
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);
	}

	public function updateMenuWI(){
		$this->load->model('Menu_mdl');
		$responce= $this->Menu_mdl->updateMenuWI();
		$msg['success']=false;
		if($responce){
			$msg['success']=true;
		}
        
		echo json_encode($msg);
	}

}

?>	