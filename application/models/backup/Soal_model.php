<?php
class Soal_model extends CI_Model
{
	
	function get($id)
	{	
		return $this->db->query("SELECT ps.id_jenis_soal,
										ps.id_parent_soal,
										ps.id_materi,
										ps.judul_soal,
										ps.keterangan,
										ps.createdate,
										js.nama_jenis_soal,
										mt.judul AS judul_materi
									FROM parent_soal ps 
									LEFT JOIN jenis_soal js ON ps.id_jenis_soal = js.id_jenis_soal
									LEFT JOIN materi mt ON ps.id_materi = mt.id_materi
									WHERE ps.id_materi = '$id'
		 ");
	}

	function get_child_soal($id)
	{
		return $this->db->query("SELECT 
										cs.*, 
								        GROUP_CONCAT(cj.jawaban SEPARATOR '@') as jawaban,
								        GROUP_CONCAT(cj.status SEPARATOR '@') as status_jawaban
								        FROM child_soal cs 
										LEFT JOIN child_jawaban cj ON cs.id_child_soal = cj.id_child_soal
								        WHERE cs.id_parent_soal = '$id'
								        GROUP BY cs.id_child_soal
			");	
	}

	function get_nilai_parent($id)
	{
		return $this->db->query("
									SELECT 
								        p.id_user,
								        ps.judul_soal,
								        du.nim,
								        du.nama,
								        du.kelas,
								        COUNT(p.id_user) AS total_soal,
										SUM(IF(cj.status = 1, 1, 0)) AS total_jawaban
								        FROM pengerjaan p
								        LEFT JOIN hasil_pengerjaan hp ON p.id_pengerjaan = hp.id_pengerjaan
								        LEFT JOIN user u ON p.id_user = u.id_user
								        LEFT JOIN child_jawaban cj ON hp.id_child_jawaban = cj.id_child_jawaban
								        LEFT JOIN data_user du ON u.id_user = du.id_user
                                        LEFT JOIN parent_soal ps ON p.id_parent_soal = ps.id_parent_soal
								        WHERE p.id_parent_soal = '$id'
								        GROUP BY u.id_user

							 	");
	}

	function get_title_parent($id)
	{
		return $this->db->where('id_parent_soal', $id)->get_where('parent_soal');
	}

	function get_child_soal_by_id($id)
	{
		return $this->db->query("SELECT 
										cs.*,
										GROUP_CONCAT(cj.id_child_jawaban SEPARATOR '@') as id_child_jawaban,
								        GROUP_CONCAT(cj.jawaban SEPARATOR '@') as jawaban,
								        GROUP_CONCAT(cj.status SEPARATOR '@') as status_jawaban
								        FROM child_soal cs 
										LEFT JOIN child_jawaban cj ON cs.id_child_soal = cj.id_child_soal
								        AND cs.id_child_soal = '$id'
			");	
	}

	function get_materi_by_id($id)
	{
		return $this->db->where('id_materi', $id)->get_where('materi');
	}

	function get_jenis_soal()
	{
		return $this->db->order_by('nama_jenis_soal', 'ASC')->get('jenis_soal');
	}

	function insert($data)
	{
		return $this->db->insert('parent_soal', $data);
	}

	function get_data_by_id($id_materi,$id)
	{
		return $this->db->query("SELECT ps.id_jenis_soal,
										ps.id_parent_soal,
										ps.id_materi,
										ps.judul_soal,
										ps.keterangan,
										ps.createdate,
										js.nama_jenis_soal,
										mt.judul AS judul_materi
									FROM parent_soal ps 
									LEFT JOIN jenis_soal js ON ps.id_jenis_soal = js.id_jenis_soal
									LEFT JOIN materi mt ON ps.id_materi = mt.id_materi
									WHERE ps.id_parent_soal = '$id' 
									AND ps.id_materi = '$id_materi'

									");

	}

	function update($data,$id)
	{
		return $this->db->where('id_parent_soal', $id)->update('parent_soal', $data);
	}

	function update_butir_soal($data,$id)
	{
		return $this->db->where('id_child_soal', $id)->update('child_soal', $data);
	}

	function update_butir_jawaban($data,$id)
	{
		return $this->db->where('id_child_jawaban', $id)->update('child_jawaban', $data);
	}

	function delete_butir_jawaban($id)
	{
		return $this->db->where('id_child_jawaban', $id)->delete('child_jawaban');
	}

	function delete($id)
	{
		$this->db->where('id_parent_soal', $id);
		return $this->db->delete('parent_soal');
	}

	function deletebutirsoal($id)
	{
		$this->db->where('id_child_soal', $id)->delete('child_soal');
		return $this->db->where('id_child_soal', $id)->delete('child_jawaban');
	}

	function insert_butir_soal($data)
	{
		$this->db->insert('child_soal', $data);
		$query = $this->db->insert_id();
		return $query;
	}

	function insert_pertanyaan($data)
	{
		return $query = $this->db->insert('child_jawaban', $data);
	}

}
?>