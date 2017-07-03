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

    public $response = array("result"=>"none", "data"=>"none");
    
    public function newMember(){
        //$this->check_sess($this->session->user_logged);
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
        print_r($_REQUEST);
        //$personal_details = array('nic' => $nic, 'title' => $title, 'fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'dob' => $dob,);
         $nic = $_REQUEST['nic'];
         $title = $_REQUEST['title'];
         $fname = $_REQUEST['fname'];
         $mname = $_REQUEST['mname'];
         $lname = $_REQUEST['lname'];
         $dob = $_REQUEST['dob'];
         $ethnicity = $_REQUEST['ethnicity'];
         $gender = $_REQUEST['gender'];
         $civil_st = $_REQUEST['civil_st'];
        
         $address1 = $_REQUEST['address1'];
         $address2 = $_REQUEST['address2'];
         $address3 = $_REQUEST['address3'];
         $pocode = $_REQUEST['pocode'];
         $landp1 = $_REQUEST['landp1'];
         $landp2 = $_REQUEST['landp2'];
         $mobile = $_REQUEST['mobile'];
         $email = $_REQUEST['email'];
         $addresstemp1 = $_REQUEST['addresstemp1'];
         $addresstemp2 = $_REQUEST['addresstemp2'];
         $addresstemp3 = $_REQUEST['addresstemp3'];
         $pocodetemp = $_REQUEST['pocodetemp'];
         $landptemp1 = $_REQUEST['landptemp1'];
         $landptemp2 = $_REQUEST['landptemp2'];
         $mobiletemp = $_REQUEST['mobiletemp'];
         $emailtemp = $_REQUEST['emailtemp'];

         $date_join = $_REQUEST['date_join'];
         $way_joined = $_REQUEST['way_joined'];
         $cadre = $_REQUEST['cadre'];
         $grade_special = $_REQUEST['grade_special'];
         $special_subject = $_REQUEST['special_subject'];
         $grade_general = $_REQUEST['grade_general'];
         $cadre_supern = $_REQUEST['cadre_supern'];
         $grade_supern = $_REQUEST['grade_supern'];
         $medium_recruit = $_REQUEST['medium_recruit'];
         $confirm = $_REQUEST['confirm'];

         $service_mood = $_REQUEST['service_mood'];
         $date_appoint = $_REQUEST['date_appoint'];
         $work_place = $_REQUEST['work_place'];
         $work_other = $_REQUEST['work_other'];
         $main_division = $_REQUEST['main_division'];
         $main_branch = $_REQUEST['main_branch'];
         $designation = $_REQUEST['designation'];
         $present_grade = $_REQUEST['present_grade'];
         $date_promoted = $_REQUEST['date_promoted'];
         $date_assumed = $_REQUEST['date_assumed'];
         $official_letter_no = $_REQUEST['official_letter_no'];

         $province_office = $_REQUEST['province_office'];

         $province = $_REQUEST['province'];
         $district = $_REQUEST['district'];
         $zonal_office = $_REQUEST['zonal_office'];

         $zone = $_REQUEST['zone'];
         $divisional_office = $_REQUEST['divisional_office'];
         $divisional_office = $_REQUEST['divisional_office'];

         $division = $_REQUEST['division'];
         $institute = $_REQUEST['institute'];

         $salary_drawn = $_REQUEST['salary_drawn'];

         $date_appoint = $_REQUEST['date_appoint'];
         $work_other = $_REQUEST['work_other'];
         $present_grade = $_REQUEST['present_grade'];
         $date_promoted = $_REQUEST['date_promoted'];
         $date_assumed = $_REQUEST['date_assumed'];
         $official_letter_no = $_REQUEST['official_letter_no'];
         $release_institute_name = $_REQUEST['release_institute_name'];
         $release_study_st_date = $_REQUEST['release_study_st_date'];
         $release_study_end_date = $_REQUEST['release_study_end_date'];
         $release_work_designation = $_REQUEST['release_work_designation'];
         $release_work_date_assumed = $_REQUEST['release_work_date_assumed'];
        
        $personal_details = array('nic' => $nic, 'title' => $title, 'fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'dob' => $dob,);
    }
}