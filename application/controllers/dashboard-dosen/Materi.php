<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('dosen');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-dosen/materi"));
		$this->load->model('materi_model');
	}

	public function index()
	{
		$value = array(
						'url_add' 		=> $this->page->base_url("/add"),
			    		'url_edit' 		=> $this->page->base_url("/edit"),
			    		'url_delete' 	=> $this->page->base_url("/delete"),
			    		'get_data' 		=> $this->materi_model->get(),
					);
		$this->page->title('Data Materi');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-materi');
		$this->page->data($value);
		$this->page->view();
	}

	public function add()
	{
		$value = array(
			    		'action' 		=> $this->page->base_url('/action'),
			    		'cancel' 		=> $this->page->base_url(),
					);
		$this->page->title('Tambah Materi');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-add-materi');
		$this->page->data($value);
		$this->page->view();
	}

	public function action()
	{
		$new_name = strtolower(str_replace(' ', '-', $this->input->post('judul'))).'_'.time();
		$data = array(
						'judul' 		=> $this->input->post('judul'),
						'keterangan' 	=> $this->input->post('keterangan'),
						'status' 		=> $this->input->post('status'),
						'file' 			=> $new_name.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION),
						'createby' 	=> $this->session->userdata('sess_id_user'),
			    		'createdate' 	=> date('Y-m-d H:i:s'),
					 );

		$config['upload_path']      = "file/";
        $config['allowed_types']    = "pdf";
        $config['file_name'] 		= $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
        	$execute = $this->materi_model->insert($data);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/materi'));
			}
        }else{
        	$notif = "Data gagal disimpan, ekstensi file harus PDF";
			$this->session->set_flashdata('failed', $notif);
			redirect(base_url('dashboard-dosen/materi/add'));
        }

		

	}

	public function edit($id='')
	{
		$cek = $this->materi_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->materi_model->get_data_by_id($id), 
					  );

			$this->page->title('Edit Materi');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-edit-materi');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function update($id='')
	{
		$value_data = $this->materi_model->get_data_by_id($id)->row();
		$cek = $this->materi_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			if (!empty($_FILES['file']['name'])) {
				$this->load->helper('file');
				$file_address = 'file/'.$value_data->file;
			    unlink($file_address);
			    #upload file

	            $new_name = strtolower(str_replace(' ', '-', $this->input->post('judul'))).'_'.time();
				$config['upload_path']      = "file/";
		        $config['allowed_types']    = "pdf";
		        $config['file_name'] 		= $new_name;
		        $this->load->library('upload', $config);

		        if ($this->upload->do_upload('file')) {
		        	$file_name = $new_name;
		        }else{
		        	$notif = "Data gagal disimpan, ekstensi file harus PDF";
					$this->session->set_flashdata('failed', $notif);
					redirect(base_url('dashboard-dosen/materi/edit'));
		        }

			}else{
				$file_name = $value_data->file;
			}

		
			$data = array(
							'judul' 		=> $this->input->post('judul'),
							'keterangan' 	=> $this->input->post('keterangan'),
							'file'			=> $file_name.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION),
							'status' 		=> $this->input->post('status'),
				    		'editby' 		=> $this->session->userdata('sess_id_user'),
				    		'editdate' 		=> date('Y-m-d H:i:s'),
						 );

			$execute = $this->materi_model->update($data,$id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/materi'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id='')
	{
		$cek = $this->materi_model->get_data_by_id($id)->num_rows();
		$data = $this->materi_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			
			if (!empty($data->file)) {
				$this->load->helper('file');
				$file_address = 'file/'.$data->file;
				unlink($file_address);
			}
			$execute = $this->materi_model->delete($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/materi'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

}