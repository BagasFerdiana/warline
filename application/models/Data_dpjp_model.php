<?php
class Data_dpjp_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_data_dpjp', 'DESC');
		return $this->db->get('data_dpjp');
	}

	function insert($data)
	{
		return $this->db->insert('data_dpjp', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_data_dpjp', $id)->get_where('data_dpjp');
	}

	function update($data,$id)
	{
		return $this->db->where('id_data_dpjp', $id)->update('data_dpjp', $data);
	}

	function delete($id)
	{
		$this->db->where('id_data_dpjp', $id);
		return $this->db->delete('data_dpjp');
	}


}
?>