<?php
class Jenissoal_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_jenis_soal', 'DESC');
		return $this->db->get('jenis_soal');
	}

	function insert($data)
	{
		return $this->db->insert('jenis_soal', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_jenis_soal', $id)->get_where('jenis_soal');
	}

	function update($data,$id)
	{
		return $this->db->where('id_jenis_soal', $id)->update('jenis_soal', $data);
	}

	function delete($id)
	{
		$this->db->where('id_jenis_soal', $id);
		return $this->db->delete('jenis_soal');
	}


}
?>