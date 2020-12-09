<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class exports extends CI_Controller {

/**
* Index Page for this controller.
*
* Maps to the following URL
* 		http://example.com/index.php/welcome
*	- or -
* 		http://example.com/index.php/welcome/index
*	- or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/
	function __construct() {
		parent::__construct();
		$this->load->model('Crud');
	}

	public function index() {

	}

	public function populasi()
	{
			/** Error reporting */
			error_reporting(E_ALL);
			ini_set('display_errors', TRUE);
			ini_set('display_startup_errors', TRUE);
			date_default_timezone_set('Europe/London');

			if (PHP_SAPI == 'cli')
				die('This example should only be run from a Web Browser');

			$this->load->library('Excel');

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("Andi Mariadi")
			->setLastModifiedBy("Andi Mariadi")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("This document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Result file");

			// $objDrawing = new PHPExcel_Worksheet_Drawing();
			// $objDrawing->setName('Logo ');
			// $objDrawing->setDescription('Logo ');

			// $objDrawing->setPath('___/images/equipment.png');
			$fillbor = '0561a3';
			$fillbor2 = 'e74c3c';
			$fillanu = 'ffffff';
			// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:I4');
			
			// $objDrawing->setResizeProportional(true);
			// $objDrawing->setHeight(79);
			// $objDrawing->setCoordinates('B1');
			// $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

			$border = array('fill' => array('borders' => array(
				'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
			)));
			$bordering = array(
				'fill' 	=> array(
					'type'			=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'			=> array('rgb' => $fillbor)
				),
				'font' => array(
					'size'  		=> 12,
					'name'  		=> 'Times New Roman',
					'color' 		=> array('rgb' => 'ffffff')
				),
				'borders' => array(
					'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'			=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'top'			=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'right'			=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
				),
				'alignment' => array(
					'horizontal' 	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' 		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);
			$bordering2 = array(
				'fill' 	=> array(
					'type'			=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'			=> array('rgb' => $fillbor2)
				),
				'font' => array(
					'size'  		=> 12,
					'name'  		=> 'Times New Roman',
					'color' 		=> array('rgb' => 'ffffff')
				),
				'borders' => array(
					'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'left'			=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'top'			=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
					'right'			=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
				),
				'alignment' 		=> array(
					'horizontal' 	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' 		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);
			$styleArray = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
				'alignment' 		=> array(
					'horizontal' 	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' 		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);

			$tebal = array(
				'borders' => array(
					'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
				)
			);

			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
				array('fill' 	=> array(
					'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'		=> array('rgb' => $fillanu)
				)
			)
			);


			$objPHPExcel->getActiveSheet()->getStyle('A2:' . $objPHPExcel->getActiveSheet()->getHighestColumn() . $objPHPExcel->getActiveSheet()->getHighestRow())->applyFromArray($styleArray);

			$alphas = range('A', 'Z');
				$objPHPExcel->getActiveSheet()->getStyle('A2:O2')->applyFromArray($bordering);
				$objPHPExcel->getActiveSheet()->getStyle('P2:Q2')->applyFromArray($bordering2);
				$td = array(
					'NO', 
					'Set Trailer', 
					'ID Unit', 
					'Model', 
					'Chassis Number', 
					'Brand State', 
					'Product',
					'Engine Model',
					'Delivery',
					'Engine Number',
					'KW/HP/RPM',
					'Type',
					'Capacity',
					'Doc. Ellipse',
					'Owner Unit',
					'Status Unit', 
					'Status To Use');
				$forv = 17;
			for ($i=0; $i < $forv ; $i++) { 
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$i] . '2', $td[$i]);
				$objPHPExcel->getActiveSheet()->getStyle($alphas[$i] . '2')->getAlignment()->setWrapText(true); 
			}
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.29);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(7.5);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);

			
				$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);


			$this->db->select('table_equipment.*');
			$this->db->from('table_equipment');
			$this->db->where('`table_equipment`.`deleted_at` IS NULL');
			$table = $this->db->get()->result_array();
			
			$hitung = 2;
			$no = 0;
			foreach ($table as $data) {
					$no++;
					$hitung++;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[0] . $hitung, $no);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[1] . $hitung, $data['set_trailler']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[2] . $hitung, $data['unit_id']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[3] . $hitung, $data['model']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[4] . $hitung, $data['chassis_number']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[5] . $hitung, $data['brand_state']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[6] . $hitung, $data['product']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[7] . $hitung, $data['engine_model']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[8] . $hitung, $data['delivery']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[9] . $hitung, $data['engine_number']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[10] . $hitung, $data['kw_hp_rpm']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[11] . $hitung, $data['type']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[12] . $hitung, $data['capacity']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[13] . $hitung, $data['doc_ellipse']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[14] . $hitung, $data['owner_unit']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[15] . $hitung, $data['status_unit']);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[16] . $hitung, $data['status_to_use']);
					

					for ($i=1, $a = 0; $i < $forv; $i++, $a++) { 
						$objPHPExcel->getActiveSheet()->getStyle($alphas[$a] . $hitung . ':' . $objPHPExcel->getActiveSheet()->getHighestColumn() . $objPHPExcel->getActiveSheet()->getHighestRow())->applyFromArray($styleArray);							
					}
						// $objPHPExcel->getActiveSheet()->getStyle("A{$hitung}:I{$hitung}")->applyFromArray($tebal);
					
			}



			$objPHPExcel->getActiveSheet()->setTitle('Equipment');

			$objPHPExcel->setActiveSheetIndex(0);
			// header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="ADMO MDI Report Equipment ' . date('F Y') . '.xls"');
			header('Cache-Control: max-age=0');
			header('Cache-Control: max-age=1');

			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
			header ('Cache-Control: cache, must-revalidate');
			header ('Pragma: public');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');

			exit;
		}
	}