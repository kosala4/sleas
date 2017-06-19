<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormControl extends CI_Controller {
    
    /*Form data controller*/
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_data_model'); //load database model.
        #$this->load->model('Std_Info_model'); //load database model.
        #$this->load->model('District_model'); //load database model.
        
    }
}
?>