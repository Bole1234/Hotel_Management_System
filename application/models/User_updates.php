<?php 

class User_updates extends CI_Model{

	public function showUser($userID){
		//$query = $this->db->get('restaurant');

		$query = $this->db->query("SELECT * FROM `user` WHERE `userID` = ".$userID."");

		if ($query->num_rows() > 0) {
           return $query->result();
        } else {
            return false;
        }
	}

	public function updateUser($userID){

			
			
			$userName =$this->input->post('uname'); 
			$contactNo = $this->input->post('TelNum');
			$email = $this->input->post('email'); 
			

		$query="UPDATE `user` SET `name` = '".$userName."', `email` = '".$email."', `contactNo` = '".$contactNo."' WHERE `user`.`userID` = ".$userID."";
		
		if($this->db->simple_query($query)){
			return true;

		}else{
			return false;
		}
	}

public function UpdatePassword($userID){

			
			
			$currentPW =sha1($this->input->post('currentPW')); 
			$newPW = sha1($this->input->post('newPW'));
			$this->db->where("userID",$userID);
			$this->db->where("password",$currentPW);
			$query = $this->db->get("user");
			if($query->num_rows()>0){
					  $query2="UPDATE `user` SET `password` = '".$newPW."' WHERE `user`.`userID` = ".$userID." ";
				
				if($this->db->simple_query($query2)){
					return '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> password is updated.
</div>';

				}else{
					return 'div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error </strong> password is not updated.
				</div>';
				}


			}else{
				return '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Please </strong> enter your previous password correctly.
				</div>';

			}
			

		
	}



}
?>