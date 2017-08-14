<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/DataAdmin
	 *	- or -
	 * 		http://example.com/index.php/DataAdmin/index
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
        $this->load->model('Report_model'); //load database model.
        
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

    public $response = array("result"=>"none", "data"=>"none");

    
    public function index()
    {
		$this->check_sess($this->session->user_logged);
        if($this->session->user_level != '3') {$this->logout();}
		$this->load->view('head');
		$this->load->view('manager_sidebar');
        
        $this->countOfficers();
        $this->load->view('mangement_dashboard', $this->response);
		$this->load->view('footer');
    }
    
    public function countOfficers()
    {
        //Count All Officers
        $searchArray = array('1' => '1');
        $this->response['countAll'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade I Officers
        $searchArray = array('g.grade' => 'Grade I');
        $this->response['countgr1'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade II Officers
        $searchArray = array('g.grade' => 'Grade II');
        $this->response['countgr2'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Grade III Officers
        $searchArray = array('g.grade' => 'Grade III');
        $this->response['countgr3'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade I in MoE
        $searchArray = array('g.grade' => 'Grade I', 's1.work_place_id' => '1');
        $this->response['moe_1'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade II in MoE
        $searchArray = array('g.grade' => 'Grade II', 's1.work_place_id' => '1');
        $this->response['moe_2'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade III in MoE
        $searchArray = array('g.grade' => 'Grade III', 's1.work_place_id' => '1');
        $this->response['moe_3'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade I in Exams
        $searchArray = array('g.grade' => 'Grade I', 's1.work_place_id' => '2');
        $this->response['exam_1'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade II in Exams
        $searchArray = array('g.grade' => 'Grade II', 's1.work_place_id' => '2');
        $this->response['exam_2'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade III in Exams
        $searchArray = array('g.grade' => 'Grade III', 's1.work_place_id' => '2');
        $this->response['exam_3'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade I in Publications
        $searchArray = array('g.grade' => 'Grade I', 's1.work_place_id' => '3');
        $this->response['epub_1'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade II in Publications
        $searchArray = array('g.grade' => 'Grade II', 's1.work_place_id' => '3');
        $this->response['epub_2'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count officer Grade III in Publications
        $searchArray = array('g.grade' => 'Grade III', 's1.work_place_id' => '3');
        $this->response['epub_3'] = $this->Report_model->countOfficers($searchArray, 'count');
        
        //Count Officer in Provinces
        
        //$Province_list = array( '01'=>'P01'=>0, '01'=>'P02'=>0, '01'=>'P03', '01'=>'P04'=>0, '01'=>'P05'=>0, '01'=>'P06'=>0, '01'=>'P07'=>0, '01'=>'P08'=>0, '01'=>'P09'=>0 );
        $Province_list = array('01' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0),
                              '02' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0),
                              '03' => array('P01'=>0, 'P02'=>0, 'P03'=>0, 'P03'=>0, 'P04'=>0, 'P05'=>0, 'P06'=>0, 'P07'=>0, 'P08'=>0, 'P09'=>0) );
        
        //Count Grade I officers
        $searchArray = array('g.grade' => 'Grade I');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['01'][$row['province']]++;
            }
        }
        
        //Count Grade II officers
        $searchArray = array('g.grade' => 'Grade II');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['02'][$row['province']]++;
            }
        }
        
        //Count Grade III officers
        $searchArray = array('g.grade' => 'Grade III');
        $Grade1Array = $this->Report_model->countOfficers($searchArray, 'list');
        
        foreach($Grade1Array as $row){
            if ($row['province']){
                $Province_list['03'][$row['province']]++;
            }
        }
        
        
        $this->response['listgrade'] = $Province_list;
        
        /*$Province_list = array('P01', 'P02', 'P03', 'P03', 'P04', 'P05', 'P06', 'P07', 'P08', 'P09');
        foreach ($Province_list as $Province){
            
            //Count officer Grade I in Publications
            $searchArray = "g.grade = 'Grade I' AND (pl1.province_id = '$Province' OR pl2.province_id = '$Province' OR pl3.province_id = '$Province' OR pl4.province_id = '$Province')";
            $this->response[$Province.'_1'] = $this->Report_model->countOfficers($searchArray);

            //Count officer Grade II in Publications
            $searchArray = "g.grade = 'Grade II' AND (pl1.province_id = '$Province' OR pl2.province_id = '$Province' OR pl3.province_id = '$Province' OR pl4.province_id = '$Province')";
            $this->response[$Province.'_2'] = $this->Report_model->countOfficers($searchArray);

            //Count officer Grade III in Publications
            $searchArray = "g.grade = 'Grade III' AND (pl1.province_id = '$Province' OR pl2.province_id = '$Province' OR pl3.province_id = '$Province' OR pl4.province_id = '$Province')";
            $this->response[$Province.'_3'] = $this->Report_model->countOfficers($searchArray);
        }*/
    }

}
?>