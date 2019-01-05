<?php
/**
 * 
 */
class Category_model extends CI_Model
{

	
	public function insert($data)
	{
		$query = $this->db->insert('category',$data);
		return  $this->db->insert_id();
	}

	public function get_category()
	{
		$query = $this->db->get('category');

		return $query->result_array();
	}


}