<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page->set_base_url(base_url("dashboard-dosen/home"));
		cek_session_level('dosen');
	}

	public function index()
	{
		$data = array(
						'selamat' => 'Selamat datang di dashboard dosen',
					);
		$this->page->title('Home');
		$this->page->template('dosen_template');
		$this->page->content('content/dosen-home');
		$this->page->data($data);
		$this->page->view();
	}	


}