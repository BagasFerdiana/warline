<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('dosen');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-dosen/pengaturan"));
		$this->load->model('pengaturan_model');
	}

	public function index()
	{
		$value = array(
						'action' 	=> $this->page->base_url("/action")
					);
		$this->page->title('Pengaturan User Setting');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-pengaturan');
		$this->page->data($value);
		$this->page->view();
	}	

	public function action()
	{
		$password_lama = md5($this->input->post('password_lama')); 
		$password_baru = md5($this->input->post('password_baru'));
		$password_baru2 = md5($this->input->post('password_baru2'));

		$where = array(
						'password' => $password_lama,
						'id_user' => $this->session->userdata('sess_id_user'),
					);
		$cek = $this->pengaturan_model->get_where($where)->num_rows();

		if ($cek > 0) {
			if ($password_baru == $password_baru2) {
				$set = array('password' => $password_baru2);
				$query = $this->pengaturan_model->update_data($this->session->userdata('sess_id'), $set);
				if ($query) {
					$notif = "Data berhasil disimpan";
					$this->session->set_flashdata('success', $notif);
					redirect(base_url('dashboard-dosen/pengaturan'));
				}
			}else{
				$notif = "Kombinasi password salah";
				$this->session->set_flashdata('failed', $notif);
				redirect(base_url('dashboard-dosen/pengaturan'));
			}
		}else{
			$notif = "Password lama salah";
			$this->session->set_flashdata('failed', $notif);
			redirect(base_url('dashboard-dosen/pengaturan'));
		}


	}


}