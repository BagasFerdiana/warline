<?php
class Data_tindakan_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_data_tindakan', 'DESC');
		return $this->db->get('data_tindakan');
	}

	function insert($data)
	{
		return $this->db->insert('data_tindakan', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_data_tindakan', $id)->get_where('data_tindakan');
	}

	function update($data,$id)
	{
		return $this->db->where('id_data_tindakan', $id)->update('data_tindakan', $data);
	}

	function delete($id)
	{
		$this->db->where('id_data_tindakan', $id);
		return $this->db->delete('data_tindakan');
	}


}
?>