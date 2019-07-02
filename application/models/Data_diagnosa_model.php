<?php
class Data_diagnosa_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_data_diagnosa', 'DESC');
		return $this->db->get('data_diagnosa');
	}

	function insert($data)
	{
		return $this->db->insert('data_diagnosa', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_data_diagnosa', $id)->get_where('data_diagnosa');
	}

	function update($data,$id)
	{
		return $this->db->where('id_data_diagnosa', $id)->update('data_diagnosa', $data);
	}

	function delete($id)
	{
		$this->db->where('id_data_diagnosa', $id);
		return $this->db->delete('data_diagnosa');
	}


}
?>