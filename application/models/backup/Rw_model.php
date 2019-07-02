<?php
class Rw_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_rw', 'DESC');
		return $this->db->get('rw');
	}

	function insert($data)
	{
		return $this->db->insert('rw', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_rw', $id)->get_where('rw');
	}

	function update($data,$id)
	{
		return $this->db->where('id_rw', $id)->update('rw', $data);
	}

	function delete($id)
	{
		$this->db->where('id_rw', $id);
		return $this->db->delete('rw');
	}


}
?>