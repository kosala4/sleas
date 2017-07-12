<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');

class Placement extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); //load database model.
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
        
    }
    
    public $response = array("result"=>"none", "data"=>"none", "register"=>"x");
    
    public function check_sess($user_logged)
	{
		if ($user_logged != "in") {
			redirect('/login/index');
		}//Redirect to login page if admin session not initiated.
	}
    
    public function newPlacement()
    {
        $this->check_sess($this->session->user_logged);
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        
        
		$this->load->view('new_placement');

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
		$this->load->view('new_placement_form', $this->response);

		$this->load->view('footer');
    }
    
    public function placement_add()
    {
        $nic = $this->security->xss_clean($_REQUEST['nic']);
        $person_id = $this->security->xss_clean($_REQUEST['person_id']);
        $work_place_id = $this->security->xss_clean($_REQUEST['work_place']);
        $main_division = $this->security->xss_clean($_REQUEST['main_division']);
        $main_branch = $this->security->xss_clean($_REQUEST['main_branch']);
        $province = $this->security->xss_clean($_REQUEST['province']);
        $district = $this->security->xss_clean($_REQUEST['district']);
        $zone = $this->security->xss_clean($_REQUEST['zone']);
        $division = $this->security->xss_clean($_REQUEST['division']);
        $institute = $this->security->xss_clean($_REQUEST['institute']);
        $work_date = $this->security->xss_clean($_REQUEST['work_date']);
        $official_letter_no = $this->security->xss_clean($_REQUEST['official_letter_no']);
        
        $psc_letter = $this->security->xss_clean($_REQUEST['psc_letter']);
        $appoint_date = $this->security->xss_clean($_REQUEST['appoint_date']);
        
        $service_id_array = $this->Form_data_model->get_recent_service_id();
        $service_id = $service_id_array['0']['ID'] + 1;
        
        $service = array('ID' => $service_id,'nic' => $nic, 'service_mode' => $service_mood, 'work_place_id'=>$work_place_id, 'work_division_id'=>$main_division, 'work_branch_id'=>$main_branch, 'duty_date'=>$work_date, 'off_letter_no'=>$official_letter_no , 'user_updated' => $this->session->user_name);
        if($work_place_id == '16'){
            $service['sub_location_id'] = $institute;
        }else{
            $service['sub_location_id'] = $province;
        }
        
        $search_array = array('ID'=> $person_id);
        $personal_details = $this->Form_data_model->searchdb('Personal_Details', $search_array);
        
        $work_place = $this->Form_data_model->searchdbvalue('Work_Place', 'ID', $work_place_id);
        $main_division = $this->Form_data_model->searchdbvalue('Main_Office_Divisions', 'ID', $main_division);
        $main_branch = $this->Form_data_model->searchdbvalue('Main_Office_Branches', 'ID', $main_branch);
        
        
        $view_data_array = array('work_place'=>$work_place, 'division'=>$main_division, 'branch'=>$main_branch, 'personal_details'=>$personal_details, 'work_date'=>$work_date, 'psc_letter'=>$psc_letter, 'appoint_date'=>$appoint_date);
        
        $this->generate_letter($view_data_array);
    }
    
    public function generate_letter($view_data_array)
    {
        
        
		$this->load->view('head');
		$this->load->view('sclerk_sidebar');
        $this->load->view('letter-header',$view_data_array);
        $this->load->view('placement_letter',$view_data_array);
		$this->load->view('footer');
        
        /*$this->load->library('pdf');
        $this->load->view('letter-header', $service);
        $this->load->view('placement_letter', $service);
        $this->pdf->render();
        $this->pdf->stream("welcome.pdf");*/
        
        
        /*$dompdf = new Dompdf\Dompdf();
 
        $html = $this->load->view('placement_letter',$view_data_array,true);
 
        $dompdf->loadHtml($html);
 
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
 
        // Render the HTML as PDF
        $dompdf->render();
 
        // Get the generated PDF file contents
        $pdf = $dompdf->output();
 
        // Output the generated PDF to Browser
        $dompdf->stream("welcome.pdf");
        
        $pdfFilePath = "output_pdf_name.pdf";*/
        
       /* $this->load->library('m_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");*/
    }
}
?>