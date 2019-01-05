<?php
/**
 * 
 */
class Product_model extends CI_Model
{
	public function getProductAll() {

		$this->db->select('pro.*,cat.category_name AS cat_name');
		$this->db->from('product pro');
		$this->db->join('category cat', 'pro.category_id = cat.	category_id', 'left');
		$this->db->order_by('pro.name', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function insert($data)
	{
		$query = $this->db->insert('product',$data);
		return  $this->db->insert_id();
	}

	 public function update($data)
	{

		if(!is_null($data->cover)){
			$this->db->set('cover', $data->cover);
		}
		
		$this->db->set('details', $data->details);
		$this->db->set('name', $data->name);
		$this->db->set('price1', $data->price1);
		$this->db->set('price2', $data->price2);
		$this->db->set('category_id', $data->category_id);
		
		$this->db->where('id', $data->id);
		$update = $this->db->update('product');

		return $update;
	}

	public function get_ProductById($id)
	{
		$this->db->select('pro.*,cat.category_name AS cat_name');
		$this->db->from('product pro');
		$this->db->join('category cat', 'pro.category_id = cat.category_id', 'left');
		$this->db->where('pro.id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row)
		{
			$row->id;
			$row->name;
			$row->details;
			$row->price1;
			$row->price2;
			$row->category_id;
			$row->cat_name;
			$row->cover;
		}

		return $row;
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('product');

		return $delete;
	}

	

	
}