<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenissoal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('dosen');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-dosen/jenissoal"));
		$this->load->model('jenissoal_model');
	}

	public function index()
	{
		$value = array(
						'url_add' 		=> $this->page->base_url("/add"),
			    		'url_edit' 		=> $this->page->base_url("/edit"),
			    		'url_delete' 	=> $this->page->base_url("/delete"),
			    		'get_data' 		=> $this->jenissoal_model->get(),
					);
		$this->page->title('Data Jenis Soal');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-jenis-soal');
		$this->page->data($value);
		$this->page->view();
	}

	public function add()
	{
		$value = array(
			    		'action' 		=> $this->page->base_url('/action'),
			    		'cancel' 		=> $this->page->base_url(),
					);
		$this->page->title('Tambah Jenis Soal');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-add-jenis-soal');
		$this->page->data($value);
		$this->page->view();
	}

	public function action()
	{
		$data = array(
						'nama_jenis_soal' 		=> $this->input->post('nama_jenis_soal'),
						'status_pengerjaan' 	=> $this->input->post('status_pengerjaan'),
						'createby' 	=> $this->session->userdata('sess_id_user'),
			    		'createdate' 	=> date('Y-m-d H:i:s'),
					 );

    	$execute = $this->jenissoal_model->insert($data);
		if ($execute) {
			$notif = "Data berhasil disimpan";
			$this->session->set_flashdata('success', $notif);
			redirect(base_url('dashboard-dosen/jenissoal'));
		}	

	}

	public function edit($id='')
	{
		$cek = $this->jenissoal_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->jenissoal_model->get_data_by_id($id), 
					  );

			$this->page->title('Edit Jenis Soal');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-edit-jenis-soal');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function update($id='')
	{
		$value_data = $this->jenissoal_model->get_data_by_id($id)->row();
		$cek = $this->jenissoal_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
		
			$data = array(
							'nama_jenis_soal' 		=> $this->input->post('nama_jenis_soal'),
							'status_pengerjaan' 	=> $this->input->post('status_pengerjaan'),
				    		'editby' 		=> $this->session->userdata('sess_id_user'),
				    		'editdate' 		=> date('Y-m-d H:i:s'),
						 );

			$execute = $this->jenissoal_model->update($data,$id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/jenissoal'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id='')
	{
		$cek = $this->jenissoal_model->get_data_by_id($id)->num_rows();
		$data = $this->jenissoal_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			
			$execute = $this->jenissoal_model->delete($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/jenissoal'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

}