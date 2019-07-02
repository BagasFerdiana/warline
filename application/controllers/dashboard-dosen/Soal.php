<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('dosen');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-dosen/soal"));
		$this->load->model('soal_model');
	}

	public function index()
	{
		$this->output->set_status_header('404');
       	$this->load->view('templates/404');
	}

	public function materi($id='')
	{
		$cek = $this->soal_model->get_materi_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(
						'url_add' 		=> $this->page->base_url("/add/".$id),
			    		'url_edit' 		=> $this->page->base_url("/edit/".$id),
			    		'url_butirsoal' => $this->page->base_url("/butirsoal/".$id),
			    		'url_delete' 	=> $this->page->base_url("/delete/".$id),
			    		'url_nilai_mhs' => $this->page->base_url("/nilai_mahasiswa/"),
			    		'get_materi' 	=> $this->soal_model->get_materi_by_id($id),
			    		'get_data' 		=> $this->soal_model->get($id),
					);
			$this->page->title('Data Soal');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-soal');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function butirsoal($id_materi='',$id='')
	{
		$cek = $this->soal_model->get_data_by_id($id_materi,$id)->num_rows();
		if ($cek > 0) {
			$value = array(
						'data' 		=> $this->soal_model->get_data_by_id($id_materi,$id), 
						'pertanyaan' => $this->soal_model->get_child_soal($id),
					  );

			$this->page->title('Daftar Butir Soal');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-butirsoal');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function nilai_mahasiswa($id='')
	{

		$value = array(
					'get_title' 	=> $this->soal_model->get_title_parent($id),
					'get_data' 		=> $this->soal_model->get_nilai_parent($id),
				  );

		$this->page->title('Daftar Nilai Soal');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-nilai-mahasiswa');
		$this->page->data($value);
		$this->page->view();
		
	}

	public function getbutirsoal($id='')
	{
		$cek = $this->soal_model->get_child_soal_by_id($id)->num_rows();
		$cek = $this->soal_model->get_child_soal_by_id($id)->row();
		$json = json_encode($cek);
		echo $json;
	}

	public function deletebutirsoal($id='')
	{
		$id_child_soal = $this->input->get('id_child_soal');

		return $this->soal_model->deletebutirsoal($id_child_soal);

	}

	public function showbutirsoal($id_materi='',$id='')
	{
		$value = array(
						'data' 		=> $this->soal_model->get_data_by_id($id_materi,$id), 
						'pertanyaan' => $this->soal_model->get_child_soal($id),
					  );
		$this->load->view('content/dosen-showbutirsoal', $value);
	}

	public function add($id='')
	{
		$cek = $this->soal_model->get_materi_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(
				    		'action' 		=> $this->page->base_url('/action/'.$id),
				    		'cancel' 		=> $this->page->base_url(),
				    		'data_jenis_soal' 	=> $this->soal_model->get_jenis_soal(),
						);
			$this->page->title('Tambah Soal');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-add-soal');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
	   		$this->load->view('templates/404');
		}
	}

	public function action($id='')
	{
		$cek = $this->soal_model->get_materi_by_id($id)->num_rows();
		if ($cek > 0) {
			$data = array(
							'id_jenis_soal' 	=> $this->input->post('id_jenis_soal'),
							'id_materi' 		=> $id,
							'judul_soal' 		=> $this->input->post('judul_soal'),
							'keterangan' 		=> $this->input->post('keterangan'),
							'status' 			=> 1,
							'createby' 			=> $this->session->userdata('sess_id_user'),
				    		'createdate' 		=> date('Y-m-d H:i:s'),
						 );

	    	$execute = $this->soal_model->insert($data);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/soal/materi/'.$id));
			}	
		}else{
			$this->output->set_status_header('404');
	   		$this->load->view('templates/404');
		}
	}

	public function edit($id_materi='', $id='')
	{
		$cek = $this->soal_model->get_data_by_id($id_materi,$id)->num_rows();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id_materi/$id"),
			    		'cancel' 	=> $this->page->base_url(),
				    	'data_jenis_soal' 	=> $this->soal_model->get_jenis_soal(),
						'data' 		=> $this->soal_model->get_data_by_id($id_materi,$id), 
					  );

			$this->page->title('Edit Soal');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-edit-soal');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function update($id_materi='',$id='')
	{
		$value_data = $this->soal_model->get_data_by_id($id_materi,$id)->row();
		$cek = $this->soal_model->get_data_by_id($id_materi,$id)->num_rows();
		if ($cek > 0) {
		
			$data = array(
							'id_jenis_soal' 	=> $this->input->post('id_jenis_soal'),
							'judul_soal' 		=> $this->input->post('judul_soal'),
							'keterangan' 		=> $this->input->post('keterangan'),
				    		'editby' 		=> $this->session->userdata('sess_id_user'),
				    		'editdate' 		=> date('Y-m-d H:i:s'),
						 );

			$execute = $this->soal_model->update($data,$id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/soal/materi/'.$id_materi));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id_materi,$id='')
	{
		$cek = $this->soal_model->get_data_by_id($id_materi,$id)->num_rows();
		$data = $this->soal_model->get_data_by_id($id_materi,$id)->row();
		if ($cek > 0) {
			
			$execute = $this->soal_model->delete($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/soal/materi/'.$id_materi));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function action_butir()
	{

		$data = array(	
						'id_parent_soal' 	=> $this->input->post('id_parent_soal'),
						'pertanyaan' 		=> $this->input->post('pertanyaan'),
						'createby' 			=> $this->session->userdata('sess_id_user'),
			    		'createdate' 		=> date('Y-m-d H:i:s'),
						 );
		$execute = $this->soal_model->insert_butir_soal($data);
		if ($execute) {
			$last_id = $execute;
			for ($i=1; $i < 6; $i++) { 
				if (!empty($this->input->post('jawaban'.$i))) {
					$data_insert = array(
											'id_child_soal' => $last_id,
											'jawaban' => $this->input->post('jawaban'.$i), 
											'status' => $this->input->post('status'.$i), 
											'createby' => $this->session->userdata('sess_id_user'), 
											'createdate' => date('Y-m-d H:i:s'), 
									);
					$exec = $this->soal_model->insert_pertanyaan($data_insert);
				}
			}

			echo '<div class="form-group close-alert">
                                <div class="col-xs-12">
                                    <div class="alert alert-success">
                                        Data berhasil disimpan
                                    </div>
                                </div>
                            </div>';
		}
	}

	public function update_butir($id='')
	{
		$data = array(	
						'pertanyaan' 		=> $this->input->post('pertanyaan'),
						'editby' 			=> $this->session->userdata('sess_id_user'),
			    		'editdate' 			=> date('Y-m-d H:i:s'),
						 );
		$execute = $this->soal_model->update_butir_soal($data,$id);
		if ($execute) {
			for ($i=1; $i < 6; $i++) { 
				if ($this->input->post('id_child_jawaban'.$i) == 'null' ) {
					if (!empty($this->input->post('jawaban'.$i))) {
						$val_id_child_soal = $id;
						$data_insert = array(
												'id_child_soal' => $val_id_child_soal,
												'jawaban' => $this->input->post('jawaban'.$i), 
												'status' => $this->input->post('status'.$i),
												'createby' => $this->session->userdata('sess_id_user'), 
												'createdate' => date('Y-m-d H:i:s'), 
										);
						$exec = $this->soal_model->insert_pertanyaan($data_insert);
					}
					
				}else {
					$val_id_child_jawaban = $this->input->post('id_child_jawaban'.$i);
					if (!empty($this->input->post('jawaban'.$i))) {
						$data_update = array(
												'jawaban' => $this->input->post('jawaban'.$i),
												'status' => $this->input->post('status'.$i),
												'editby' => $this->session->userdata('sess_id_user'), 
												'editdate' => date('Y-m-d H:i:s'), 
											);
						$exec = $this->soal_model->update_butir_jawaban($data_update, $val_id_child_jawaban);
					}else{
						$exec = $this->soal_model->delete_butir_jawaban($val_id_child_jawaban);
					}
				}
			}

			echo '<div class="form-group close-alert">
                                <div class="col-xs-12">
                                    <div class="alert alert-success">
                                        Data berhasil disimpan
                                    </div>
                                </div>
                            </div>';
				
		}
	}


}