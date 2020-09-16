<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    *       http://example.com/index.php/welcome
    *   - or -
    *       http://example.com/index.php/welcome/index
    *   - or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */
    function __construct() {
        parent::__construct();  
        $this->load->helper('store_helper');
    }

    public function index ($page = 'Homepage') {

    }

    public function shift_operation() {
        $loop           = $this->Crud->query("SELECT * FROM `shift_ritase` WHERE `update_at` >= '" . date('Y-m-d H:i:s', strtotime('-30 minutes')) . "' OR `delete_at` >= '" . date('Y-m-d H:i:s', strtotime('-30 minutes')) . "'");

        foreach ($loop as $key) {
            $value          = $this->Crud->sql_query("SELECT `a`.*, (`wh`+`delay_time`+`waiting_no_dt`) as `wh_perjam`, SUM(`b`.`prod`) as `production`, (`custom_loader_volume`.`value`) as `capacity`, GROUP_CONCAT(CONCAT(`b`.`hauler_id`, ':', `b`.`count`) SEPARATOR ',') as `hauler`, `c`.`category` as `category_group` FROM (
                SELECT `shift_ritase`.*, IF(HOUR(`time`) = 7, 30, 60 ) as `per_jam`, (IF(HOUR(`time`) = 7, 30, 60 )-(`delay_time`+`stndby_time`+`down_time`+`waiting_no_dt`)) as `wh`, `m`.`name` as `material_name`, `enum`.`name` as `pit_name`
                FROM `shift_ritase` 
                LEFT JOIN `enum` ON `shift_ritase`.`pit` = `enum`.`id`
                LEFT JOIN `enum` as `m` ON `shift_ritase`.`material_id` = `m`.`id`
                WHERE `shift_ritase`.`id` = '{$key['id']}' ORDER BY `shift`, `time` LIMIT 20
            ) as `a` 
            LEFT JOIN (
                SELECT `hauler_ritase`.*, `equipment_material_volume`.`material_id`, (`hauler_ritase`.`count`*`equipment_material_volume`.`value`) as `prod` FROM `hauler_ritase` 
                LEFT JOIN `equipment_material_volume` ON `hauler_ritase`.`hauler_id` = `equipment_material_volume`.`hauler_id` WHERE `hauler_ritase`.`delete_at` IS NULL 
            ) as `b` ON `a`.`id` = `b`.`fleet_id`  AND `a`.`material_id` = `b`.`material_id`
            LEFT JOIN (SELECT GROUP_CONCAT(`enum`.`name`) as `category`, `shift_relation_ritase`.`ritase_id` FROM `shift_relation_ritase` LEFT join `enum` ON `shift_relation_ritase`.`detail_id` = `enum`.`id` GROUP BY `shift_relation_ritase`.`ritase_id`) as `c` ON `c`.`ritase_id` = `a`.`id`
            LEFT JOIN `custom_loader_volume` ON SUBSTR(`a`.`loader_id`, 1, 2) = `custom_loader_volume`.`hauler_id` AND `a`.`material_id` = `custom_loader_volume`.`material_id` GROUP BY `a`.`id`
            ")->row_array();
        
        $data = array(
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
            'deleted_at'        => NULL,
            'date'              => $date,
            'shift'             => $shift,
            'cn_unit'           => $id_unit,
            'position'          => $position,
            'cargo'             => $cargo_muatan,
            'remark'            => $remark,
            'to_rom'            => $to_rom,
            'by_area'           => $this->by_area,
            'by_user'           => $this->by_user
        );

        $this->Crud->insert('table_shiftoperations', $data);
    }


   

  
}

