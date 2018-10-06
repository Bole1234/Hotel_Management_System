<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Resturent extends CI_Model{
	
	public function showRestaurant($userID){
		//$query = $this->db->get('restaurant');

		$query = $this->db->query("SELECT * FROM restaurant r,restaurant_address a, restaurant_phone p WHERE r.restaurantID=a.restaurantID AND r.restaurantID=p.restaurantID AND r.userID=".$userID."");

		if ($query->num_rows() > 0) {
           return $query->result();
        } else {
            return false;
        }
	}

	public function updateResturent($resturntID){

			$id='1';
			
			$rstaurantName =$this->input->post('RestName'); 
			$ownerName = $this->input->post('ownerName');
			$email = $this->input->post('email'); 
			$addressLine1=$this->input->post('addressLine1');
			$lat=$this->input->post('lat');
			$lng=$this->input->post('lng');
			//$addressLine1=$this->input->post('addressLine1'); 
			//$addressLine2 = $this->input->post('addressLine2');
			$phoneNo = $this->input->post('phoneNo'); 

		$query="UPDATE `restaurant` SET `rstaurantName` = '".$rstaurantName."', `ownerName` = '".$ownerName."', `email` = '".$email."' WHERE `restaurant`.`restaurantID` = ".$resturntID." ";
		$query2="UPDATE `restaurant_address` SET `addressLine1` = '".$addressLine1."' ,`latitude` = '".$lat."', `longitude` = '".$lng."' WHERE `restaurant_address`.`restaurantID` = ".$resturntID." ";
		$query3="UPDATE `restaurant_phone` SET `phone1` = '".$phoneNo."' WHERE `restaurant_phone`.`restaurantID` = ".$resturntID." ";
		if($this->db->simple_query($query) && $this->db->simple_query($query2) && $this->db->simple_query($query3)){
			return true;

		}else{
			return false;
		}
	}

	public function getResturnt($userID){

		$this->db->where('userID',$userID);
		

		$respond=$this->db->get('restaurant');

		if($respond->num_rows()>0){
				return $respond->row(0);
		}else{
			return FALSE;
		}
	}

	public function showResturentOpenHours($restaurantID){
		$query = $this->db->query("SELECT * FROM `restaurant_availability` WHERE `restaurantID` = ".$restaurantID."");

		
           foreach ($query->result_array() as $row){
           		$open_data[]=array(
           				'id'=>$row['id'],
				       'availableDay'=>$row['availableDay'],
				       'fromTime'=>$row['fromTime'],
				       'toTime'=>$row['toTime']  
		    );
           		
			}
			return $open_data;

	}

	public function resturentOpenHours($resturntID){


			$mon =$this->input->post('mon'); 
			$tue = $this->input->post('tue');
			$wed = $this->input->post('wed'); 
			$thu=$this->input->post('thu'); 
			$fri = $this->input->post('fri');
			$sat = $this->input->post('sat');
			$sun = $this->input->post('sun'); 

			$dp1 =$this->input->post('dp1'); 
			$dp2 = $this->input->post('dp2');
			$dp3 = $this->input->post('dp3'); 
			$dp4=$this->input->post('dp4'); 
			$dp5 = $this->input->post('dp5');
			$dp6 = $this->input->post('dp6');
			$dp7 = $this->input->post('dp7'); 
			$dp8 =$this->input->post('dp8'); 
			$dp9 = $this->input->post('dp9');
			$dp10 = $this->input->post('dp10'); 
			$dp11 = $this->input->post('dp11');
			$dp12 = $this->input->post('dp12');
			$dp11 = $this->input->post('dp11');
			$dp12 = $this->input->post('dp12');
			$dp13 = $this->input->post('dp13');
			$dp14 = $this->input->post('dp14');
			$x=0;
			if($mon=='Mon'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Mon',
				        'fromTime'   => $dp1,
				        'toTime'    => $dp2
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Mon');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp1,
					        'toTime'    => $dp2
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
					if($this->db->affected_rows()>0){
							$x=1;

						}else{
							$x=1;
						}

				}else{
					$this->db->insert('restaurant_availability',$data);
				}
				 
			}
			if($tue=='Tue'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Tue',
				        'fromTime'   => $dp3,
				        'toTime'    => $dp4
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Tue');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp3,
				        'toTime'    => $dp4
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
				}else{
					$this->db->insert('restaurant_availability',$data);
				}
				 
			}
			if($wed=='Wed'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Wed',
				        'fromTime'   => $dp5,
				        'toTime'    => $dp6
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Wed');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp5,
				        'toTime'    => $dp6
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
				}else{
					$this->db->insert('restaurant_availability',$data);
				}

				
			}
			if($thu=='Thu'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Thu',
				        'fromTime'   => $dp7,
				        'toTime'    => $dp8
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Thu');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp7,
				        'toTime'    => $dp8
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
				}else{
					$this->db->insert('restaurant_availability',$data);
				}
				
			}
			if($fri=='Fri'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Fri',
				        'fromTime'   => $dp9,
				        'toTime'    => $dp10
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Fri');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp9,
				        'toTime'    => $dp10
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
				}else{
					$this->db->insert('restaurant_availability',$data);
				}
				
			}
			if($sat=='Sat'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Sat',
				        'fromTime'   => $dp11,
				        'toTime'    => $dp12
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Sat');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp11,
				        'toTime'    => $dp12
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
				}else{
					$this->db->insert('restaurant_availability',$data);
				}
				
			}
			if($sun=='Sun'){
				$data = array(
				        'restaurantID' => $resturntID,
				        'availableDay' => 'Sun',
				        'fromTime'   => $dp13,
				        'toTime'    => $dp14
				        
				);
				$this->db->where('restaurantID',$resturntID);
				$this->db->where('availableDay','Sun');

				$respond=$this->db->get('restaurant_availability');

				if($respond->num_rows()>0){
						 //$respond->row(0);
						 foreach ($respond->result_array() as $row)
							{
							        $id= $row['id'];
							        
							}
						
						// $id=$result['id'];
						 $data = array(
							
					        'fromTime'   => $dp13,
				        'toTime'    => $dp14
							);

					$this->db->where('id', $id);
					$this->db->update('restaurant_availability', $data);
				}else{
					$this->db->insert('restaurant_availability',$data);
				}

				
			}
			
	}
}

?>