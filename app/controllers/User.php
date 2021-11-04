<?php 

class User extends Controller{
    public $page_name = 'user';

  

    public function index(){
      
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' =>  $this->page_name,
            'row' => $this->model('User_model')->getAllRow()
        ];
      
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('user/index',$data);
        $this->view('template/footer');
    }

}

?>