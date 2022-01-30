<?php 

class Report extends Controller{
    public $page_name = 'report';

 

    public function index(){
      
       
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' => $this->page_name
        ];
     
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('report/index',$data);
        $this->view('template/footer');
    }

    public function by_date(){
        
        $this->view('template/header_dompdf');
        $this->view('report/by_date');
        $this->view('template/footer_dompdf');
    }
    public function by_month(){
        $this->view('template/header_dompdf');
        $this->view('report/by_month');
        $this->view('template/footer_dompdf');
    }
    public function by_year(){
        $this->view('template/header_dompdf');
        $this->view('report/by_year');
        $this->view('template/footer_dompdf');
    }

}

?>