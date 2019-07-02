<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('admin');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-admin/data_rs"));
		$this->load->model('data_rs_model');
	}

	public function index()
	{
		$cek_data = $this->data_rs_model->get();
		if ($cek_data->num_rows() > 0) {
			$url_action = $this->page->base_url("/update");
		}else{
			$url_action = $this->page->base_url("/action");
		}
		$value = array(
						'url_action' 	=> $url_action,
						'total_rows'	=> $cek_data->num_rows(),
			    		'get_data' 		=> $this->data_rs_model->get(),
					);
		$this->page->title('Data RS');
		$this->page->template('admin_template');
		$this->page->content('content/admin/data-rs');
		$this->page->data($value);
		$this->page->view();
	}

	public function action()
	{
		$data = array(
						'kode' 			=> $this->input->post('kode'),
						'nama' 			=> $this->input->post('nama'),
						'kelas' 		=> $this->input->post('kelas'),
						'jenis_tarif' 	=> $this->input->post('jenis_tarif'),
						'createby' 		=> $this->session->userdata('sess_id_user'),
			    		'createdate' 	=> date('Y-m-d H:i:s'),
					 );

    	$execute = $this->data_rs_model->insert($data);
		if ($execute) {
			$notif = "Data berhasil disimpan";
			$this->session->set_flashdata('success', $notif);
			redirect(base_url('dashboard-admin/data_rs'));
		}	

	}

	public function update()
	{
		
		$data = array(
						'kode' 			=> $this->input->post('kode'),
						'nama' 			=> $this->input->post('nama'),
						'kelas' 		=> $this->input->post('kelas'),
						'jenis_tarif' 	=> $this->input->post('jenis_tarif'),
			    		'editby' 		=> $this->session->userdata('sess_id_user'),
			    		'editdate' 		=> date('Y-m-d H:i:s'),
					 );

		$execute = $this->data_rs_model->update($data);
		if ($execute) {
			$notif = "Data berhasil disimpan";
			$this->session->set_flashdata('success', $notif);
			redirect(base_url('dashboard-admin/data_rs'));
		}

	}

}