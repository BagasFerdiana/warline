<?php
class Rt_model extends CI_Model
{
	
	function get($id)
	{	
		$this->db->order_by('id_rt', 'DESC');
		return $this->db->where('id_rw', $id)->get_where('rt');
	}

	function insert($data)
	{
		return $this->db->insert('rt', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_rt', $id)->get_where('rt');
	}

	function get_data_rw_by_id($id)
	{
		return $this->db->where('id_rw', $id)->get_where('rw');
	}

	function update($data,$id)
	{
		return $this->db->where('id_rt', $id)->update('rt', $data);
	}

	function delete($id)
	{
		$this->db->where('id_rt', $id);
		return $this->db->delete('rt');
	}


}
?>