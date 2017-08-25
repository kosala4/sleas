<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 include_once APPPATH.'third_party/mpdf/mpdf.php';
 
class M_pdf {
 
    public $param;
    public $pdf;
 
    public function __construct($param = '"utf-8","A4","","",10,10,10,10,6,3')
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
        //$this->pdf->SetHTMLFooter('<div style="font-weight: bold; font-size: 8pt; font-style: italic;">This is a SLEAS-HRM System generated letter.</div>','E');
    }
}