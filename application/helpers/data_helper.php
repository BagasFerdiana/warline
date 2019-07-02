<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Indonesian Date
 *
 * Mengubah format date Y-m-d menjadi d-m-Y
 *
 * @param	date
 * @return	date
 */
if ( ! function_exists("indonesian_date"))
{
	function indonesian_date($date)
	{
		if ($date == "" OR $date == NULL OR $date == "0000-00-00")
		{
			return "-";
		}
		
		$full 		= explode(" ", $date);
		$time		= strtotime($full[0]);
		$id_date	= date("d-m-Y", $time);
		
		return $id_date;
	}
}

if ( ! function_exists("indonesian_date_time"))
{
	function indonesian_date_time($date)
	{
		if ($date == "" OR $date == NULL OR $date == "0000-00-00")
		{
			return "-";
		}
		
		$time		= strtotime($date);
		$id_date	= date("d-m-Y H:i:s", $time);
		
		return $id_date;
	}
}


if ( ! function_exists("indonesian_time"))
{
	function indonesian_time($date)
	{		
		$time		= strtotime($date);
		$id_time	= date("H:i", $time);
		return $id_time;
	}
}

/**
 * Simple Date
 *
 * Mengubah format date Y-m-d H:i:s menjadi Y-m-d
 *
 * @param	datetime
 * @return	date
 */
if ( ! function_exists("simple_date"))
{
	function simple_date($datetime)
	{
		if ($datetime == "" OR $datetime == NULL)
		{
			return "";
		}
		
		$full = explode(" ", $datetime);
		
		return $full[0];
	}
}

/**
 * Number to Month
 *
 * Mengubah format angka ke dalam bulan (string Bahasa Indonesia)
 *
 * @param	int
 * @return	string
 */
if ( ! function_exists("num_to_month"))
{
	function num_to_month($num)
	{
		switch ($num)
		{
			case  1	: return "Januari";
			case  2	: return "Februari";
			case  3	: return "Maret";
			case  4	: return "April";
			case  5	: return "Mei";
			case  6	: return "Juni";
			case  7	: return "Juli";
			case  8	: return "Agustus";
			case  9	: return "September";
			case 10	: return "Oktober";
			case 11	: return "November";
			case 12	: return "Desember";
			
			default : return FALSE;
		}
	}
}

/**
 * Text Month
 *
 * Mengubah format date Y-m-d menjadi d-m(string)-Y
 *
 * @param	date
 * @return	string
 */
if ( ! function_exists("text_month"))
{
	function text_month($date)
	{
		$date	= explode("-", $date);
		
		if (count($date) == 1) return NULL;
		
		$year	= $date[0];
		$month	= $date[1];
		$day	= (int)$date[2];
		
		$month	= num_to_month($month);
		
		return "$day $month $year";
	}
}

if ( ! function_exists("jatuh_tempo"))
{
	function tgl_balik($date)
	{		
		$date   = explode("-", $date);
        
	    $year   = $date[0];
	    $month  = $date[1];
	    $day    = (int)$date[2];
	    
	    $tanggal  = $month."-".$day."-".$year;
	    return $tanggal;
	}
}

/**
 * Day
 *
 * Mengembalikan string hari ini
 *
 * @return	string
 */
if ( ! function_exists("day"))
{
	function day($day)
	{
		switch ($day)
		{
			case "Monday"		: return "Senin";
			case "Tuesday"		: return "Selasa";
			case "Wednesday"	: return "Rabu";
			case "Thursday"		: return "Kamis";
			case "Friday"		: return "Jumat";
			case "Saturday"		: return "Sabtu";
			case "Sunday"		: return "Minggu";
			default				: return FALSE;
		}
	}
}

/**
 * Input Date
 *
 * Mengubah format date Y-m-d menjadi Y/m/d
 * yang sesuai dengan DatePicker
 *
 * @param	date
 * @return	date
 */
if ( ! function_exists("input_date"))
{
	function input_date($date)
	{
		if ($date == "00-00-0000") return "";
	
		$time  	= explode("-", $date);
		$year  	= $time[2];
		$month 	= (int)$time[0];
		$day   	= (int)$time[1];
		
		return "$year-$month-$day";
	}
}

/**
 * currency
 *
 * Mengubah string ke dalam format
 * string mata uang rupiah
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("currency"))
{
	function currency($str)
	{
		return "Rp ".number_format($str, 0, ",", ".");
	}
}

/**
 * null_data
 *
 * Mengubah data NULL menjadi UNKNOWN
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("null_data"))
{
	function null_data($str)
	{
		if ($str == "")
		{
			return "UNKNOWN";
		}
		
		return $str;
	}
}

/**
 * br
 *
 * Mengganti \n dengan <br />
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("br"))
{
	function br($str)
	{
		return str_replace("\n", "<br />", $str);
	}
}

/**
 * website
 *
 * Memberikan link pada alamat website
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("website"))
{
	function website($url)
	{
		$link = "<a href='$url' target='_blank'>$url</a>";
		return ($url == "" OR $url == NULL) ? "-" : $link;
	}
}

/**
 * emiil
 *
 * Memberikan link pada alamat email
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("email"))
{
	function email($email)
	{
		$link = "<a href='mailto:$email' target='_blank'>$email</a>";
		return ($email == "" OR $email == NULL) ? "-" : $email;
	}
}

/**
 * check
 *
 * Menampilkan gambar check
 *
 * @param	bool
 * @return	string
 */
if ( ! function_exists("check"))
{
	function check($status)
	{
		if ($status)
		{
			return "<img src='" . base_url() . "img/check.gif' />";
		}
		else
		{
			return "-";
		}
	}
}

if ( ! function_exists("check_active"))
{
	function check_active($status)
	{
		if ($status)
		{
			return "<img src='" . base_url() . "ico/active.png' />";
		}
		else
		{
			return "<img src='" . base_url() . "ico/non_active.png' />";
		}
	}
}

/**
 * blank
 *
 * Replace nilai blank
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("blank"))
{
	function blank($val)
	{
		return ($val == "" OR $val == NULL) ? "-" : $val;
	}
}

/**
 * blank
 *
 * Status Aktif or Non-aktif 
 *
 * @param	string
 * @return	string
 */
if ( ! function_exists("status"))
{
	function status($val)
	{
		if ($val)
		{
			return "Non-aktif";
		}
		else
		{
			return "Aktif";
		}
	}
}

function terbilang($bilangan) {

  $angka = array('0','0','0','0','0','0','0','0','0','0',
                 '0','0','0','0','0','0');
  $kata = array('','Satu','Dua','Tiga','Empat','Lima',
                'Enam','Tujuh','Delapan','Sembilan');
  $tingkat = array('','Ribu','Juta','Milyar','Triliun');

  $panjang_bilangan = strlen($bilangan);

  /* pengujian panjang bilangan */
  if ($panjang_bilangan > 15) {
    $kalimat = "Diluar Batas";
    return $kalimat;
  }

  /* mengambil angka-angka yang ada dalam bilangan,
     dimasukkan ke dalam array */
  for ($i = 1; $i <= $panjang_bilangan; $i++) {
    $angka[$i] = substr($bilangan,-($i),1);
  }

  $i = 1;
  $j = 0;
  $kalimat = "";

  /* mulai proses iterasi terhadap array angka */
  while ($i <= $panjang_bilangan) {

    $subkalimat = "";
    $kata1 = "";
    $kata2 = "";
    $kata3 = "";

    /* untuk ratusan */
    if ($angka[$i+2] != "0") {
      if ($angka[$i+2] == "1") {
        $kata1 = "Seratus";
      } else {
        $kata1 = $kata[$angka[$i+2]] . " Ratus";
      }
    }

    /* untuk puluhan atau belasan */
    if ($angka[$i+1] != "0") {
      if ($angka[$i+1] == "1") {
        if ($angka[$i] == "0") {
          $kata2 = "Sepuluh";
        } elseif ($angka[$i] == "1") {
          $kata2 = "Sebelas";
        } else {
          $kata2 = $kata[$angka[$i]] . " Belas";
        }
      } else {
        $kata2 = $kata[$angka[$i+1]] . " Puluh";
      }
    }

    /* untuk satuan */
    if ($angka[$i] != "0") {
      if ($angka[$i+1] != "1") {
        $kata3 = $kata[$angka[$i]];
      }
    }

    /* pengujian angka apakah tidak nol semua,
       lalu ditambahkan tingkat */
    if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
        ($angka[$i+2] != "0")) {
      $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
    }

    /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
       ke variabel kalimat */
    $kalimat = $subkalimat . $kalimat;
    $i = $i + 3;
    $j = $j + 1;

  }

  /* mengganti satu ribu jadi seribu jika diperlukan */
  if (($angka[5] == "0") AND ($angka[6] == "0")) {
    $kalimat = str_replace("Satu Ribu","Seribu",$kalimat);
  }

  return trim($kalimat);

}

function max_kalimat($str)
{
	$str = strip_tags($str);
	$kata = explode(" ",$str);
	return implode(" ",array_splice($kata,0,10));
}
function max_ket($str)
{
	return substr($str, 0, 15)."..";
}

function cek_ekstensi($file){
	$extension 		= explode(".", $file);
	$getExtension 	= count($extension)-1;
	$extension 		= strtolower($extension[$getExtension]);

	if($extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "png" || $extension == "bmp")
	{
		return "gambar";
	}
	else if($extension == "mp4" || $extension == "3gp" || $extension == "flv"){
		return "video";
	}
}

if ( ! function_exists("seourl"))
{
	function seourl( $param ) // make name be seourl
	{
	    $param = strtolower($param); // Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
	    
	    $param = preg_replace( "/[^a-z0-9_\s-]/", "", $param ); // Strip any unwanted characters
	    
	    $param = preg_replace( "/[\s-]+/", " ", $param ); // Clean multiple dashes or whitespaces
	    
	    $param = preg_replace( "/[\s_]/", "-", $param ); //Convert whitespaces and underscore to dash
	    
	    return $param;
	}
}

/* End of file data_helper.php */
/* Location: ./application/helpers/data_helper.php */