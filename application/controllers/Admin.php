<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {



public function index()
	{
		//$this->load->helper('url');
		$this->load->model('Admin_mdl');
		$responce["Rest_user"]= $this->Admin_mdl->selectRestaurent();
		$this->load->view('index2',$responce);
		
	}

public function app_user(){
	$this->load->model('Admin_mdl');
	$responce["App_user"]= $this->Admin_mdl->selectAppUser();
	$this->load->view('app_user',$responce);
}	

}


?>