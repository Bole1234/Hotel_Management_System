<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		//$this->load->helper('url');
		$this->load->view('index');
		
	}

	public function menu()
	{
		$resturntID=$_SESSION['resturntID'];

		$this->load->model('Menu_mdl');
		$responce["food_category"]= $this->Menu_mdl->selectFoodCategory($resturntID);
		$data["feachData"]=$this->Menu_mdl->showMenu($resturntID);
		$this->load->view('menu',$data);
		
	}

	public function login()
	{
		
		$this->load->view('login');
		
	}
	public function orders_pending()
	{
		$resturntID=$_SESSION['resturntID'];
		$this->load->model('Orders');
		$data["feachData"]=$this->Orders->feachData($resturntID);
		$this->load->view('orders_pending',$data);
		
	}

	public function orders_completed(){

		$resturntID=$_SESSION['resturntID'];
		$this->load->model('Orders');
		$data["feachData"]=$this->Orders->feachData2($resturntID);
		$this->load->view('orders_completed',$data);
		
	}

	public function food_category()
	{
		
		$this->load->view('food_category');
		
	}
	public function opening_hours()
	{
		
		$this->load->view('opening_hours');
		
	}

	public function register()
	{
		
		$this->load->view('Register');
		
	}

	public function user_account()
	{
		
		$this->load->view('user_account');
		
	}

	public function password_change()
	{
		
		$this->load->view('password_change');
		
	}
	
	

}
