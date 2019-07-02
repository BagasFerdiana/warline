<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tindakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('admin');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-admin/data_tindakan"));
		$this->load->model('data_tindakan_model');
	}

	public function index()
	{
		$value = array(
						'url_add' 		=> $this->page->base_url("/add"),
			    		'url_edit' 		=> $this->page->base_url("/edit"),
			    		'url_delete' 	=> $this->page->base_url("/delete"),
			    		'get_data' 		=> $this->data_tindakan_model->get(),
					);
		$this->page->title('Data Tindakan');
		$this->page->template('admin_template');
		$this->page->content('content/admin/data-tindakan');
		$this->page->data($value);
		$this->page->view();
	}

	public function add()
	{
		$value = array(
			    		'action' 		=> $this->page->base_url('/action'),
			    		'cancel' 		=> $this->page->base_url(),
					);
		$this->page->title('Tambah Data Tindakan');
		$this->page->template('admin_template');
		$this->page->content('content/admin/add-data-tindakan');
		$this->page->data($value);
		$this->page->view();
	}

	public function action()
	{
		$data = array(
						'kode' 			=> $this->input->post('kode'),
						'nama' 			=> $this->input->post('nama'),
						'harga' 		=> $this->input->post('harga'),
						'createby' 		=> $this->session->userdata('sess_id_user'),
			    		'createdate' 	=> date('Y-m-d H:i:s'),
					 );

    	$execute = $this->data_tindakan_model->insert($data);
		if ($execute) {
			$notif = "Data berhasil disimpan";
			$this->session->set_flashdata('success', $notif);
			redirect(base_url('dashboard-admin/data_tindakan'));
		}	

	}

	public function edit($id='')
	{
		$cek = $this->data_tindakan_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->data_tindakan_model->get_data_by_id($id), 
					  );

			$this->page->title('Edit Data Diagnosa');
			$this->page->template('admin_template');
			$this->page->content('content/admin/edit-data-tindakan');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
		
	}

	public function update($id='')
	{
		$value_data = $this->data_tindakan_model->get_data_by_id($id)->row();
		$cek = $this->data_tindakan_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
		
			$data = array(
							'kode' 				=> $this->input->post('kode'),
							'nama' 				=> $this->input->post('nama'),
							'harga' 			=> $this->input->post('harga'),
				    		'editby' 		=> $this->session->userdata('sess_id_user'),
				    		'editdate' 		=> date('Y-m-d H:i:s'),
						 );

			$execute = $this->data_tindakan_model->update($data,$id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/data_tindakan'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id='')
	{
		$cek = $this->data_tindakan_model->get_data_by_id($id)->num_rows();
		$data = $this->data_tindakan_model->get_data_by_id($id)->row();
		if ($cek > 0) {
			
			$execute = $this->data_tindakan_model->delete($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/data_tindakan'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

}