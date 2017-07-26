<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Increment extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
    }
    
    public $response = array("result"=>"none", "data"=>"none", "register"=>"x", "sidemenu" => "menu_increment", "class" => "Increment");
    public $view_data_array = array();
    
    public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}//Redirect to login page if admin session not initiated.
	}
    
    public function addIncrement()
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
		$this->load->view('search_officer', $this->response);
        
		$this->load->view('footer');
    }
    
    public function add($id)
    {
        $this->check_sess($this->session->user_logged);
        
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $search_array = array('ID'=> $id);
        $this->response['result'] = $this->Form_data_model->searchdb('Personal_Details', $search_array);
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
        $this->response['designation'] = $this->Form_data_model->select('designation');
		$this->load->view('increment_form', $this->response);

		$this->load->view('footer');
    }
    
    public function calculate()
    {
        $person_id = $this->input->post('person_id');
        $increment_date = $this->input->post('increment_date');
        $grade = $this->input->post('grade');
        $current_salary_step = $this->input->post('salary_step');
        $increment_year = date(Y, strtotime($increment_date));
        
        $current_salary = $this->calculateSalary($grade, $current_salary_step, $increment_year);
        $new_salary = $this->calculateSalary($grade, $current_salary_step+1, $increment_year);
        
        $increment = $new_salary - $current_salary;
        
        $salaryDetails = array('new_salary' => $new_salary, 'increment' => $increment);
        
        echo json_encode($salaryDetails);
    }
    
    public function calculateSalary($grade, $salary_step, $increment_year){
        $gr3_start = 22935;
        $gr3_end = 47615;
        $gr3_start_incr = 645;
        $gr3_end_incr = 1335;

        $gr2_start = 30175;
        $gr2_end = 62595;
        $gr2_start_incr = 790;
        $gr2_end_incr = 1630;

        $gr1_start = 36755;
        $gr1_end = 76175;
        $gr1_start_incr = 1050;
        $gr1_end_incr = 2170;

        if($grade == 'Grade I'){

            $salary = ($gr1_start + ($gr1_start_incr * ($salary_step - 20))) + ((($gr1_end + ($gr1_end_incr * ($salary_step - 20))) - ($gr1_start + ($gr1_start_incr * ($salary_step - 20))))/5)*($increment_year - 2015);

        }else if($grade == 'Grade II'){

            $salary = ($gr2_start + ($gr2_start_incr * ($salary_step - 12))) + ((($gr2_end + ($gr2_end_incr * ($salary_step - 12))) - ($gr2_start + ($gr2_start_incr * ($salary_step - 12))))/5)*($increment_year - 2015);

        }else if($grade == 'Grade III'){

            $salary = ($gr3_start + ($gr3_start_incr * ($salary_step - 1))) + ((($gr3_end + ($gr3_end_incr * ($salary_step - 1))) - ($gr3_start + ($gr3_start_incr * ($salary_step - 1))))/5)*($increment_year - 2015);

        }
        return $salary;
    }
}
?>