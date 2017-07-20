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
}
?>