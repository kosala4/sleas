<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormControl extends CI_Controller {
    
    /***
	 * Controller that control all Form Data.
	 *
	 * All the Ajax Requests handle here.
	 * 		
	 * 
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_data_model'); //load database model.
        $this->load->model('User_model'); //load database model.
        
    }
    
    public function getProvinceOffices(){
        $workplace_id = $this->input->post('workplace_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_province_offices($workplace_id);
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
    
    public function getInstitutes(){
        $division_id = $this->input->post('division_id');
        $workplace_id = $this->input->post('work_place_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->get_institutes($workplace_id, $division_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getDisciplinaryActions(){
        $action_type_id = $this->input->post('action_type_id');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->searchdbvalue('Disciplinary_Actions_List', 'action_type_id', $action_type_id);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getQualifications(){
        header('Content-Type: application/x-json; charset=utf-8');
        $q_type = $this->input->post('q_type');
        $searchArray = array('qualification_type_id' => $q_type);
        
        $res = $this->Form_data_model->searchdb('Qualification_List', $searchArray);
        
        echo json_encode($res);
        //echo $res;
    }
    
    public function getQSubjects(){
        header('Content-Type: application/x-json; charset=utf-8');
        $q_id = $this->input->post('q_id');
        $searchArray = array('qualification_name_id' => $q_id);
        
        $res = $this->Form_data_model->searchdb('Qualification_Subjects', $searchArray);
        //$res = $this->Form_data_model->select('workplace');
        echo json_encode($res);
    }
    
    public function getServiceModes(){
        header('Content-Type: application/x-json; charset=utf-8');
        
        $res = $this->Form_data_model->select('service_mode');

        echo json_encode($res);
    }
    
    public function getDeactTypes(){
        header('Content-Type: application/x-json; charset=utf-8');
        
        $res = $this->Form_data_model->select('deactivation_type');

        echo json_encode($res);
    }
    
    public function getRelTypes(){
        header('Content-Type: application/x-json; charset=utf-8');
        
        $res = $this->Form_data_model->select('release_type');

        echo json_encode($res);
    }
    
    public function getSpSubject(){
        header('Content-Type: application/x-json; charset=utf-8');
        
        $res = $this->Form_data_model->select('subject');

        echo json_encode($res);
    }
    
    public function getDiscipTypes(){
        header('Content-Type: application/x-json; charset=utf-8');
        
        $res = $this->Form_data_model->select('disciplinary_type');

        echo json_encode($res);
    }
    
    public function searchOfficers(){
        $searchField = $this->input->post('searchField');
        $searchKey = $this->input->post('searchKey');
        header('Content-Type: application/x-json; charset=utf-8');
        $res = $this->Form_data_model->search_officers($searchField, $searchKey);
        
        echo json_encode($res);
        //echo $res;
    }
    
    public function setProfileImage(){
        header('Content-Type: application/x-json; charset=utf-8');
        $user_id = $this->input->post('user_id');
        
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $file_name = 'profile.' . $ext;
                $file_path = 'file_library/'.$user_id;
                
                $dataarray = array("profile_pic" => $file_name);
                
                if (!file_exists($file_path)) {
                    mkdir($file_path, 0777, true);
                }
                
                if (file_exists($file_path . '/' . $file_name)) {
                    move_uploaded_file($_FILES['file']['tmp_name'], $file_path . '/' . $file_name);
                    $res = $this->Form_data_model->updateprofileImage($user_id, $dataarray);
                        $fileDetails = $file_path . '/' . $file_name;
                        $fileDetailsArray = array("path" => $fileDetails);
                        echo json_encode($fileDetailsArray);
                } else {
                    move_uploaded_file($_FILES['file']['tmp_name'], $file_path . '/' . $file_name);
                    $res = $this->Form_data_model->updateprofileImage($user_id, $dataarray);
                    if ($res == '1'){
                        $fileDetails = $file_path . '/' . $file_name;
                        $fileDetailsArray = array("path" => $fileDetails);
                        echo json_encode($fileDetailsArray);
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }
    
    public function addQualification(){
        header('Content-Type: application/x-json; charset=utf-8');
        $user_id = $this->input->post('user_id');
        $q_id = $this->input->post('q_id');
        $q_name = $this->input->post('q_name');
        $q_subj_id = $this->input->post('q_subj_id');
        $q_type_id = $this->input->post('q_type_id');
        $q_institute = $this->input->post('q_institute');
        $q_date = $this->input->post('q_date');
        $nic = $this->input->post('nic');
        $q_grade = $this->input->post('q_grade');
        
        if($q_type_id == '1'){
            $q_type = 'academic';
        } else if($q_type_id == '2'){
            $q_type = 'professional';
        }
        
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $file_name = $q_date . $nic . '-' . $q_name . '-certificate.' . $ext;
                $file_path = 'file_library/'.$user_id . '/qualifications/' . $q_type;
                
                $dataarray = array("person_id" => $user_id, 'qualification_type_id' => $q_type_id, 'qualification_id' => $q_id,  'qualified_date' => $q_date, 'qualification_grade' => $q_grade, 'qualified_institute' => $q_institute,'certificate_path' => $file_path . '/' .$file_name);
                
                if($q_subj_id){ $dataarray['qualification_subject_id'] = $q_subj_id; }
                
                if (!file_exists($file_path)) {
                    mkdir($file_path, 0777, true);
                }
                
                if (file_exists($file_path . '/' . $file_name)) {
                    
                    echo 'Sorry! This Certificate already saved.';
                    
                } else {
                    $res = $this->Form_data_model->insertData('Qualifications', $dataarray);
                    if ($res == '1'){
                        move_uploaded_file($_FILES['file']['tmp_name'], $file_path . '/' . $file_name);
                        echo json_encode($dataarray);
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }
    
    public function checkUserName(){
        $username = $this->input->post('username');
        $res = $this->User_model->check_username($username);
        
        if($res == '0'){
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
?>