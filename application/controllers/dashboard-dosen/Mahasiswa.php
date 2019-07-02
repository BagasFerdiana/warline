<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_level('dosen');
		date_default_timezone_set('Asia/Jakarta');
		$this->page->set_base_url(base_url("dashboard-dosen/mahasiswa"));
		$this->load->model('mahasiswa_model');
	}

	public function index()
	{
		$value = array(
						'url_add' 		=> $this->page->base_url("/add"),
			    		'url_edit' 		=> $this->page->base_url("/edit"),
			    		'url_delete' 	=> $this->page->base_url("/delete"),
			    		'get_data' 		=> $this->mahasiswa_model->get(),
					);
		$this->page->title('Data Mahasiswa');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-mahasiswa');
		$this->page->data($value);
		$this->page->view();
	}	

	public function add()
	{
		$value = array(
			    		'action' 		=> $this->page->base_url('/action'),
			    		'cancel' 		=> $this->page->base_url(),
					);
		$this->page->title('Tambah Mahasiswa');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-add-mahasiswa');
		$this->page->data($value);
		$this->page->view();
	}

	public function detail($id='')
	{
		$cek = $this->siswa_model->get_log_by_id_log($id)->num_rows();
		if ($cek > 0) {
			$data = $this->siswa_model->get_log_by_id_log($id)->row();

			echo $data->deskripsi;

		}else{
			echo "Data kosong";
		}
	}

	public function action()
	{
		$data = array(
						'username' 		=> $this->input->post('username'),
						'password' 		=> md5($this->input->post('password')),
						'level'			=> 'mahasiswa',
						'status'		=> 1,
						'createby'		=> $this->session->userdata('sess_id_user'),
						'createdate'	=> date('Y-m-d H:i:s'),
					 );
		$cek = $this->mahasiswa_model->get_data_by_username($data['username'])->num_rows();
		if ($cek < 1) {
			$execute = $this->mahasiswa_model->insert($data);
			if ($execute) {
				$id_user = $execute;
				$value = array(
								'id_user'		=> $id_user,
								'nama' 			=> $this->input->post('nama'),
								'nim' 			=> $this->input->post('nim'),
								'kelas' 		=> $this->input->post('kelas'),
							  );
				$result = $this->mahasiswa_model->insert_data_user($value);
				if ($result) {
					$notif = "Data berhasil disimpan";
					$this->session->set_flashdata('success', $notif);
					redirect(base_url('dashboard-dosen/mahasiswa'));
				}
				
			}
		}

	}


	public function edit($id='')
	{
		$cek = $this->mahasiswa_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			$value = array(	
						'action' 	=> $this->page->base_url("/update/$id"),
			    		'cancel' 	=> $this->page->base_url(),
						'data' 		=> $this->mahasiswa_model->get_data_by_id($id), 
					  );

			$this->page->title('Edit Mahasiswa');
			$this->page->template('dosen_template');
			$this->page->content('content/dosen-edit-mahasiswa');
			$this->page->data($value);
			$this->page->view();
		}else{
			redirect(base_url('pagenotfound'));
		}
		
	}

	public function update($id='')
	{
		$cek = $this->mahasiswa_model->get_data_by_id($id)->num_rows();
		$data = $this->mahasiswa_model->get_data_by_id($id)->row();
		if ($cek > 0) {

			$val_username = $this->input->post('username');

			if ($val_username == $data->username) {
				$username = $data->username;
			}else{
				$cek_user = $this->mahasiswa_model->get_data_by_username($val_username)->num_rows();
				if ($cek_user > 0) {
					$notif = "Username telah digunakan!";
					$this->session->set_flashdata('failed', $notif);
					redirect(base_url('dashboard-dosen/mahasiswa/edit/'.$data->id_user));
				}else{
					$username = $val_username;
				}
			}

			if (empty($this->input->post('new_password'))) {
				$password = $data->password;
			}else{
				$password = md5($this->input->post('new_password'));
			}

			$value_user = array(
						'username' 		=> $username,
						'password' 		=> $password,
					 );

			$value_data_user = array(
								'nama' 			=> $this->input->post('nama'),
								'nim' 			=> $this->input->post('nim'),
								'kelas' 		=> $this->input->post('kelas'),
							  );

			$result = $this->mahasiswa_model->update($value_user, $id);
			$result = $this->mahasiswa_model->update_data_user($value_data_user, $id);

			if ($result) {
				$notif = "Data berhasil disimpan";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/mahasiswa'));
			}

		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

	public function delete($id='')
	{
		$cek = $this->mahasiswa_model->get_data_by_id($id)->num_rows();
		if ($cek > 0) {
			$execute = $this->mahasiswa_model->delete($id);
			if ($execute) {
				$notif = "Data berhasil dihapus";
				$this->session->set_flashdata('success', $notif);
				redirect(base_url('dashboard-dosen/mahasiswa'));
			}
		}else{
			$this->output->set_status_header('404');
       		$this->load->view('templates/404');
		}
	}

}