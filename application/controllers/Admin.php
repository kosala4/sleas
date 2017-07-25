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
    
    public function officer()
    {
		$this->load->view('head');
		//$this->load->view('sclerk_sidebar');
		$this->check_sess($this->session->user_logged);
        
        $this->response['requests'] = $this->getChangeRequestsOfficer($this->session->officer_ID);
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($this->session->officer_ID);
        
		$this->load->view('officer_profile', $this->response);
    }
    
    public function sclerk()
    {
		$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $this->response['requests'] = $this->getChangeRequests($this->session->username);
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
        
        $this->response['requests'] = $this->Form_data_model->get_Change_Requests_Officer($user_ID);
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($user_ID);
		$this->load->view('officer_profile', $this->response);

		$this->load->view('footer');
    }
    
    public function getChangeRequests($sclerk){
        $requests = $this->Form_data_model->get_Change_Requests($sclerk);
        if($requests){ return $requests; }
        
    }
    
    public function updateProfile()
    {
        $person_id = $this->security->xss_clean($_REQUEST['id']);
        $initname = $this->security->xss_clean($_REQUEST['initname']);
        $fname = $this->security->xss_clean($_REQUEST['fname']);
        $mname = $this->security->xss_clean($_REQUEST['mname']);
        $lname = $this->security->xss_clean($_REQUEST['lname']);
        $dob = $this->security->xss_clean($_REQUEST['dob']);
        $mobile = $this->security->xss_clean($_REQUEST['mobile']);
        $telephone = $this->security->xss_clean($_REQUEST['telephone']);
        $email = $this->security->xss_clean($_REQUEST['email']);
        $address_1 = $this->security->xss_clean($_REQUEST['address1']);
        $address_2 = $this->security->xss_clean($_REQUEST['address2']);
        $address_3 = $this->security->xss_clean($_REQUEST['address3']);
        
        $personal_details = array('f_name' => $fname, 'm_name' => $mname, 'l_name' => $lname, 'dob' => $dob, 'user_updated' => $this->session->user_name);
        
        $contact_details = array('address_1' => $address_1, 'address_2' => $address_2, 'address_3' => $address_3, 'mobile' => $mobile, 'telephone' => $telephone, 'email' => $email);
        
        $res = $this->Form_data_model->updateOfficer($person_id, $personal_details, $contact_details);
        
        if($res == '1'){
            $this->session->set_flashdata('update','success');
        }
        redirect("/admin/profile/$person_id");
    }
}


