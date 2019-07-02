<?php
class Klaim_model extends CI_Model
{
	function get_pasien_by_id($id)
	{
		return $this->db->where('id_pasien', $id)->get_where('pasien');
	}

	function get_no_surat()
	{
		return $this->db->query("
									SELECT no_sep FROM klaim 
										ORDER BY id_klaim DESC LIMIT 1
			");
	}

	function get_data_dpjp()
	{
		return $this->db->get('data_dpjp');
	}

	function get_data_diagnosa()
	{
		return $this->db->get('data_diagnosa');
	}

	function get_data_tindakan()
	{
		return $this->db->get('data_tindakan');
	}

	function get()
	{	
		$this->db->order_by('id_klaim', 'DESC');
		return $this->db->get('klaim');
	}

	function insert($data)
	{
		$this->db->insert('klaim', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	function insert_tarif($data)
	{
		return $this->db->insert('tarif', $data);
	}

	function insert_diagnosa($data)
	{
		return $this->db->insert('diagnosa', $data);
	}

	function insert_tindakan($data)
	{
		return $this->db->insert('tindakan', $data);
	}

	function get_data_by_id($id)
	{
		return $this->db->query("
									SELECT 	k.*,
											t.*,
											d.*,
											ti.*,
											p.*,
											dd.nama AS diagnosa_primer
											FROM klaim k
										LEFT JOIN tarif t ON k.id_klaim = t.id_klaim
										LEFT JOIN diagnosa d ON k.id_klaim = d.id_klaim
										LEFT JOIN tindakan ti ON k.id_klaim = ti.id_klaim
										LEFT JOIN pasien p ON k.id_pasien = p.id_pasien
										LEFT JOIN data_diagnosa dd ON d.id_data_diagnosa_primer = dd.id_data_diagnosa
										WHERE k.id_klaim = '$id'
			");
	}

	function get_klaim_by_pasien($id)
	{
		$this->db->order_by('id_klaim', 'DESC');
		return $this->db->where('id_pasien', $id)->get_where('klaim');
	}

	function update($id, $data)
	{
		return $this->db->where('id_klaim', $id)->update('klaim', $data);
	}

	function update_tarif($id, $data)
	{
		return $this->db->where('id_klaim', $id)->update('tarif', $data);
	}

	function update_diagnosa($id, $data)
	{
		return $this->db->where('id_klaim', $id)->update('diagnosa', $data);
	}

	function update_tindakan($id, $data)
	{
		return $this->db->where('id_klaim', $id)->update('tindakan', $data);
	}

	function delete($id)
	{
		return $this->db->where('id_klaim', $id)->delete('klaim');
	}

	function delete_tarif($id)
	{
		return $this->db->where('id_klaim', $id)->delete('tarif');
	}

	function delete_diagnosa($id)
	{
		return $this->db->where('id_klaim', $id)->delete('diagnosa');
	}

	function delete_tindakan($id)
	{
		return $this->db->where('id_klaim', $id)->delete('tindakan');
	}

	function get_data_rs()
	{
		return $this->db->query("
									SELECT * FROM data_rs LIMIT 1
			");
	}

	function get_kelengkapan_rj($id)
	{
		return $this->db->where('id_klaim', $id)->get_where('kelengkapan_rawat_jalan');
	}

	function get_kelengkapan_ri($id)
	{
		return $this->db->where('id_klaim', $id)->get_where('kelengkapan_rawat_inap');
	}

	function insert_rj($data)
	{
		return $this->db->insert('kelengkapan_rawat_jalan', $data);
	}

	function insert_ri($data)
	{
		return $this->db->insert('kelengkapan_rawat_inap', $data);
	}

	function update_rj($data, $id)
	{
		return $this->db->where('id_klaim', $id)->update('kelengkapan_rawat_jalan', $data);
	}

	function update_ri($data, $id)
	{
		return $this->db->where('id_klaim', $id)->update('kelengkapan_rawat_inap', $data);
	}

}
?>