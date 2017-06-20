<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/login/<method_name>
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->helper('url'); //load url helper.
        $this->load->helper('form');
    }
	public function index()
	{
		//$this->load->view('head');
		$this->load->view('login');
		$this->load->view('footer');
	}

	function redirect_user($user_type)
	{
		//check user type to redirect
		if ($user_type == "admin") {
			redirect('/admin/index');
		}else {
			redirect('/editor/index');
		}
	}

	function login_user()
	{
		$uname = $this->security->xss_clean($_REQUEST['username']);
		$pwd  = $this->security->xss_clean($_REQUEST['password']);

		$chk_login = $this->User_model->login($uname, $pwd);

		if ($chk_login == 1) {
			$this->load->library('session');
			$data = $this->User_model->get_a_record('user_name',$uname);
			$userData = array('username' => $uname, 'user_logged' => "in");
			$this->session->set_userdata($userData);

			redirect('/admin/index');
		}else {
			echo "Invalid User name or Password";
			redirect('/login/index');
		}
	}
}