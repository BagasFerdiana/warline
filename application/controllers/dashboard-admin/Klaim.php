<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klaim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('admin');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-admin/klaim"));
		$this->load->model('klaim_model');
	}

	public function data($id='')
	{

		$cek = $this->klaim_model->get_pasien_by_id($id)->num_rows();
		$pasien = $this->klaim_model->get_pasien_by_id($id)->row();
		if ($cek > 0) {
			$value = array(
							'url_add' 		=> $this->page->base_url("/add/$id"),
				    		'url_edit' 		=> $this->page->base_url("/edit"),
				    		'url_kelengkapan'  => $this->page->base_url("/kelengkapan"),
				    		'url_print' 	=> $this->page->base_url("/m_print"),
				    		'url_sep_print'	=> $this->page->base_url("/sep_print"),
				    		'url_delete' 	=> $this->page->base_url("/delete"),
				    		'get_data' 		=> $this->klaim_model->get_klaim_by_pasien($id),
						);
			$this->page->title('Data Klaim Pasien '.$pasien->nama.' ('.$pasien->no_rm.')');
			$this->page->template('admin_template');
			$this->page->content('content/admin/klaim');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}

	}

	public function add($id='')
	{
		$cek = $this->klaim_model->get_pasien_by_id($id)->num_rows();
		$pasien = $this->klaim_model->get_pasien_by_id($id)->row();
		if ($cek > 0) {
			$cek_no_surat = $this->klaim_model->get_no_surat()->num_rows();
			$get_no_surat = $this->klaim_model->get_no_surat()->row();
			if ($cek_no_surat > 0) {
				$no_surat = str_replace(0, '', $get_no_surat->no_sep);
				$next_no  = str_pad($no_surat + 1, 8, 0, STR_PAD_LEFT);
			}else{
				$no_surat = '00000001';
				$next_no  = $no_surat;
			}

			$value = array(
				    		'action' 		=> $this->page->base_url('/action/'.$id),
				    		'no_sep'		=> $next_no,
				    		'dpjp'			=> $this->klaim_model->get_data_dpjp(),
				    		'diagnosa'		=> $this->klaim_model->get_data_diagnosa(),
				    		'tindakan'		=> $this->klaim_model->get_data_tindakan(),
				    		'cancel' 		=> $this->page->base_url(),
						);
			$this->page->title('Tambah Data Klaim Pasien '.$pasien->nama.' ('.$pasien->no_rm.')');
			$this->page->template('admin_template');
			$this->page->content('content/admin/add-klaim');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function action($id='')
	{
		$cek = $this->klaim_model->get_pasien_by_id($id)->num_rows();
		$pasien = $this->klaim_model->get_pasien_by_id($id)->row();
		if ($cek > 0) {
			$data = array(
							'id_pasien'				=> $id,
							'id_dpjp' 				=> $this->input->post('id_dpjp'),
							'jaminan' 				=> $this->input->post('jaminan'),
							'no_peserta' 			=> $this->input->post('no_peserta'),
							'no_sep' 				=> $this->input->post('no_sep'),
							'cob' 					=> $this->input->post('cob'),
							'jenis_rawat' 			=> $this->input->post('jenis_rawat'),
							'tgl_masuk' 			=> date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tgl_masuk')))),
							'tgl_keluar' 			=> date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tgl_keluar')))),
							'kelas_rawat' 			=> $this->input->post('kelas_rawat'),
							'naik_kelas' 			=> $this->input->post('naik_kelas'),
							'lama_hari_naik_kelas' 	=> $this->input->post('lama_hari_naik_kelas'),
							'lama_dirawat' 			=> $this->input->post('lama_dirawat'),
							'berat_lahir' 			=> $this->input->post('berat_lahir'),
							'adl_score_sub_acute' 	=> $this->input->post('adl_score_sub_acute'),
							'adl_score_chronic' 	=> $this->input->post('adl_score_chronic'),
							'cara_pulang' 			=> $this->input->post('cara_pulang'),
							'jenis_tarif' 			=> $this->input->post('jenis_tarif'),
							'createby' 				=> $this->session->userdata('sess_id_user'),
				    		'createdate' 			=> date('Y-m-d H:i:s'),
						 );

	    	$execute = $this->klaim_model->insert($data);
			if ($execute) {
				$id_klaim = $execute;
				$data_tarif = array(
								'id_klaim'			=> $id_klaim,
								'sewa_poliklinik' 	=> str_replace('.', '', $this->input->post('sewa_poliklinik')), 
								'sewa_kamar' 		=> str_replace('.', '', $this->input->post('sewa_kamar')), 
								'laboratorium' 		=> str_replace('.', '', $this->input->post('laboratorium')), 
								'rawat_intensif' 	=> str_replace('.', '', $this->input->post('rawat_intensif')), 
								'radiologi' 		=> str_replace('.', '', $this->input->post('radiologi')), 
								'jasa_dokter'		=> str_replace('.', '', $this->input->post('jasa_dokter')), 
								'pelayanan_darah' 	=> str_replace('.', '', $this->input->post('pelayanan_darah')), 
								'prosedur_bedah' 	=> str_replace('.', '', $this->input->post('prosedur_bedah')), 
								'obat' 				=> str_replace('.', '', $this->input->post('obat')), 
								'prosedur_non_bedah' => str_replace('.', '', $this->input->post('prosedur_non_bedah')), 
								'bmhp' 				=> str_replace('.', '', $this->input->post('bmhp')), 
								'penunjang' 		=> str_replace('.', '', $this->input->post('penunjang')), 
								'alkes' 			=> str_replace('.', '', $this->input->post('alkes')), 
								'keperawatan' 		=> str_replace('.', '', $this->input->post('keperawatan')), 
								'sewa_alat' 		=> str_replace('.', '', $this->input->post('sewa_alat')), 
								'tenaga_ahli' 		=> str_replace('.', '', $this->input->post('tenaga_ahli')), 
								'administrasi' 		=> str_replace('.', '', $this->input->post('administrasi')), 
								'rehabilitasi' 		=> str_replace('.', '', $this->input->post('rehabilitasi')), 
							);

				$data_diagnosa = array(
								'id_klaim' => $id_klaim,
								'id_data_diagnosa_primer' => $this->input->post('id_data_diagnosa_primer'), 
								'id_data_diagnosa_sekunder1' => $this->input->post('id_data_diagnosa_sekunder1'),
								'id_data_diagnosa_sekunder2' => $this->input->post('id_data_diagnosa_sekunder2'),
								'id_data_diagnosa_sekunder3' => $this->input->post('id_data_diagnosa_sekunder3'),
								'id_data_diagnosa_sekunder4' => $this->input->post('id_data_diagnosa_sekunder4'),
							);

				$data_tindakan = array(
								'id_klaim' => $id_klaim,
								'id_data_tindakan_primer' => $this->input->post('id_data_tindakan_primer'), 
								'id_data_tindakan_sekunder1' => $this->input->post('id_data_tindakan_sekunder1'),
								'id_data_tindakan_sekunder2' => $this->input->post('id_data_tindakan_sekunder2'),
								'id_data_tindakan_sekunder3' => $this->input->post('id_data_tindakan_sekunder3'),
								'id_data_tindakan_sekunder4' => $this->input->post('id_data_tindakan_sekunder4'),
							);
				$execute_sub = $this->klaim_model->insert_tarif($data_tarif);
				$execute_sub = $this->klaim_model->insert_diagnosa($data_diagnosa);
				$execute_sub = $this->klaim_model->insert_tindakan($data_tindakan);
				if ($execute_sub) {
					
					$notif = "Data berhasil disimpan";
					$this->session->set_flashdata('success', $notif);
					redirect(base_url('dashboard-admin/klaim/data/'.$id));

				}
			}	
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function edit($id='')
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'dpjp'		=> $this->klaim_model->get_data_dpjp(),
			    		'diagnosa'	=> $this->klaim_model->get_data_diagnosa(),
			    		'tindakan'	=> $this->klaim_model->get_data_tindakan(),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->klaim_model->get_data_by_id($id), 
					  );

			$this->page->title('Edit Data Klaim '.$data->nama.' ('.$data->no_rm.')');
			$this->page->template('admin_template');
			$this->page->content('content/admin/edit-klaim');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function update($id='')
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$pasien = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {
		
			$data = array(
				'id_dpjp' 				=> $this->input->post('id_dpjp'),
				'jaminan' 				=> $this->input->post('jaminan'),
				'no_peserta' 			=> $this->input->post('no_peserta'),
				'cob' 					=> $this->input->post('cob'),
				'jenis_rawat' 			=> $this->input->post('jenis_rawat'),
				'tgl_masuk' 			=> date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tgl_masuk')))),
				'tgl_keluar' 			=> date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tgl_keluar')))),
				'kelas_rawat' 			=> $this->input->post('kelas_rawat'),
				'naik_kelas' 			=> $this->input->post('naik_kelas'),
				'lama_hari_naik_kelas' 	=> $this->input->post('lama_hari_naik_kelas'),
				'lama_dirawat' 			=> $this->input->post('lama_dirawat'),
				'berat_lahir' 			=> $this->input->post('berat_lahir'),
				'adl_score_sub_acute' 	=> $this->input->post('adl_score_sub_acute'),
				'adl_score_chronic' 	=> $this->input->post('adl_score_chronic'),
				'cara_pulang' 			=> $this->input->post('cara_pulang'),
				'jenis_tarif' 			=> $this->input->post('jenis_tarif'),
				'editby' 				=> $this->session->userdata('sess_id_user'),
	    		'editdate' 				=> date('Y-m-d H:i:s'),
			 );

			$data_tarif = array(
				'sewa_poliklinik' 	=> str_replace('.', '', $this->input->post('sewa_poliklinik')), 
				'sewa_kamar' 		=> str_replace('.', '', $this->input->post('sewa_kamar')), 
				'laboratorium' 		=> str_replace('.', '', $this->input->post('laboratorium')), 
				'rawat_intensif' 	=> str_replace('.', '', $this->input->post('rawat_intensif')), 
				'radiologi' 		=> str_replace('.', '', $this->input->post('radiologi')), 
				'jasa_dokter'		=> str_replace('.', '', $this->input->post('jasa_dokter')), 
				'pelayanan_darah' 	=> str_replace('.', '', $this->input->post('pelayanan_darah')), 
				'prosedur_bedah' 	=> str_replace('.', '', $this->input->post('prosedur_bedah')), 
				'obat' 				=> str_replace('.', '', $this->input->post('obat')), 
				'prosedur_non_bedah' => str_replace('.', '', $this->input->post('prosedur_non_bedah')), 
				'bmhp' 				=> str_replace('.', '', $this->input->post('bmhp')), 
				'penunjang' 		=> str_replace('.', '', $this->input->post('penunjang')), 
				'alkes' 			=> str_replace('.', '', $this->input->post('alkes')), 
				'keperawatan' 		=> str_replace('.', '', $this->input->post('keperawatan')), 
				'sewa_alat' 		=> str_replace('.', '', $this->input->post('sewa_alat')), 
				'tenaga_ahli' 		=> str_replace('.', '', $this->input->post('tenaga_ahli')), 
				'administrasi' 		=> str_replace('.', '', $this->input->post('administrasi')), 
				'rehabilitasi' 		=> str_replace('.', '', $this->input->post('rehabilitasi')), 
			);

			$data_diagnosa = array(
				'id_data_diagnosa_primer' => $this->input->post('id_data_diagnosa_primer'), 
				'id_data_diagnosa_sekunder1' => $this->input->post('id_data_diagnosa_sekunder1'),
				'id_data_diagnosa_sekunder2' => $this->input->post('id_data_diagnosa_sekunder2'),
				'id_data_diagnosa_sekunder3' => $this->input->post('id_data_diagnosa_sekunder3'),
				'id_data_diagnosa_sekunder4' => $this->input->post('id_data_diagnosa_sekunder4'),
			);

			$data_tindakan = array(
				'id_data_tindakan_primer' => $this->input->post('id_data_tindakan_primer'), 
				'id_data_tindakan_sekunder1' => $this->input->post('id_data_tindakan_sekunder1'),
				'id_data_tindakan_sekunder2' => $this->input->post('id_data_tindakan_sekunder2'),
				'id_data_tindakan_sekunder3' => $this->input->post('id_data_tindakan_sekunder3'),
				'id_data_tindakan_sekunder4' => $this->input->post('id_data_tindakan_sekunder4'),
			);

			$execute = $this->klaim_model->update($id, $data);
			$execute = $this->klaim_model->update_tarif($id, $data_tarif);
			$execute = $this->klaim_model->update_diagnosa($id, $data_diagnosa);
			$execute = $this->klaim_model->update_tindakan($id, $data_tindakan);

			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/klaim/data/'.$pasien->id_pasien));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id='')
	{
		$cek = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			$id_pasien = $data->id_pasien;
			$execute = $this->klaim_model->delete($id);
			$execute = $this->klaim_model->delete_tarif($id);
			$execute = $this->klaim_model->delete_diagnosa($id);
			$execute = $this->klaim_model->delete_tindakan($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/klaim/data/'.$id_pasien));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function m_print($id='')
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'dpjp'		=> $this->klaim_model->get_data_dpjp(),
			    		'diagnosa'	=> $this->klaim_model->get_data_diagnosa(),
			    		'tindakan'	=> $this->klaim_model->get_data_tindakan(),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->klaim_model->get_data_by_id($id)->row(), 
						'data_rs'	=> $this->klaim_model->get_data_rs()->row(),
						'title'		=> 'Print Data Klaim '.$data->nama.' ('.$data->no_rm.')'
					  );

			$this->load->view('content/admin/print-klaim', $value);
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function sep_print($id='')
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'dpjp'		=> $this->klaim_model->get_data_dpjp(),
			    		'diagnosa'	=> $this->klaim_model->get_data_diagnosa(),
			    		'tindakan'	=> $this->klaim_model->get_data_tindakan(),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->klaim_model->get_data_by_id($id)->row(), 
						'data_rs'	=> $this->klaim_model->get_data_rs()->row(),
						'title'		=> 'Print Data Klaim '.$data->nama.' ('.$data->no_rm.')'
					  );

			$this->load->view('content/admin/print-sep-klaim', $value);
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function kelengkapan($id='')
	{
		$cek_data_rj = $this->klaim_model->get_kelengkapan_rj($id);
		if ($cek_data_rj->num_rows() > 0) {
			$url_action_rj = $this->page->base_url("/update_rj/$id");
		}else{
			$url_action_rj = $this->page->base_url("/action_rj/$id");
		}

		$cek_data_ri = $this->klaim_model->get_kelengkapan_ri($id);
		if ($cek_data_ri->num_rows() > 0) {
			$url_action_ri = $this->page->base_url("/update_ri/$id");
		}else{
			$url_action_ri = $this->page->base_url("/action_ri/$id");
		}
		$value = array(
						'url_action_rj' => $url_action_rj,
						'url_action_ri' => $url_action_ri,
						'total_rows_rj'	=> $cek_data_rj->num_rows(),
						'total_rows_ri'	=> $cek_data_ri->num_rows(),
			    		'get_data_rj' 	=> $this->klaim_model->get_kelengkapan_rj($id),
			    		'get_data_ri' 	=> $this->klaim_model->get_kelengkapan_ri($id),
					);
		$this->page->title('Data Kelengkapan Klaim');
		$this->page->template('admin_template');
		$this->page->content('content/admin/kelengkapan');
		$this->page->data($value);
		$this->page->view();
	}

	public function action_rj($id)
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {

			$data = array(
							'id_klaim'			=> $id,
							'kartu_asuransi' 	=> $this->input->post('kartu_asuransi'),
							'ktp' 				=> $this->input->post('ktp'),
							'kk' 				=> $this->input->post('kk'),
							'rujukan' 			=> $this->input->post('rujukan'),
							'surat_kontrol' 	=> $this->input->post('surat_kontrol'),
							'sep' 				=> $this->input->post('sep'),
							'resume_medis' 		=> $this->input->post('resume_medis'),
							'lembar_verifikasi' => $this->input->post('lembar_verifikasi'),
							'billing' 			=> $this->input->post('billing'),
							'penunjang' 		=> $this->input->post('penunjang'),
							'createby' 			=> $this->session->userdata('sess_id_user'),
				    		'createdate' 		=> date('Y-m-d H:i:s'),
						 );

	    	$execute = $this->klaim_model->insert_rj($data);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/klaim/kelengkapan/'.$id));
			}	
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}

	}

	public function update_rj($id)
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {

			$data = array(
							'kartu_asuransi' 	=> $this->input->post('kartu_asuransi'),
							'ktp' 				=> $this->input->post('ktp'),
							'kk' 				=> $this->input->post('kk'),
							'rujukan' 			=> $this->input->post('rujukan'),
							'surat_kontrol' 	=> $this->input->post('surat_kontrol'),
							'sep' 				=> $this->input->post('sep'),
							'resume_medis' 		=> $this->input->post('resume_medis'),
							'lembar_verifikasi' => $this->input->post('lembar_verifikasi'),
							'billing' 			=> $this->input->post('billing'),
							'penunjang' 		=> $this->input->post('penunjang'),
							'editby' 			=> $this->session->userdata('sess_id_user'),
				    		'editdate' 			=> date('Y-m-d H:i:s'),
						 );

	    	$execute = $this->klaim_model->update_rj($data, $id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/klaim/kelengkapan/'.$id));
			}	
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}

	}

	public function action_ri($id)
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {

			$data = array(
							'id_klaim'			=> $id,
							'kartu_asuransi' 	=> $this->input->post('kartu_asuransi'),
							'ktp' 				=> $this->input->post('ktp'),
							'kk' 				=> $this->input->post('kk'),
							'rujukan' 			=> $this->input->post('rujukan'),
							'pengantar' 		=> $this->input->post('pengantar'),
							'sep' 				=> $this->input->post('sep'),
							'resume_medis' 		=> $this->input->post('resume_medis'),
							'lembar_verifikasi' => $this->input->post('lembar_verifikasi'),
							'billing' 			=> $this->input->post('billing'),
							'penunjang' 		=> $this->input->post('penunjang'),
							'tindakan_operatif' => $this->input->post('tindakan_operatif'),
							'pelayanan_darah' 	=> $this->input->post('pelayanan_darah'),
							'createby' 			=> $this->session->userdata('sess_id_user'),
				    		'createdate' 		=> date('Y-m-d H:i:s'),
						 );

	    	$execute = $this->klaim_model->insert_ri($data);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/klaim/kelengkapan/'.$id));
			}	
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}

	}

	public function update_ri($id)
	{
		$cek  = $this->klaim_model->get_data_by_id($id)->num_rows();
		$data = $this->klaim_model->get_data_by_id($id)->row();
		if ($cek > 0) {

			$data = array(
							'kartu_asuransi' 	=> $this->input->post('kartu_asuransi'),
							'ktp' 				=> $this->input->post('ktp'),
							'kk' 				=> $this->input->post('kk'),
							'rujukan' 			=> $this->input->post('rujukan'),
							'pengantar' 		=> $this->input->post('pengantar'),
							'sep' 				=> $this->input->post('sep'),
							'resume_medis' 		=> $this->input->post('resume_medis'),
							'lembar_verifikasi' => $this->input->post('lembar_verifikasi'),
							'billing' 			=> $this->input->post('billing'),
							'penunjang' 		=> $this->input->post('penunjang'),
							'tindakan_operatif' => $this->input->post('tindakan_operatif'),
							'pelayanan_darah' 	=> $this->input->post('pelayanan_darah'),
							'editby' 			=> $this->session->userdata('sess_id_user'),
				    		'editdate' 			=> date('Y-m-d H:i:s'),
						 );

	    	$execute = $this->klaim_model->update_ri($data, $id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/klaim/kelengkapan/'.$id));
			}	
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}

	}


}