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
        #$this->load->model('Std_Info_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
        
    }

    public $response = array("result"=>"none", "data"=>"none");

	public function index()
	{
		//$this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('admin_sidebar');
		$this->load->view('register-staff');

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

	public function add_student()
	{
		$this->check_sess($this->session->user_logged); //check the session before load page.

		$data = array('name', 'user_name', 'user_type');
		$result['data'] = $this->User_model->select($data);

		//loading the page
		$this->load->view('head');
		$this->load->view('admin_sidebar');
		$this->load->view('add_staff', $result);
		$this->load->view('footer');
	}

	public function add_student_details()
	{
		$regno = $_REQUEST['regno'];
		$appno = $_REQUEST['appno'];
		$fname = $_REQUEST['fname'];
		$initname = $_REQUEST['initname'];
		$nic = $_REQUEST['nic'];
		$dob = $_REQUEST['dob'];
		$gender = $_REQUEST['gender'];
		$religion = $_REQUEST['religion'];
		$nationality = $_REQUEST['nationality'];
		$address = $_REQUEST['address'];
		$landline = $_REQUEST['landline'];
		$mobile = $_REQUEST['mobile'];
		$district = $_REQUEST['district'];
		$divsec = $_REQUEST['divsec'];
		$pname = $_REQUEST['pname'];
		$foccu = $_REQUEST['foccu'];
		$moccu = $_REQUEST['moccu'];
		$brothers = $_REQUEST['brothers'];
		$sisters = $_REQUEST['sisters'];
		$emaddress = $_REQUEST['emaddress'];
		$emphone = $_REQUEST['emphone'];
		$bgroup = $_REQUEST['bgroup'];

		$data = array('std_reg_no' => $regno, 'std_app_no' => $appno, 'std_nic' => $nic, 'college_id' => '1', 'std_f_name' =>$fname, 'std_i_name' =>$initname, 'std_dob' =>$dob, 'std_gender' =>$gender, 'std_religion' =>$religion, 'std_nation' =>$nationality, 'std_address' =>$address, 'std_land_line' =>$landline, 'std_mobile' =>$mobile, 'std_district' =>$district, 'std_div_sec' =>$divsec, 'std_p_name' =>$pname, 'std_poccu' =>$foccu, 'std_moccu' =>$moccu, 'std_bros' =>$brothers, 'std_sis' =>$sisters, 'std_em_address' =>$emaddress, 'std_em_phone' =>$emphone, 'b_group' =>$bgroup );

		$result = $this->Std_Info_model->insert($data);

		if ($result == 1) {
                        $this->response['result'] = 'success';
                        $this->response['data'] = $fname;
			$this->index();
		}
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
		$this->load->view('sclerk_dashboard');

		#$this->response['district'] = $this->District_model->select('district_name');
		#$this->load->view('add_student', $this->response);
		$this->load->view('footer');
        
    }
}


