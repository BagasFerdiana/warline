<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Page {

	private $_CI;						// instan dari core class CodeIgniter
	private $_base_url		= "";		// base URL dari halaman yang bersangkutan
	private $_dir			= "";		// direktori halaman yang bersangkutan
	private $_controller	= "";		// kelas controller yang berkorespondensi dengan
										// halaman yang bersangkutan
	private $_table			= "";		// tabel basis data yang berkorespondensi dengan
										// halaman yang bersangkutan
	private $_data			= array();	// variabel data yang dikirim ke halaman
	private $_css			= "";		// file CSS yang digunakan pada halaman
	private $_javascript	= "";		// file javascript yang digunakan pada halaman
	private $_content		= "";		// halaman content
	private $_db_data		= array();	// data yang berhubungan dengan database

	/**
	 * isi properti berikut ini untuk mengatur nilai default
	 *
	 * $_title		judul halaman
	 * $_template	template yang akan digunakan
	 *				direktori: ./application/views/templates/
	 */
	private $_template	= "frontend_tpl";

	/**
	 * Konstruktor
	 */
	function __construct()
	{
		$this->_CI = &get_instance();
	}

	/**
	 * Set Controller
	 *
	 * @param	string
	 */
	function controller($controller)
	{
		$this->_controller = $controller;
	}

	/**
	 * Set Base URL
	 *
	 * @param	string
	 */
	function set_base_url($url)
	{
		$this->_base_url = $url;
	}

	/**
	 * Get Base URL
	 *
	 * @return	string
	 */
	function base_url($uri = "")
	{
		return $this->_base_url . $uri;
	}

	/**
	 * Set table
	 *
	 * @param	string
	 */
	function table($table)
	{
		$this->_table = $table;
	}

	/**
	 * Set data
	 *
	 * @param	array
	 */
	function data($values)
	{
		foreach ($values as $key => $value)
		{
			$this->_data[$key] = $value;
		}
	}

	/**
	 * Set title
	 *
	 * @param	string
	 */
	function title($title)
	{
		$this->_title = $title;
	}

	/**
	 * Set CSS
	 *
	 * @param	array, string
	 */
	function css($files)
	{
		foreach ($files as $file)
		{
			$this->_css .=
				"<link rel='stylesheet' href='" . base_url() . "css/$file.css' type='text/css' />";
		}
	}

	/**
	 * Set javascript
	 *
	 * @param	array
	 */
	function javascript($files)
	{
		foreach ($files as $file)
		{
			$this->_javascript .=
				"<script type='text/javascript' src='" . base_url() . "js/$file.js'></script>";
		}
	}

	/**
	 * Set content
	 *
	 * @param	string
	 */
	function content($content)
	{
		$this->_content = $content;
	}

	function enable_search()
	{
		$this->_search = $this->base_url("/search");
	}

	/**
	 * Set template
	 *
	 * @param	string
	 */
	function template($template)
	{
		$this->_template = $template;
	}

	/**
	 * Set data for template
	 */
	function _set_data()
	{
		foreach ($this as $key => $value)
		{
			if ($key != "_CI" && $key != "_data" && $key != "_form_data")
			{
				$key = substr($key, 1);
				$this->_data[$key] = $value;
			}
		}
	}

	/**
	 * Set database data
	 *
	 * @param	array, boolean
	 * @return	array
	 */
	function set_db_data($data, $form_data = TRUE)
	{
		if ($form_data)
		{
			foreach ($data as $key)
			{
				$this->_db_data[$key] = strip_tags($this->_CI->input->post($key));
			}
		}
		else
		{
			foreach ($data as $key => $value)
			{
				$this->_db_data[$key] = $value;
			}
		}

		return $this->_db_data;
	}

	/**
	 * Get database data
	 *
	 * @param	string
	 * @return	array or string
	 */
	function db_data($key = "")
	{
		if ($key == "")
		{
			return $this->_db_data;
		}
		else
		{
			return $this->_db_data[$key];
		}
	}

	/**
	 * Clear database data
	 */
	function clear_db_data()
	{
		$this->_db_data = array();
	}

	/**
	 * Insert method
	 *
	 * @param	string
	 */
	function insert($redirect = "")
	{
		$this->_CI->db->insert($this->_table, $this->_db_data);

		if ($redirect == "")
		{
			$redirect = $this->base_url();
		}

		redirect($redirect);
	}

	/**
	 * Update method
	 *
	 * @param	any, string
	 */
	function update($id, $redirect = "")
	{
		$this->_CI->db->update($this->_table, $this->_db_data, "id = '$id'");

		if ($redirect == "")
		{
			$redirect = $this->base_url();
		}

		redirect($redirect);
	}

	/**
	 * Delete method
	 *
	 * @param	any, string
	 */
	function delete($id, $redirect = '')
	{
		$this->_CI->db->where("id = '$id'");
		$this->_CI->db->delete($this->_table, $this->_db_data);

		if ($redirect == "")
		{
			$redirect = $this->_CI->agent->referrer();
		}

		redirect($redirect);
	}

	/**
	 * Multiple delete method
	 *
	 * @param	string
	 */
	function multi_delete()
	{
		$list		= $this->_CI->input->post("row_id");
		$redirect	= $this->_CI->agent->referrer();

		foreach ($list as $id)
		{
			$this->_CI->db->delete($this->_table, "id = '$id'");
		}

		redirect($redirect);
	}

	/**
	 * View template
	 */
	function view()
	{
		$this->_set_data();
		$this->_CI->load->view("templates/$this->_template", $this->_data);
	}
}
// END DN_Page class

/* End of file Page.php */
/* Location: ./application/libraries/Page.php */
