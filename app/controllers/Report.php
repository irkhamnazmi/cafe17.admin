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

}

?>