<?php
class Level_user_model extends CI_Model
{
	
	function get_level($id)
	{	
		return $this->db->where('id_user', $id)->get_where('level');
	}


}
?>