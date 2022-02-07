<?php
   
    class Dashboard extends Controller{
        public $page_name = 'dashboard';

       
        public function index(){
            // echo 'home/index';      
            
            $data = [
               
                'page' => $this->page_name,
                'new_user'=> $this->model('User_model')->getNewRow(),
                'money_income' => $this->model('Transaction_model')->getMoneyIncomeRow(),
                'transaction_total' => $this->model('Transaction_model')->getTotalRow()
                
               
            ];

           

                $this->view('template/header', $data);
                $this->view('template/sidebar', $data);
                $this->view('template/navbar', $data);
                $this->view('dashboard/index',$data);
                $this->view('template/footer');


             // $data['judul'] = $this->model('Asset_model')->getTitle();
            // $data['page'] = $this->page_name;
            // if(!empty($_SESSION['cashier'])){
            //     $this->view('template/header', $data);
            //     $this->view('template/sidebar', $data);
            //     $this->view('template/navbar', $data);
            //     $this->view('dashboard/index',$data);
            //     $this->view('template/footer');
            // } else{
            //     header('Location: ' . BASEURL . '/account');
            //     exit;
            // }   
          
         }

     
    }
