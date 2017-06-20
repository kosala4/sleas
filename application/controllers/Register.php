<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        #$this->load->model('Std_Info_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
        
    }
    
    public function newMember(){
        //$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('admin_sidebar');
		$this->load->view('register-staff');

		#$this->response['district'] = $this->District_model->select('district_name');
		#$this->load->view('add_student', $this->response);
		$this->load->view('footer');
    }
}