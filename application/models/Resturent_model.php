<?php 

class Resturent_model extends CI_Model{

	function insertResturent(){
		$data= array(
			
			'rstaurantName' =>$this->input->post('RestName',TRUE), 
			'ownerName' => $this->input->post('ownerName',TRUE), 
			'email' => $this->input->post('email',TRUE), 

		);
		return $this->db->insert('restaurant',$data);
	}
}
?>