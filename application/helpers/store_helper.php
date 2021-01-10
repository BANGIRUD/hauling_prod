<?php
defined('BASEPATH') or exit('No direct script access allowed');

function get_date_shift() {
	if ((date('H:i:s') >= '06:00:00') AND (date('H:i:s') <= '18:00:00')) {
		$shift = 1;
		$hour = 6;
		$date = date('Y-m-d');
	} else {
		$shift = 2;
		$hour = 18;
		if ((date('H:i:s') >= '00:00:00') AND (date('H:i:s') < '06:00:00')) {
			$date = date('Y-m-d', strtotime('-1 Day'));
		} else {
			$date = date('Y-m-d');
		}
	}
	$result = array();
	$result['shift'] = $shift;
	$result['date'] = $date;
	$result['hour'] = $hour;
	return $result;
}

function selisih_rekonsile($start, $end) {
	$awal  = new DateTime($start);
	$akhir  = new DateTime($end);
	if ($awal > $akhir) {
		$akhir->modify('+1 day');
		$selisih = $akhir->diff($awal);
	} else {
		$selisih = $akhir->diff($awal);
	}

	$day = $selisih->format('%a');
	if ($day != '0') {
		$hasil = $day . " day";
	} else {
		$hasil = "-";
	}
	return $hasil;
}

function selisih_hour($start, $end) {
	$awal  = new DateTime($start);
	$akhir  = new DateTime($end);
	if ($awal > $akhir) {
		$akhir->modify('+1 day');
		$selisih = $akhir->diff($awal, true);
	} else {
		$selisih = $akhir->diff($awal, true);
	}

	$jam = $selisih->format('%h');
	$menit = $selisih->format('%i');
	$detik = $selisih->format('%s');
	$day = $selisih->format('%a');
	$jam = (($day*24)+$jam);
	if($menit >= 0 && $menit <= 9){
		$menit = "0".$menit;
	}
	if($jam >= 0 && $jam <= 9){
		$jam = "0".$jam;
	}
	if($detik >= 0 && $detik <= 9){
		$detik = "0".$detik;
	}
	$hasil = $jam.":".$menit.":".$detik;
	return $hasil;
}

function selisih_day($start, $end) {
	$awal  = new DateTime($start);
	$akhir  = new DateTime($end);
	if ($awal > $akhir) {
		$akhir->modify('+1 day');
		$selisih = $akhir->diff($awal, true);
	} else {
		$selisih = $akhir->diff($awal, true);
	}

	$jam = $selisih->format('%h');
	$menit = $selisih->format('%i');
	$detik = $selisih->format('%s');
	$day = $selisih->format('%a');
	$jam = (($day*24)+$jam);
	if($menit >= 0 && $menit <= 9){
		$menit = "0".$menit;
	}
	if($jam >= 0 && $jam <= 9){
		$jam = "0".$jam;
	}
	if($detik >= 0 && $detik <= 9){
		$detik = "0".$detik;
	}
	$hasil = $day;
	return $hasil;
}

function get_options($name, $keys) {
	$CI =& get_instance();
	$CI->load->database();
	// $keys = @explode(' ', $keys, 3);
	// $key = @$keys[0] . ' ' . @$keys[1];
	$query = $CI->db->query("SELECT * FROM `options` WHERE `name` = '$name' AND LOCATE(CONCAT(`keys` , ' '), '$keys ') != 0 ORDER BY LOCATE(CONCAT(`keys` , ' '), '$keys ')");
	// //option not found
	if($query->num_rows() < 1) {
		// $ex = @explode(' ', $key, 2)[0];
		// $query = $CI->db->query("SELECT * FROM `options` WHERE `name` = '$name' AND LOCATE(CONCAT(`keys` , ' '), '$keys ') != 0 ORDER BY `value`");
		// if ($query->num_rows() < 1) {
			return false;
		// } else {
		// 	$option = $query->row();
		// 	$value = $option->value;
		// 	return $value;
		// }
	} else {
		$option = $query->row();
		$value = $option->value;
		return $value;
	}
	
}

function colors_bd_code($value='') {
	switch ( strtolower($value) ) {
		case 'b14':
			$bg = '#dd8400';
			$color = '#FFFFFF';
			break;

		case 'bs':
			$bg = '#0e5c0e';
			$color = '#FFFFFF';
			break;

		default:
			$bg = '#c90606';
			$color = '#FFFFFF';
			break;
	}
	$result = array();
	$result['bg'] = $bg;
	$result['color'] = $color;
	return $result;
}

function colors_setting_unit($value='') {
	switch ( strtolower($value) ) {
		case 'floating':
			$bg = '#f1c40f';
			$color = '#000000';
			break;

		case 'register':
			$bg = '#BBFFB4';
			$color = '#000000';
			break;

		case 'unregister':
			$bg = '#FFB4B4';
			$color = '#000000';
			
			break;

		default:
			$bg = '#ecf0f1';
			$color = '#000000';
			break;
	}
	$result = array();
	$result['bg'] = $bg;
	$result['color'] = $color;
	return $result;
}


function sendMessage($id, $message_text) {
    //group teknisi = 
    $url = "https://api.telegram.org/bot801540292:AAGN7VDZ8qoRuDYaucj3z6CPCFWbmGOOI6w/sendMessage?parse_mode=markdown&chat_id=" . trim(urlencode($id));
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}


function section_type($value='') {
	$result = "";
	switch ( strtoupper($value) ) {
		case 'PRIMEMOVER':
			$result = 'PRIMEMOVER';
			break;

		case 'PI':
			$result = 'PRIMEMOVER';
			break;

		case 'FULLSET':
			$result = 'PRIMEMOVER';
			break;
		
		default:
			$result = $value;
			break;
	}
	
	return $result;
}

function get_enum($id, $tp = '', $type = 'id')
{
    $CI =& get_instance();
    $CI->load->database();
    $query=$CI->db->select('*')->from('table_enum')->where(array($type => $id, 'deleted_at' => NULL))->get();
    //option not found
    if($query->num_rows() < 1) return false;
    
    $option=$query->row();
    $value=$option->name;
    if ($tp != '') {
        $value=$option->$tp;
    }    
    
    return $value;
}

function colored_deviasi($total)
{
	if ( $total > 50) {
		$warna = 'background-color: red; color: #FFFFFF';
	}elseif ( $total < '-50'){
		$warna = 'background-color: red; color: #FFFFFF';
	}else {
		$warna = 'background-color: transparent';
	}
	return $warna;
}