<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 *
 * My own Helper for CodeIgniter 3.0
 *
 * @package		Helper
 * @author		Agung Wijayanto
 * @email		wijayantoagung88@gmail.com
 * @copyright	Copyright (c) 2014
 */

// ---------------------------------------------------------------------------

 /**
 * No Cache
 *
 * Mengirim no-cache header
 */
if ( ! function_exists("no_cache"))
{
	function no_cache()
	{
		header("Cache-Control: no-cache, no-store, must-revalidate");
		header("Pragma: no-cache");
	}
}

/**
 * Session check
 *
 * Memeriksa session pada halaman setelah login
 */
if ( ! function_exists("cek_session"))
{
	function cek_session()
	{
		$CI = &get_instance();
		$CI->load->library("session");
		
		no_cache();
		
		if (!$CI->session->userdata("sess_id_user") && !$CI->session->userdata("sess_username") && !$CI->session->userdata("sess_password"))
		{
			redirect(base_url());
		}
	}
}

if ( ! function_exists("cek_session_level"))
{
	function cek_session_level($level)
	{
		$CI = &get_instance();
		$CI->load->library("session");
		no_cache();

		if (!$CI->session->userdata("sess_id_user") && !$CI->session->userdata("sess_level"))
		{
			redirect(base_url().'error404');
		}else{
			if (($CI->session->userdata('sess_level') <> $level ) )
			{
				//$CI->session->sess_destroy();
				redirect(base_url().'error404');

			}
		}

		
	}
}


/* End of file session_helper.php */
/* Location: ./application/helpers/session_helper.php */