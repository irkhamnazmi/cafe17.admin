<?php 

class Transaction extends Controller{
    public $page_name = 'transaction';


    
    public function index(){
        // echo 'home/index';
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' =>  $this->page_name,
            'row' => $this->model('Transaction_model')->getAllRow()
        ];
      
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('transaction/index',$data);
        $this->view('template/footer');
    }

}

?>