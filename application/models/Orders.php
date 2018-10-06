<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*  
*/
class Orders extends CI_Model{
	
	function feachData($resturntID){
		$query = $this->db->query("SELECT * FROM order_details d,order_location l,user u WHERE d.orderID=l.orderID AND d.userID=u.userID AND d.orderStatus='Pending' AND d.restaurantID=".$resturntID."");
			return $query;
       

	}

	function feachData2($resturntID){
		$query = $this->db->query("SELECT * FROM order_details d,order_location l,user u WHERE d.orderID=l.orderID AND d.userID=u.userID AND d.orderStatus='Complete' AND d.restaurantID=".$resturntID."");
			return $query;
       

	}

	public function SelectOrderItem(){
		//$query = $this->db->get('restaurant');
		$id=$this->input->get('id');
		$query=$this->db->query("SELECT * FROM order_item o,food_item f WHERE o.foodItemID=f.foodItemID AND o.orderID=".$id."" );
		//$query=$this->db->get('order_item');

		if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
           		$user_data[]=array(
				         'unitePrice'=>$row['unitePrice'],
				         'name'=>$row['name'],
				         'qty'=>$row['qty']
		    );
           		
			}
			return $user_data;
        } else {
            return false;
        }
	}

	public function Complete(){
		//$query = $this->db->get('restaurant');
		$id=$this->input->get('id');
		$query=$this->db->query("UPDATE `order_details` SET `orderStatus` = 'Complete' WHERE `order_details`.`orderID` = ".$id."" );

		if ($query) {
            
			return true;
        } else {
            return false;
        }
	}


}

?>