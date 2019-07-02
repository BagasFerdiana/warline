<?php
class Pengaturan_superadmin_model extends CI_Model
{
	
	function get_data($sess_id)
	{
		return $this->db->where('id_superadmin', $sess_id)->get_where('superadmin');
	}

	function get_where($where)
	{
		return $this->db->get_where('superadmin', $where);
	}

	function update_data($sess_id,$set)
	{
		return $this->db->where('id_superadmin', $sess_id )->update('superadmin', $set);
	}

}
?>