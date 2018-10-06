
<?php 

class Register_model extends CI_Model{

	function insertRegister(){
		//$email=this->input->post('email',TRUE);
		//$query=$this->db->query("SELECT * FROM `user` WHERE `email` = '".$email."' ");

		$secretkey='6Le9e1wUAAAAAA0_vdxfUYyCvEIkbdIAi_t7uTai';
		$responceKey=$this->input->post('g-recaptcha-response');
		$userIP=$_SERVER['REMOTE_ADDR'];
		$url='https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$responceKey.'&remoteip='.$userIP.'';
		$responce=file_get_contents($url);
		$responce=json_decode($responce);

		if($responce->success){
		$data= array(
			
			'name' =>$this->input->post('name',TRUE), 
			'email' => $this->input->post('email',TRUE), 
			'password' => sha1($this->input->post('password',TRUE)), 
			'userType' =>'Rest',
		);
		 $this->db->insert('user',$data);
		 $insert_id = $this->db->insert_id();
	

		//$this->db->insert('restaurant', $data1);
		$query1= $this->db->query("INSERT INTO `restaurant` (`restaurantID`, `rstaurantName`, `ownerName`, `email`, `userID`) VALUES (NULL, '', '', '', '".$insert_id."')");
		 $insert_id2 = $this->db->insert_id();
			$query2=$this->db->query("INSERT INTO `restaurant_address` (`restaurantID`, `addressLine1`,`latitude`,`longitude`) VALUES ('".$insert_id2."', '', '','')");
		 $query3=$this->db->query("INSERT INTO `restaurant_phone` (`restaurantID`, `phone1`, `phone2`) VALUES ('".$insert_id2."', NULL, NULL)");
		 if($query1 && $query2 && $query3){
		 	return true;
		 }else{
		 	return false;
		 }

			}
	}
	
	function loginUser(){
		$email= $this->input->post('email');
		$password=sha1($this->input->post('password')); 
		//$password=md5("Sahan1234");

		$this->db->where('email',$email);
		$this->db->where('password',$password);

		$respond=$this->db->get('user');

		if($respond->num_rows()>0){
				return $respond->row(0);
		}else{
			return FALSE;
		}
	}

}
?>

