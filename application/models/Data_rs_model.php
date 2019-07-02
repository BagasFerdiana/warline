<?php
class Data_rs_model extends CI_Model
{
	
	function get()
	{	
		return $this->db->query("SELECT * FROM data_rs");
	}

	function insert($data)
	{
		return $this->db->insert('data_rs', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_data_rs', $id)->get_where('data_rs');
	}

	function update($data)
	{
		return $this->db->update('data_rs', $data);
	}

	function delete($id)
	{
		$this->db->where('id_data_rs', $id);
		return $this->db->delete('data_rs');
	}


}
?>