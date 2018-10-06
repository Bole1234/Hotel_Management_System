<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {



	public function LoadOrderItems(){
		$this->load->model('Orders');
		$responce= $this->Orders->SelectOrderItem();
		echo json_encode($responce);
		

	}


	public function Complete(){
		$this->load->model('Orders');
		$responce= $this->Orders->Complete();
		echo json_encode($responce);
	}
}
?>