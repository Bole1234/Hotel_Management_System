<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_mdl extends CI_Model{
function selectRestaurent(){
		$query = $this->db->query("SELECT * FROM restaurant r,user u,restaurant_address a WHERE u.userID=r.userID AND r.restaurantID=a.restaurantID  ");
			return $query;
       

	}

	function selectAppUser(){
		$query = $this->db->query("SELECT * FROM `user` WHERE `userType` = 'App' ");
			return $query;
       

	}

}
?>