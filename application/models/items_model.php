<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Items_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function list_all($by = '', $value = '')
	{
		$q = $this->db->where($by, $value)->get('items');
		
		if($q->num_rows() > 0)
		{
			return $q->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	public function get($id)
	{
		$q = $this->db->where('id', $id)->get('items');
		
		if($q->num_rows() == 1)
		{
			return $q->row();
		}
		else
		{
			return FALSE;
		}
	}
	
	public function insert($data)
	{
		$q = $this->db->insert('items', $data);
		
		if($q)
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}
	
	public function update($id, $data)
	{
		$q = $this->db->where('id', $id)->update('items', $data);
		
		if($q)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function delete($id)
	{
		$q = $this->db->where('id', $id)->delete('items');
		
		if($q)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
}