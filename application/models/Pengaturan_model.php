<?php
class Pengaturan_model extends CI_Model
{
	
	function get_data($sess_id)
	{
		return $this->db->where('id_user', $sess_id)->get_where('user');
	}

	function get_where($where)
	{
		return $this->db->get_where('user', $where);
	}

	function update_data($sess_id,$set)
	{
		return $this->db->where('id_user', $sess_id )->update('user', $set);
	}

}
?>