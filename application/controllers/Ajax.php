<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct() {
		// header('Content-type: application/json');
		parent::__construct();	
		$this->load->model('Crud');
	}

	public function record_rom($by_rom = "") {

		$this->load->model('Shift_operations', 'operations');
		$by_level   = $this->session->userdata('level');
		$by_rom				= $by_rom == '' ?$this->session->userdata('rom') : $by_rom;
		$sql = $this->operations->rom_monitoring_shift_operations($by_rom);

		$response = array();
		if($sql->num_rows() > 0 ){
			$response["data"] = array();
			$no = 0;

			if ($sql->num_rows() > 0 ) {
				foreach ($sql->result_array() as $value) {
					$no++;
					$color = explode(',', $value['color']);
					$h = array();
					array_push($h, $no);
					array_push($h, $value['cn_unit']);
					array_push($h, '<div style="background-color:'. $color[0] . ';color:'.@$color[1].';margin: -8px;padding: 10px;">'.$value['cargo'].'</div>');
					array_push($h, $value['rom_name']);
					$action = "";
					if($by_level != 'dispatcher'&& $by_level != 'administrator') :
						$time_in = $value['time_in'];
						$time_out = $value['time_out'];
						$btn_in = " disabled";
						if($time_in == NULL && $time_out == NULL)
							$btn_in = "";
						$action .= '<a href="#" class="btn btn-sm btn-success'.$btn_in.'"  id="edit_in_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit masuk ROM" data-toggle="tooltip"><i class="fa  fa-reply"> In</i>
						</a>';

						$btn_out = " disabled";
						if($time_in != NULL && $time_out == NULL)
							$btn_out = "";
						$action .= ' <a href="#" class="btn btn-sm btn-danger'.$btn_out.'"  id="edit_out_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit keluar ROM" data-toggle="tooltip"><i class="fa  fa-share"> Out</i>  
						</a>';
					else :
						$action .= '<a href="#" class="btn btn-sm btn-success disabled"  id="edit_in_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit masuk ROM" data-toggle="tooltip"><i class="fa  fa-reply"> In</i>
						</a>';
						$action .= ' <a href="#" class="btn btn-sm btn-danger disabled"  id="edit_out_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit keluar ROM" data-toggle="tooltip"><i class="fa  fa-share"> Out</i>  
						</a>';
					endif;
					array_push($h, $action);

					array_push($response["data"], $h);

	            }
	        } else {
	        	array('No Data.', '', '', '');
	        }

		}
		echo json_encode($response);
	}

}