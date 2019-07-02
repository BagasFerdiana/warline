<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require_once("tcpdf/config/lang/eng.php");
require_once("tcpdf/tcpdf.php");

function init_pdf()
{
	return new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, TRUE, "UTF-8", FALSE);
}
