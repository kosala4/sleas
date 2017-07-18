<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
        
    }

    public $response = array("result"=>"none", "data"=>"none");

	public function index()
	{
		//$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('admin_sidebar');
		$this->load->view('admin_dashboard');

		#$this->response['district'] = $this->District_model->select('district_name');
		#$this->load->view('add_student', $this->response);
		$this->load->view('footer');
	}

	public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			$this->logout();
		}//Redirect to login page if admin session not initiated.
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/login/index');
	}

	public function load_profile()
	{
		$uname = $_REQUEST['selected_id'];
		$this->load->view('staff_profile');
	}
    
    public function sclerk()
    {
		$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $this->response['officers_list'] = $this->Form_data_model->get_Officers_List();
		$this->load->view('sclerk_dashboard', $this->response);

		$this->load->view('footer');
        
    }
    
    public function getDetails()
    {
        $result['officers_list'] = $this->Form_data_model->get_Officers_List();
    }
    
    public function profile($user_ID)
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($user_ID);
		$this->load->view('officer_profile', $this->response);

		$this->load->view('footer');
    }
}


