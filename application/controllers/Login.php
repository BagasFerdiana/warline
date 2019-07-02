<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->page->set_base_url(site_url("login"));
		$this->load->model('login_model');
	}

	public function index()
	{

		if (!$this->session->userdata('sess_level') && !$this->session->userdata('sess_id_user') ) {
			$this->load->view('login');
		}else{
			if ($this->session->userdata('sess_level') == 'admin' ) {
				redirect(base_url('dashboard-admin/home'));
			}
		}
	}

	public function action()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where =array(
						'username' => $username,
						'password' => md5($password)
					);
		$cek = $this->login_model->cek_login("user", $where);
		if ($cek->num_rows() < 1) {
			$notification = "username dan password salah";
			$this->session->set_flashdata('gagal', $notification);
			redirect(base_url('login'));
		}else{
			$data_login = $cek->row();
			$data_session = array(
									'sess_id_user' => $data_login->id_user,
									'sess_level' => $data_login->level,
									'sess_username' => $data_login->username
								);
			$this->session->set_userdata($data_session);
			if ($this->session->userdata('sess_level') == 'admin' ) {
				redirect(base_url('dashboard-admin/home'));
			}else{
				echo "string";
			}
		}
	}

	public function signout()
	{
		$this->session->unset_userdata('sess_id_user');
		$this->session->unset_userdata('sess_level');
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
