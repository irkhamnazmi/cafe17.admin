<?php
   
    class Dashboard extends Controller{
        public $page_name = 'dashboard';

       
        public function index(){
            // echo 'home/index';      
            
            $data = [
                'judul' => $this->model('Asset_model')->getTitle(),
                'page' => $this->page_name,
               
            ];

            // $data['judul'] = $this->model('Asset_model')->getTitle();
            // $data['page'] = $this->page_name;

            if(isset($_SESSION['cashier_id'])){
                $this->view('template/header', $data);
                $this->view('template/sidebar', $data);
                $this->view('template/navbar', $data);
                $this->view('dashboard/index',$data);
                $this->view('template/footer');
            } else{
                header('Location: ' . BASEURL . '/account');
              
            }   
          
         }

     
    }
