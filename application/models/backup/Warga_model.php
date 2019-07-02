<?php
class Warga_model extends CI_Model
{
	
	function get($id)
	{	
		return $this->db->query("

									SELECT 	u.*,
											du.*
										FROM user u
											LEFT JOIN data_user du ON u.id_user = du.id_user
											LEFT JOIN status_keluarga sk ON du.id_status_keluarga = sk.id_status_keluarga
											WHERE du.id_rt = '$id'

			");
	}


	function insert_user($data)
	{
		$this->db->insert('user', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	function insert_data_user($data)
	{
		return $this->db->insert('data_user', $data);
	}

	function insert_level($data)
	{
		return $this->db->insert('level', $data);
	}

	function get_data_rt_by_id($id)
	{
		return $this->db->query("
									SELECT 
											rt.id_rt,
											rt.nama AS nama_rt,
											rw.id_rw,
											rw.nama AS nama_rw
										FROM rt
										LEFT JOIN rw ON rt.id_rw = rw.id_rw
										WHERE rt.id_rt = '$id'
			");
	}

	function update_user($data,$id)
	{
		return $this->db->where('id_user', $id)->update('user', $data);
	}

	function update_data_user($data,$id)
	{
		return $this->db->where('id_user', $id)->update('data_user', $data);
	}

	function delete_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('user');
	}

	function delete_data_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('data_user');
	}

	function delete_level_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('level');
	}

	function delete_level($id)
	{
		$this->db->where('id_level', $id);
		return $this->db->delete('level');
	}

	function get_status_keluarga()
	{
		return $this->db->get('status_keluarga');
	}

	function get_user()
	{
		return $this->db->get('user');
	}

	function get_user_by_id($id)
	{
		return $this->db->query("

									SELECT 	u.*,
											du.*
										FROM user u
											LEFT JOIN data_user du ON u.id_user = du.id_user
											LEFT JOIN status_keluarga sk ON du.id_status_keluarga = sk.id_status_keluarga
											WHERE u.id_user = '$id'

			");
	}

	function cek_username($user)
	{
		return $this->db->where('username', $user)->get_where('user');
	}

	function get_level_by_id($id)
	{
		return $this->db->query("
									SELECT 	l.*,
											du.id_rt
										FROM level l
										LEFT JOIN data_user du ON l.id_user = du.id_user
										WHERE l.id_level = '$id'
			");
	}

	function get_level_by_user($id)
	{
		return $this->db->where('id_user', $id)->get_where('level');
	}

}
?>