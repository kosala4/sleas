<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormControl extends CI_Controller {
    
    /*Form data controller*/
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_data_model'); //load database model.
        
    }
    
    public function register(){
        
    }
    
    public function getProvinceOffices(){
        $workplace_id = $this->input->post('workplace_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_province_offices($workplace_id);
        /*$res = $this->Form_data_model->select('workplace');*/
        echo json_encode($res);
    }
    
    public function getMainDivision(){
        $workplace_id = $this->input->post('workplace_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_main_division($workplace_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getMainBranch(){
        $workplace_id = $this->input->post('workplace_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_main_branch($workplace_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getReleaseWorkPlaces(){
        $rel_type_id = $this->input->post('rel_type_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_rel_place($rel_type_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getDistricts(){
        $province_id = $this->input->post('province_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_districts($province_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getZoneList(){
        $district_id = $this->input->post('district_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_zones($district_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getZonalOfficeList(){
        $district_id = $this->input->post('district_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_zone_offices($district_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getDivisionsList(){
        $zone_id = $this->input->post('zone_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_divisions($zone_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getDivisionalOfficeList(){
        $zone_id = $this->input->post('zone_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_divisional_offices($zone_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
}
?>