<?php
class Backend_superadmin_model extends CI_Model
{
	
	function cek_login($data)
	{
		return $this->db->where($data)->get_where('superadmin');
	}


}
?>