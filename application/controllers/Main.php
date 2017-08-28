<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -
	 * 		http://example.com/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_data_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        
    }

	public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			$this->logout();
		}//Redirect to login page if session not initiated.
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/login/index');
	}

    public $response = array("result"=>"none", "data"=>"none");

    //work_places
	public function Places($place)
	{
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        
		$this->load->view('head');
		$this->load->view('admin_sidebar');
        
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['districtList'] = $this->Form_data_model->select('district_list');
        
		$this->load->view('master/' . $place, $this->response);
        
		$this->load->view('footer');
	}
    
    public function updateWorkplace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        
        header('Content-Type: application/x-json; charset=utf-8');
        $workplace_id = $this->input->post('workplace_id');
        $workplace_name = $this->input->post('workplace_name');
        
        $user_array = array('ID' => $workplace_id, 'work_place' => $workplace_name);
        $res = $this->Main_data_model->update('Work_Place', 'ID', $workplace_id, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addWorkplace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $workplace_id_array = $this->Main_data_model->get_recent_id('Work_Place');
        $workplace_id = $workplace_id_array['0']['ID'] + 1;
        
        $workplace_name = $this->input->post('workplace_name');
        $workplace_code = $this->input->post('workplace_code');
        
        $user_array = array('ID' => $workplace_id, 'work_place' => $workplace_name, 'work_place_code' => $workplace_code);
        $res = $this->Main_data_model->insert('Work_Place', $user_array);
        
        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($workplace_id);
        }
    }
    
    public function deleteWorkplace()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $workplace_id = $this->input->post('workplace_id');
        
        $res = $this->Main_data_model->delete('Work_Place', 'ID', $workplace_id);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addBranch()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $branch_id_array = $this->Main_data_model->get_recent_id('Main_Office_Branches');
        $branch_id = $branch_id_array['0']['ID'] + 1;
        
        $branch_name = $this->input->post('branch_name');
        $work_place_id = $this->input->post('work_place_id');
        
        $user_array = array('ID' => $branch_id, 'work_place_id' => $work_place_id, 'office_branch' => $branch_name);
        $res = $this->Main_data_model->insert('Main_Office_Branches', $user_array);
        
        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($branch_id);
        }
    }
    
    public function updateBranch()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        
        header('Content-Type: application/x-json; charset=utf-8');
        $branch_id = $this->input->post('branch_id');
        $branch_name = $this->input->post('branch_name');
        
        $user_array = array('office_branch' => $branch_name);
        $res = $this->Main_data_model->update('Main_Office_Branches', 'ID', $branch_id, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteBranch()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $branch_id = $this->input->post('branch_id');
        
        $res = $this->Main_data_model->delete('Main_Office_Branches', 'ID', $branch_id);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addDivision()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $division_id_array = $this->Main_data_model->get_recent_id('Main_Office_Divisions');
        $division_id = $division_id_array['0']['ID'] + 1;
        
        $division_name = $this->input->post('division_name');
        $work_place_id = $this->input->post('work_place_id');
        
        $user_array = array('ID' => $division_id, 'work_place_id' => $work_place_id, 'office_division' => $division_name);
        $res = $this->Main_data_model->insert('Main_Office_Divisions', $user_array);
        
        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($division_id);
        }
    }
    
    public function updateDivision()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        
        header('Content-Type: application/x-json; charset=utf-8');
        $division_id = $this->input->post('division_id');
        $division_name = $this->input->post('division_name');
        
        $user_array = array('office_division' => $division_name);
        $res = $this->Main_data_model->update('Main_Office_Divisions', 'ID', $division_id, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteDivision()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $division_id = $this->input->post('division_id');
        
        $res = $this->Main_data_model->delete('Main_Office_Divisions', 'ID', $division_id);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addProvince()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $province_id_no_array = $this->Main_data_model->get_recent_id('Province_Offices');
        $province_id_no = $province_id_no_array['0']['ID'] + 1;
        
        $province_name = $this->input->post('province_name');
        $work_place_id = $this->input->post('work_place_id');
        $province_id = $this->input->post('province_id_no');
        
        $user_array = array('ID' => $province_id_no, 'work_place_id' => $work_place_id, 'province_id' => $province_id, 'province_office' => $province_name);
        $res = $this->Main_data_model->insert('Province_Offices', $user_array);
        
        if(res == '1'){
            echo strval($province_id_no);
        }else {
            echo strval($province_id_no);
        }
    }
    
    public function updateProvince()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $province_id_no = $this->input->post('province_id');
        $province_name = $this->input->post('province_name');
        
        $user_array = array('province_office' => $province_name);
        $res = $this->Main_data_model->update('Province_Offices', 'ID', $province_id_no, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteProvince()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $province_id_no = $this->input->post('province_id');
        
        $res = $this->Main_data_model->delete('Province_Offices', 'ID', $province_id_no);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addZonal()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $zonal_id_no_array = $this->Main_data_model->get_recent_id('Zonal_Offices');
        $zonal_id_no = $zonal_id_no_array['0']['ID'] + 1;
        
        $workplace_id = $this->input->post('workplace_id');
        $dist_id = $this->input->post('dist_id');
        $zonal_name = $this->input->post('zonal_name');
        $zonal_address = $this->input->post('zonal_address');
        
        $user_array = array('ID' => $zonal_id_no, 'work_place_id' => $workplace_id, 'dist_id' => $dist_id, 'zonal_office' => $zonal_name, 'zonal_office_address' => $zonal_address);
        $res = $this->Main_data_model->insert('Zonal_Offices', $user_array);
        
        if(res == '1'){
            echo strval($zonal_id_no);
        }else {
            echo strval($zonal_id_no);
        }
    }
    
    public function updateZonal()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $zonal_id_no = $this->input->post('zonal_id');
        $zonal_name = $this->input->post('zonal_name');
        $zonal_address = $this->input->post('zonal_address');
        
        $user_array = array('zonal_office' => $zonal_name, 'zonal_office_address' => $zonal_address);
        $res = $this->Main_data_model->update('Zonal_Offices', 'ID', $zonal_id_no, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteZonal()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $zonal_id_no = $this->input->post('zonal_id');
        
        $res = $this->Main_data_model->delete('Zonal_Offices', 'ID', $zonal_id_no);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addDivisional()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $divisional_id_no_array = $this->Main_data_model->get_recent_id('Divisional_Offices');
        $divisional_id_no = $divisional_id_no_array['0']['ID'] + 1;
        
        $workplace_id = $this->input->post('workplace_id');
        $zone_id = $this->input->post('zone_id');
        $divisional_name = $this->input->post('divisional_name');
        $divisional_address = $this->input->post('divisional_address');
        
        $user_array = array('ID' => $divisional_id_no, 'work_place_id' => $workplace_id, 'zone_id' => $zone_id, 'division_office' => $divisional_name, 'division_office_address' => $divisional_address);
        $res = $this->Main_data_model->insert('Divisional_Offices', $user_array);
        
        if(res == '1'){
            echo strval($divisional_id_no);
        }else {
            echo strval($divisional_id_no);
        }
    }
    
    public function updateDivisional()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $divisional_id_no = $this->input->post('divisional_id');
        $divisional_name = $this->input->post('divisional_name');
        $divisionall_address = $this->input->post('divisional_address');
        
        $user_array = array('division_office' => $divisional_name, 'division_office_address' => $divisionall_address);
        $res = $this->Main_data_model->update('Divisional_Offices', 'ID', $divisional_id_no, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteDivisional()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $divisional_id_no = $this->input->post('divisional_id');
        
        $res = $this->Main_data_model->delete('Divisional_Offices', 'ID', $divisional_id_no);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addInstitute()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $institute_data_array = $this->Main_data_model->get_recent_id('Institute');
        $institute_data_id = $institute_data_array['0']['ID'] + 1;
        
        $work_place_id = $this->input->post('work_place_id');
        $division_id = $this->input->post('division_id');
        $institute_id = $this->input->post('institute_id');
        $institute_name = $this->input->post('institute_name');
        $institute_address = $this->input->post('institute_address');
        
        $user_array = array('ID' => $institute_data_id, 'div_id' => $division_id, 'institute_id' => $institute_id, 'workplace_id' => $work_place_id, 'institute_name' => $institute_name, 'institute_address' => $institute_address);
        $res = $this->Main_data_model->insert('Institute', $user_array);
        
        if(res == '1'){
            //echo strval($workplace_id);
            echo "success";
        }else {
            echo strval($institute_data_id);
        }
    }
    
    public function updateInstitute()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        
        header('Content-Type: application/x-json; charset=utf-8');
        $work_place_id = $this->input->post('work_place_id');
        $division_id = $this->input->post('division_id');
        $institute_data_id = $this->input->post('institute_data_id');
        $institute_id = $this->input->post('institute_id');
        $institute_name = $this->input->post('institute_name');
        $institute_address = $this->input->post('institute_address');
        
        $user_array = array('div_id' => $division_id, 'institute_id' => $institute_id,'institute_name' => $institute_name, 'institute_address' => $institute_address);
        $res = $this->Main_data_model->update('Institute', 'ID', $institute_data_id, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteInstitute()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $institute_data_id = $this->input->post('institute_data_id');
        
        $res = $this->Main_data_model->delete('Institute', 'ID', $institute_data_id);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function addQualification()
    {
        $this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        
        $q_id_no_array = $this->Main_data_model->get_recent_id('Qualification_List');
        $q_id_no = $q_id_no_array['0']['ID'] + 1;
        
        $q_type_id = $this->input->post('q_id');
        $q_name = $this->input->post('q_name');
        
        $user_array = array('ID' => $q_id_no, 'qualification_type_id' => $q_type_id, 'qualification' => $q_name);
        $res = $this->Main_data_model->insert('Qualification_List', $user_array);
        
        if(res == '1'){
            echo strval($q_id_no);
        }else {
            echo strval($q_id_no);
        }
    }
    
    public function updateQualification()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $q_id = $this->input->post('q_id');
        $q_name = $this->input->post('q_name');
        
        $user_array = array('qualification' => $q_name);
        $res = $this->Main_data_model->update('Qualification_List', 'ID', $q_id, $user_array);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
    public function deleteQualification()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
        header('Content-Type: application/x-json; charset=utf-8');
        $q_id = $this->input->post('q_id');
        
        $res = $this->Main_data_model->delete('Qualification_List', 'ID', $q_id);
        
        if(res == '1'){
            echo "Success";
        }
        
    }
    
}
?>