<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        
    }

    public $response = array("result"=>"none", "data"=>"none");

	public function index()
	{
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '0') {$this->logout();}
        
		$this->load->view('head');
		$this->load->view('admin_sidebar');
        
        $this->response['workPlaces'] = $this->Form_data_model->select('workplace');
        $this->response['provinceList'] = $this->Form_data_model->select('province_list');
		$this->load->view('admin_dashboard', $this->response);
        
		$this->load->view('footer');
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
    
    //Function to show profile of logged in officer
    public function officer()
    {
		$this->check_sess($this->session->user_logged);
        
		$this->load->view('head');
        
        //Get Officer's Details from database
        $this->response['requests'] = $this->Form_data_model->get_Change_Requests_Officer($this->session->officer_ID);
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($this->session->officer_ID);
        $this->response['deativate_type'] = $this->Form_data_model->select('deativate_type');
        
		$this->load->view('officer_profile', $this->response);
    }
    
    //Function to show dashboard for logged in subject clerk.
    public function sclerk()
    {
		$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        //Get relavent data from database
        $this->response['requests'] = $this->getChangeRequests($this->session->username);
        $this->response['officers_list'] = $this->Form_data_model->get_Officers_List();
		$this->load->view('sclerk_dashboard', $this->response);

		$this->load->view('footer');
        
    }
    
    public function getDetails()
    {
        $result['officers_list'] = $this->Form_data_model->get_Officers_List();
    }
    
    //Function to show selected officer's profile to logged in subject clerk.
    public function profile($user_ID)
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        $this->response['requests'] = $this->Form_data_model->get_Change_Requests_Officer($user_ID);
        $this->response['user_details'] = $this->Form_data_model->get_Officer_Details($user_ID);
        $this->response['deativate_type'] = $this->Form_data_model->select('deativate_type');
		$this->load->view('officer_profile', $this->response);

		$this->load->view('footer');
    }
    
    //Function to get Change Requests applicable to particular subject clerk.
    public function getChangeRequests($sclerk)
    {
        $requests = $this->Form_data_model->get_Change_Requests($sclerk);
        if($requests){ return $requests; }
        
    }
    
    public function changeRequest()
    {
        
        $person_id = $this->security->xss_clean($this->input->post('person_id'));
        $sclerk = $this->security->xss_clean($this->input->post('sclerk'));
        $title = $this->security->xss_clean($this->input->post('title'));
        $message = $this->security->xss_clean($this->input->post('message'));
        
        $dataarray = array('person_id' => $person_id, 'sclerk' => $sclerk, 'message_title' => $title, 'message' => $message);
        $res = $this->Form_data_model->insertData('Change_Request', $dataarray);
        
        if($res = '1'){
            echo json_encode("success");
        }
        
                                              
    }
    
    //Function to update Officer's Personal and Contact Details
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
    
    public function deactivateOfficer()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->input->post('user_id');
        $deactivate_type_id = $this->input->post('deactivate_type_id');
        $deactivate_date = $this->input->post('deactivate_date');
        
        $dataarray = array("deactivate_type_id" => $deactivate_type_id, "deactivate_date" => $deactivate_date, "status" => Deactivated);
        
        
        //$table, $search_field, $search_key, $update_array
        $res = $this->Form_data_model->update('General_Service', 'person_id', $person_id, $dataarray);
        
        if($res = 1){
            echo "success";
        }
    }
    
    public function requiredDateUpdate()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->input->post('user_id');
        $field = $this->input->post('field');
        $field_date = $this->input->post('field_date');
        
        switch ($field) {
            case "eb_1":
                $field_name = 'eb_1_pass';
                break;
            case "eb_2":
                $field_name = 'eb_2_pass';
                break;
            case "eb_3":
                $field_name = 'eb_3_pass';
                break;
            case "pg_dip":
                $field_name = 'pg_dip_pass';
                break;
            case "pg_deg":
                $field_name = 'pg_deg_pass';
                break;
            case "cb_1":
                $field_name = 'cb_1_date';
                break;
            case "cb_2":
                $field_name = 'cb_2_date';
                break;
            case "cb_3":
                $field_name = 'cb_3_date';
                break;
        }
        
        $dataarray = array($field_name => $field_date);
        
        
        //$table, $search_field, $search_key, $update_array
        $res = $this->Form_data_model->update('General_Service', 'person_id', $person_id, $dataarray);
        
        if($res = 1){
            echo $field;
        }
    }
    
    public function deleteDateUpdate()
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $person_id = $this->input->post('user_id');
        $field = $this->input->post('field');
        
        switch ($field) {
            case "eb_1":
                $field_name = 'eb_1_pass';
                break;
            case "eb_2":
                $field_name = 'eb_2_pass';
                break;
            case "eb_3":
                $field_name = 'eb_3_pass';
                break;
            case "pg_dip":
                $field_name = 'pg_dip_pass';
                break;
            case "pg_deg":
                $field_name = 'pg_deg_pass';
                break;
            case "cb_1":
                $field_name = 'cb_1_date';
                break;
            case "cb_2":
                $field_name = 'cb_2_date';
                break;
            case "cb_3":
                $field_name = 'cb_3_date';
                break;
        }
        
        $dataarray = array($field_name => NULL);
        
        //$table, $search_field, $search_key, $update_array
        $res = $this->Form_data_model->update('General_Service', 'person_id', $person_id, $dataarray);
        
        if($res = 1){
            echo "Success";
        }
    }
    
    public function registerUser()
    {
        
        header('Content-Type: application/x-json; charset=utf-8');
        $name = $this->input->post('name');
        $uname = $this->input->post('uname');
        $passwd = password_hash($this->input->post('passwd'), PASSWORD_DEFAULT);
        $utype = $this->input->post('utype');
        $work_place = $this->input->post('work_place');
        $province_office = $this->input->post('province_office');
        $zonal_office = $this->input->post('zonal_office');
        
        $user_array = array('name' => $name, 'user_name' => $uname, 'passwd' => $passwd, 'level' => $utype, 'workplace_id' => $work_place);
        $res = $this->Form_data_model->insertData('User', $user_array);
        
        if($work_place == '5' OR $work_place =='6'){
            $user_array['sub_location_id'] = $province_office;
        } else if($$work_place == '7'){
            $user_array['sub_location_id'] = $zonal_office;
        }
        
        if(res == '1'){
            echo "Success";
        }
    }
}


