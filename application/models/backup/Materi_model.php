<?php
class Materi_model extends CI_Model
{
	
	function get()
	{	
		$this->db->order_by('id_materi', 'DESC');
		return $this->db->get('materi');
	}

	function insert($data)
	{
		return $this->db->insert('materi', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->where('id_materi', $id)->get_where('materi');
	}

	function update($data,$id)
	{
		return $this->db->where('id_materi', $id)->update('materi', $data);
	}

	function delete($id)
	{
		$this->db->where('id_materi', $id);
		return $this->db->delete('materi');
	}

	function get_soal_pretest($id)
	{
		return $this->db->query("SELECT 	ps.judul_soal,
		                            		ps.keterangan,
		                                    js.nama_jenis_soal,
		                                    js.status_pengerjaan,
		                                    ps.id_parent_soal as get_id_parent_soal 
                                    FROM parent_soal ps
									LEFT JOIN jenis_soal js ON ps.id_jenis_soal = js.id_jenis_soal
						            WHERE js.status_pengerjaan = 0
						            AND ps.id_materi = '$id'
						        ");
	}

	function get_soal_posttest($id)
	{
		return $this->db->query("SELECT 	ps.judul_soal,
		                            		ps.keterangan,
		                                    js.nama_jenis_soal,
		                                    js.status_pengerjaan,
		                                    ps.id_parent_soal as get_id_parent_soal 
                                    FROM parent_soal ps
									LEFT JOIN jenis_soal js ON ps.id_jenis_soal = js.id_jenis_soal
						            WHERE js.status_pengerjaan = 1
						            AND ps.id_materi = '$id'
						        ");
	}

	function get_child_soal($id)
	{
		return $this->db->query("SELECT 
										cs.*, 
								        GROUP_CONCAT(cj.jawaban SEPARATOR '@') as jawaban,
								        GROUP_CONCAT(cj.status SEPARATOR '@') as status_jawaban,
								        GROUP_CONCAT(cj.id_child_jawaban SEPARATOR '@') as id_child_jawaban
								        FROM child_soal cs 
										LEFT JOIN child_jawaban cj ON cs.id_child_soal = cj.id_child_soal
								        WHERE cs.id_parent_soal = '$id'
								        GROUP BY cs.id_child_soal
			");	
	}

	function get_parent_soal_by_id($id)
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
									");

	}

	function insert_pengerjaan($data)
	{
		$this->db->insert('pengerjaan',$data);
		$query = $this->db->insert_id();
		return $query;
	}

	function insert_hasil_pengerjaan($data)
	{
		return $this->db->insert('hasil_pengerjaan', $data);
	}

	function cek_status_pengerjaan($sess_id, $id)
	{
		$this->db->where('id_user', $sess_id);
		$this->db->where('id_parent_soal', $id);
		return $this->db->get_where('pengerjaan');
	}

	function get_nilai($sess_id, $id_parent_soal)
	{
		return $this->db->query("
									SELECT COUNT(cj.status) AS nilai FROM pengerjaan p
									LEFT JOIN hasil_pengerjaan hp ON p.id_pengerjaan = hp.id_pengerjaan
							        LEFT JOIN child_jawaban cj ON hp.id_child_jawaban = cj.id_child_jawaban
							        WHERE p.id_user = '$sess_id'
							        AND p.id_parent_soal = '$id_parent_soal'
							        AND cj.status = '1'
							    ");
	}

}
?>