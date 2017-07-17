<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
        
    }

    public $response = array("result"=>"none", "data"=>"none", "register"=>"x");
    
    public function newMember(){
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $this->loadInitVal();
		$this->load->view('register-staff', $this->response);

		#$this->response['district'] = $this->Form_data_model->select('subject');
		#$this->load->view('add_student', $this->response);
		$this->load->view('footer');
    }
    
    public function loadInitVal(){
        $this->response['subjects'] = $this->Form_data_model->select('subject');
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['release_type'] = $this->Form_data_model->select('release_type');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['designation'] = $this->Form_data_model->select('designation');
    }
    
    public function register_new(){
        $res=0;
        
        $service_id_array = $this->Form_data_model->get_recent_service_id();
        $service_id = $service_id_array['0']['ID'] + 1;
        
         $nic = $this->security->xss_clean($_REQUEST['nic']);
         $title = $this->security->xss_clean($_REQUEST['title']);
         $fname = $this->security->xss_clean($_REQUEST['fname']);
         $mname = $this->security->xss_clean($_REQUEST['mname']);
         $lname = $this->security->xss_clean($_REQUEST['lname']);
         $dob = $this->security->xss_clean($_REQUEST['dob']);
         $ethnicity = $this->security->xss_clean($_REQUEST['ethnicity']);
         $gender = $this->security->xss_clean($_REQUEST['gender']);
         $civil_st = $this->security->xss_clean($_REQUEST['civil_st']);
        
         $address1 = $this->security->xss_clean($_REQUEST['address1']);
         $address2 = $this->security->xss_clean($_REQUEST['address2']);
         $address3 = $this->security->xss_clean($_REQUEST['address3']);
         $pocode = $this->security->xss_clean($_REQUEST['pocode']);
         $landp = $this->security->xss_clean($_REQUEST['landp']);
         $mobile = $this->security->xss_clean($_REQUEST['mobile']);
         $email = $this->security->xss_clean($_REQUEST['email']);
        
         $addresstemp1 = $this->security->xss_clean($_REQUEST['addresstemp1']);
         $addresstemp2 = $this->security->xss_clean($_REQUEST['addresstemp2']);
         $addresstemp3 = $this->security->xss_clean($_REQUEST['addresstemp3']);
         $pocodetemp = $this->security->xss_clean($_REQUEST['pocodetemp']);
         $landptemp = $this->security->xss_clean($_REQUEST['landptemp']);
         $mobiletemp = $this->security->xss_clean($_REQUEST['mobiletemp']);
         $emailtemp = $this->security->xss_clean($_REQUEST['emailtemp']);

         $date_join = $this->security->xss_clean($_REQUEST['date_join']);
         $way_joined = $this->security->xss_clean($_REQUEST['way_joined']);
         $cadre = $this->security->xss_clean($_REQUEST['cadre']);
         $cadre_supern = $this->security->xss_clean($_REQUEST['cadre_supern']);
         $grade_special = $this->security->xss_clean($_REQUEST['grade_special']);
         $grade_general = $this->security->xss_clean($_REQUEST['grade_general']);
         $grade_supern = $this->security->xss_clean($_REQUEST['grade_supern']);
         $special_subject = $this->security->xss_clean($_REQUEST['special_subject']);
         $medium_recruit = $this->security->xss_clean($_REQUEST['medium_recruit']);
         $confirm = $this->security->xss_clean($_REQUEST['confirm']);

         $service_mood = $this->security->xss_clean($_REQUEST['service_mood']);
         $date_appoint = $this->security->xss_clean($_REQUEST['date_appoint']);
         $work_place = $this->security->xss_clean($_REQUEST['work_place']);
         $work_other = $this->security->xss_clean($_REQUEST['work_other']);
         $main_division = $this->security->xss_clean($_REQUEST['main_division']);
         $main_branch = $this->security->xss_clean($_REQUEST['main_branch']);
         $designation = $this->security->xss_clean($_REQUEST['designation']);
         $present_grade = $this->security->xss_clean($_REQUEST['present_grade']);
         $date_promoted = $this->security->xss_clean($_REQUEST['date_promoted']);
         $date_assumed = $this->security->xss_clean($_REQUEST['date_assumed']);
         $official_letter_no = $this->security->xss_clean($_REQUEST['official_letter_no']);

         $province_office = $this->security->xss_clean($_REQUEST['province_office']);

         $province = $this->security->xss_clean($_REQUEST['province']);
         $district = $this->security->xss_clean($_REQUEST['district']);
         $zonal_office = $this->security->xss_clean($_REQUEST['zonal_office']);

         $zone = $this->security->xss_clean($_REQUEST['zone']);
         $divisional_office = $this->security->xss_clean($_REQUEST['divisional_office']);

         $division = $this->security->xss_clean($_REQUEST['division']);
         $institute = $this->security->xss_clean($_REQUEST['institute']);

         $salary_drawn = $this->security->xss_clean($_REQUEST['salary_drawn']);
        
         $release_type = $this->security->xss_clean($_REQUEST['release_type']);
         $release_institute_name = $this->security->xss_clean($_REQUEST['release_institute_name']);
         $release_study_st_date = $this->security->xss_clean($_REQUEST['release_study_st_date']);
         $release_study_end_date = $this->security->xss_clean($_REQUEST['release_study_end_date']);
         $release_work_designation = $this->security->xss_clean($_REQUEST['release_work_designation']);
         $release_work_date_assumed = $this->security->xss_clean($_REQUEST['release_work_date_assumed']);
         $release_official_letter = $this->security->xss_clean($_REQUEST['rel_official_letter_no']);
         $release_place = $this->security->xss_clean($_REQUEST['release_place']);
         $release_salary_drawn = $this->security->xss_clean($_REQUEST['release_salary_drawn']);
        
//********** Populate data arrays **********//
        $personal_details = array('nic' => $nic, 'title' => $title, 'f_name' => $fname, 'm_name' => $mname, 'l_name' => $lname, 'dob' => date("y-m-d", strtotime($dob)), 'ethinicity' => $ethnicity, 'gender' => $gender , 'civil_status' => $civil_st, 'user_updated' => $this->session->user_name);
        
        $contact_details_per = array('nic' => $nic, 'address_type' => 'permanant', 'address_1' => $address1, 'address_2' => $address2, 'address_3' => $address3, 'postal_code' => $pocode, 'mobile' => $mobile, 'telephone' => $landp, ' 	email' => $email);
        
        $contact_details_temp = array('nic' => $nic, 'address_type' => 'temp', 'address_1' => $addresstemp1, 'address_2' => $addresstemp2, 'address_3' => $addresstemp3, 'postal_code' => $pocodetemp, 'mobile' => $mobiletemp, 'telephone' => $landptemp, 'email' => $emailtemp);
        
        $general_service = array('nic' => $nic, 'date_join' => date("y-m-d", strtotime($date_join)), 'way_join' => $way_joined, 'medium' => $medium_recruit, 'confirm' => $confirm);
        
        switch ($way_joined){
            case 'open':
            case 'limited':
            case 'merit':
                $general_service['cadre'] = $cadre;
                break;
            case 'supern':
                $general_service['cadre'] = $cadre_supern;
                $general_service['grade'] = $grade_supern;
                
        }
        switch ($cadre) {
            case 'general-carder':
                $general_service['grade'] = $grade_general;
                break;
            case 'special-carder':
                $general_service['grade'] = $grade_special;
                $general_service['subject'] = $special_subject;
                
        }
        
        //Populate Services Array
        $service = array('ID' => $service_id,'nic' => $nic, 'service_mode' => $service_mood, 'user_updated' => $this->session->username);
        
        if ($service_mood == 7){
            //releasement
            $service_id_array = $this->Form_data_model->get_recent_service_id();
            $service_id = $service_id_array['0']['ID'] + 1;

            $releasement = array('service_id' => $service_id, 'rel_type_id' => $release_type, 'rel_place_id' => $release_place, 'rel_start_date' => date("y-m-d", strtotime($release_study_st_date)), 'rel_end_date' => date("y-m-d", strtotime($release_study_end_date)), 'rel_designation' => $release_work_designation, 'rel_date' => date("y-m-d", strtotime($release_work_date_assumed)), 'salary_drawn' => $release_salary_drawn, 'rel_institute' => $release_institute_name, 'off_letter_no' => $release_official_letter);
            print_r($releasement);
            
        }else{
            $service['work_place_id'] = $work_place;
            $service['designation_id'] = $designation;
            $service['grade'] = $present_grade;
            $service['off_letter_no'] = $official_letter_no;
            $service['duty_date'] = date("y-m-d", strtotime($date_assumed));
            
            switch ($work_place) {
                case 1:
                case 2:
                case 3:
                case 4:
                    $service['work_division_id'] = $main_division;
                    $service['work_branch_id'] = $main_branch;
                    break;
                case 5:
                case 6:
                    $service['sub_location_id'] = $province_office;
                    break;
                case 7:
                    $service['sub_location_id'] = $zonal_office;
                    break;
                case 8:
                    $service['sub_location_id'] = $divisional_office;
                    break;
                case 9:
                case 10:
                case 11:
                case 12:
                case 13:
                case 14:
                case 15:
                case 16:
                case 17:
                    $service['sub_location_id'] = $institute;
                    break;

                default:
            }
        }
        
        
        if (!$addresstemp1){
            
            if($service_mood != 7){
                $res = $this->Form_data_model->registerNew($personal_details, $contact_details_per, $general_service, $service, '', '');
            }else{
                $res = $this->Form_data_model->registerNew($personal_details, $contact_details_per, $general_service, $service, $releasement, '');
            }
        } else {
            
            if($service_mood != 7){
                $res = $this->Form_data_model->registerNew($personal_details, $contact_details_per, $general_service, $service, '', $contact_details_temp);
            }else{
                $res = $this->Form_data_model->registerNew($personal_details, $contact_details_per, $general_service, $service, $releasement, $contact_details_temp);
            }
        }
        
        
        //$res = $this->Form_data_model->registerNew($personal_details, $contact_details_per, $contact_details_temp, $general_service, $service, $releasement);
        
        if ($res == 1){
            
            $this->session->set_flashdata('register','success');
            redirect('/admin/sclerk');
        } else {
            $this->session->set_flashdata('register','not-success');
            //redirect('/register/newmember');
            $this->newMember();
        }
    }
    
    	public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}//Redirect to login page if admin session not initiated.
	}
}