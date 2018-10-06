<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model{
	//$userID=echo $this->session->userdata('user_id');
	public function showCategory($userID){
		//$query = $this->db->get('restaurant');

		$query = $this->db->query("SELECT * FROM `food_category` WHERE `restaurantID` = ".$userID."");

		
           foreach ($query->result_array() as $row){
           		$user_data[]=array(
				         'cat_ID'=>$row['cat_ID'],
				         'name'=>$row['name'],
				         'image'=>base64_encode($row['image'])
		    );
           		
			}
			return $user_data;
        
	}

	public function enterCategory($userID){
		//$query = $this->db->get('restaurant');
		$image2 = file_get_contents($_FILES['inputFile']['tmp_name']);
		$data=array(
			'name'=>$this->input->post('catName'),
			'restaurantID'=>$userID,
			'image'=>$image2
		);
		$this->db->insert('food_category',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}

	public function editCategory(){
		//$query = $this->db->get('restaurant');
		$id=$this->input->get('id');
		$this->db->where('cat_ID',$id);
		$query=$this->db->get('food_category');
		if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
           		$user_data=array(
				         'cat_ID'=>$row['cat_ID'],
				         'name'=>$row['name']
				        
		    );
           		
			}
			return $user_data;
        } else {
            return false;
        }
	}

		public function updateCategory(){
		//$query = $this->db->get('restaurant');
			$id=$this->input->post('cat_ID');
			$image2 = file_get_contents($_FILES['inputFileUpdate']['tmp_name']);
		$data=array(
			'name'=>$this->input->post('catNameUpdate'),
			'image'=>$image2
		);
		$this->db->where('cat_ID',$id);
		$this->db->update('food_category',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}
public function updateCategoryWI(){
		//$query = $this->db->get('restaurant');
			$id=$this->input->post('cat_ID');
			
		$data=array(
			'name'=>$this->input->post('catNameUpdate'),
			
		);
		$this->db->where('cat_ID',$id);
		$this->db->update('food_category',$data);
		if($this->db->affected_rows()>0){
			return true;

		}else{
			return false;
		}
	}

	public function deleteCategory(){
		//$query = $this->db->get('restaurant');
		$id=$this->input->get('id');
		$this->db->where('cat_ID',$id);
		$this->db->delete('food_category');
		if ($this->db->affected_rows()>0) {
           return true;
        } else {
            return false;
        }
	}


}

?>