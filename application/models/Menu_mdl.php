<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_mdl extends CI_Model{
	//$userID=echo $this->session->userdata('user_id');
	public function selectFoodCategory($resturntID){
		//$query = $this->db->get('restaurant');

		$query = $this->db->query("SELECT * FROM `food_category` WHERE `restaurantID` = ".$resturntID."");

		$data[]=0;
           foreach ($query->result_array() as $row){
           		$data[]=array(
				         'cat_ID'=>$row['cat_ID'],
				         'name'=>$row['name']
				        
		    );
           		
			}
			return $data;
        
	}

	public function showMenu($resturntID){
		$query = $this->db->query("SELECT * FROM food_item WHERE `restaurantID` = ".$resturntID."");

		
           foreach ($query->result_array() as $row){
           		$data[]=array(
				         'foodItemID'=>$row['foodItemID'],
				         'catID'=>$row['catID'],
				         'unitePrice'=>$row['unitePrice'],
				         'name'=>$row['name'],
				        'availability'=>$row['availability'],
				        'image'=>base64_encode($row['image'])
		    );
           		
			}
			return $query;

	}

	public function enterMenu($resturentID){
		//$query = $this->db->get('restaurant');
		$image2 = file_get_contents($_FILES['inputFile']['tmp_name']);
		$data=array(
			'name'=>$this->input->post('itm_name'),
			'catID'=>$this->input->post('cat_id'),
			'unitePrice'=>$this->input->post('unit_price'),
			'restaurantID'=>$resturentID,
			'availability'=>'Available',
			'image'=>$image2
		);
		$this->db->insert('food_item',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}

		public function deleteMenuItem(){
		//$query = $this->db->get('restaurant');
		$id=$this->input->get('id');
		$this->db->where('foodItemID',$id);
		$this->db->delete('food_item');
		if ($this->db->affected_rows()>0) {
           return true;
        } else {
            return false;
        }
	}

	public function editMenu(){
		//$query = $this->db->get('restaurant');
		$id=$this->input->get('id');
		$this->db->where('foodItemID',$id);
		$query=$this->db->get('food_item');
		if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
           		$user_data=array(
				         'catID'=>$row['catID'],
				         'name'=>$row['name'],
				         'unitePrice'=>$row['unitePrice'],
				       		'foodItemID'=>$id,
				       		'availability'=>$row['availability']
		    );
           		
			}
			return $user_data;
        } else {
            return false;
        }
	}

		public function updateMenu(){
		//$query = $this->db->get('restaurant');
			$id=$this->input->post('foodItemID');
			$image2 = file_get_contents($_FILES['inputFileUpdate']['tmp_name']);
		$data=array(
			'name'=>$this->input->post('itm_name_up'),
			'catID'=>$this->input->post('cat_id'),
			'unitePrice'=>$this->input->post('unit_price_up'),
			'availability'=>$this->input->post('optradio'),
			'image'=>$image2
		);
		$this->db->where('foodItemID',$id);
		$this->db->update('food_item',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}
public function updateMenuWI(){
		//$query = $this->db->get('restaurant');
			$id=$this->input->post('foodItemID');
			
		$data=array(
			'name'=>$this->input->post('itm_name_up'),
			'catID'=>$this->input->post('cat_id'),
			'availability'=>$this->input->post('optradio'),
			'unitePrice'=>$this->input->post('unit_price_up'),
		);
		$this->db->where('foodItemID',$id);
		$this->db->update('food_item',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}
}
?>