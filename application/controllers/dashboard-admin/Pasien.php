<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('admin');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-admin/pasien"));
		$this->load->model('pasien_model');
	}

	public function index()
	{
		$value = array(
						'url_add' 		=> $this->page->base_url("/add"),
			    		'url_edit' 		=> $this->page->base_url("/edit"),
			    		'url_klaim' 	=> base_url('dashboard-admin/klaim/data'),
			    		'url_delete' 	=> $this->page->base_url("/delete"),
			    		'get_data' 		=> $this->pasien_model->get(),
					);
		$this->page->title('Data Pasien');
		$this->page->template('admin_template');
		$this->page->content('content/admin/pasien');
		$this->page->data($value);
		$this->page->view();
	}

	public function add()
	{
		$value = array(
			    		'action' 		=> $this->page->base_url('/action'),
			    		'cancel' 		=> $this->page->base_url(),
					);
		$this->page->title('Tambah Data Pasien');
		$this->page->template('admin_template');
		$this->page->content('content/admin/add-pasien');
		$this->page->data($value);
		$this->page->view();
	}

	public function action()
	{
		$data = array(
						'no_rm' 		=> $this->input->post('no_rm'),
						'nama' 			=> $this->input->post('nama'),
						'tgl_lahir' 	=> date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tgl_lahir')))),
						'jk' 			=> $this->input->post('jk'),
						'no_telp' 		=> $this->input->post('no_telp'),
						'createby' 		=> $this->session->userdata('sess_id_user'),
			    	'createdate' 	=> date('Y-m-d H:i:s'),
					 );

    	$execute = $this->pasien_model->insert($data);
		if ($execute) {
			$notif = "Data berhasil disimpan";
			$this->session->set_flashdata('success', $notif);
			redirect(base_url('dashboard-admin/pasien'));
		}

	}

	public function edit($id='')
	{
		$cek = $this->pasien_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->pasien_model->get_data_by_id($id),
					  );

			$this->page->title('Edit Data Pasien');
			$this->page->template('admin_template');
			$this->page->content('content/admin/edit-pasien');
			$this->page->data($value);
			$this->page->view();
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}

	}

	public function update($id='')
	{
		$value_data = $this->pasien_model->get_data_by_id($id)->row();
		$cek = $this->pasien_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {

			$data = array(
						'no_rm' 		=> $this->input->post('no_rm'),
						'nama' 			=> $this->input->post('nama'),
						'tgl_lahir' 	=> date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tgl_lahir')))),
						'jk' 			=> $this->input->post('jk'),
						'no_telp' 		=> $this->input->post('no_telp'),
			    		'editby' 		=> $this->session->userdata('sess_id_user'),
			    		'editdate' 		=> date('Y-m-d H:i:s'),
						 );

			$execute = $this->pasien_model->update($data,$id);
			if ($execute) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/pasien'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id='')
	{
		$cek = $this->pasien_model->get_data_by_id($id)->num_rows();
		$data = $this->pasien_model->get_data_by_id($id)->row();
		if ($cek > 0) {

			$execute = $this->pasien_model->delete($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-admin/pasien'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

}
