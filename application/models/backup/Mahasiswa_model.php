<?php
class Mahasiswa_model extends CI_Model
{
	
	function get()
	{	
		return $this->db->query("SELECT * FROM user u
							LEFT JOIN data_user du ON u.id_user = du.id_user
							WHERE u.level <> 'dosen'
							ORDER BY u.username
							  ");
	}

	function insert($data)
	{
		$this->db->insert('user', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function insert_data_user($data)
	{
		return $this->db->insert('data_user', $data);
	}

	function get_data_by_username($username)
	{
		return $this->db->where('username', $username)->get_where('user');
	}

	function get_data_by_id($id)
	{
		return $this->db->query("SELECT * FROM user u
									LEFT JOIN data_user du ON u.id_user = du.id_user
									WHERE u.level <> 'dosen' AND u.id_user = '$id'
									ORDER BY u.username
							  ");
	}

	function update($data,$id)
	{
		return $this->db->where('id_user', $id)->update('user', $data);
	}

	function update_data_user($data,$id)
	{
		return $this->db->where('id_user', $id)->update('data_user', $data);
	}

	function delete($id)
	{
		$this->db->where('id_user', $id)->delete('user');
		return $this->db->where('id_user', $id)->delete('data_user');
	}

}
?>