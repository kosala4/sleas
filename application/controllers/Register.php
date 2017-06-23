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
		$this->load->view('admin_sidebar');
        
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
    }
}