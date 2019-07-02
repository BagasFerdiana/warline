<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Pdf {

	/**
	 * Properti untuk setting PDF
	 */
	private $_orientation = "P";
	
	private $_author	= "Agung Wijayanto";
	private $_title		= "";
	private $_subject	= "";
	private $_keywords	= "";
	private $_font_size	= 10;
	
	
	function init($config)
	{
		foreach ($config as $key => $value)
		{
			$property 			= "_$key";
			$this->$property 	= $value;
		}
	}
	
	function create_pdf($content, $file_name)
	{
		$CI = &get_instance();
		$CI->load->helper("tcpdf");
		
		$pdf = init_pdf();
		
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor($this->_author);
		$pdf->SetTitle($this->_title);
		$pdf->SetSubject($this->_subject);
		$pdf->SetKeywords($this->_keywords);
		$pdf->setPageOrientation($this->_orientation);
		
		$pdf->setPrintHeader(FALSE);
		$pdf->setPrintFooter(FALSE);
		
		$pdf->SetMargins(20, 10, 20, 20);
		$pdf->SetAutoPageBreak(TRUE, 25);
		
		$pdf->SetFont("times", "", $this->_font_size);
		
		$pdf->AddPage();
		$pdf->writeHTML($content, TRUE, FALSE, TRUE, FALSE, "");
		$pdf->lastPage();
		$pdf->Output("$file_name.pdf", "I");
	}
	
	function set_font_size($size)
	{
		$this->_font_size = $size;
	}
}