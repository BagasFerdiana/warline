<?php
class Pasien_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_pasien', 'DESC');
		return $this->db->get('pasien');
	}

	function insert($data)
	{
		return $this->db->insert('pasien', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_pasien', $id)->get_where('pasien');
	}

	function update($data,$id)
	{
		return $this->db->where('id_pasien', $id)->update('pasien', $data);
	}

	function delete($id)
	{
		$this->db->where('id_pasien', $id);
		return $this->db->delete('pasien');
	}


}
?>