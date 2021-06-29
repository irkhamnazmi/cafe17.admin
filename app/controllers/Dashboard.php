<?php
   
    class Dashboard extends Controller{
        public $page_name = 'dashboard';
        public function index(){
            // echo 'home/index';
            $data['judul'] = $this->model('User_model')->getTitle();
            $data['page'] = $this->page_name;
            // $data['email'] = $this->model('User_model')->getEmail;
            $this->view('template/header', $data);
            $this->view('template/sidebar', $data);
            $this->view('template/navbar', $data);
            $this->view('dashboard/index',$data);
            $this->view('template/footer');
        }

     
    }

?>