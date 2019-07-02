<?php
class Status_keluarga_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_status_keluarga', 'DESC');
		return $this->db->get('status_keluarga');
	}

	function insert($data)
	{
		return $this->db->insert('status_keluarga', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_status_keluarga', $id)->get_where('status_keluarga');
	}

	function update($data,$id)
	{
		return $this->db->where('id_status_keluarga', $id)->update('status_keluarga', $data);
	}

	function delete($id)
	{
		$this->db->where('id_status_keluarga', $id);
		return $this->db->delete('status_keluarga');
	}


}
?>