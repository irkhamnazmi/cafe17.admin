<?php 

class Report extends Controller{
    public $page_name = 'report';
   

    public function getuser_year(){
        echo json_encode($this->model('Report_model')->getUserYear());
    }
    public function gettransaction_year(){
        echo json_encode($this->model('Report_model')->getTransactionYear());
    }


    public function index(){
      
       
        $data = [
            'page' => $this->page_name,
            
        ];

     
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('report/index',$data);
        $this->view('template/footer');
        unset($_SESSION['report_print']);
    }

    public function by_date(){
        
        $data = [
            'data' => $_POST['data'],
            'date' => $_POST['date']     
        ];

        switch($data['data']){
             // User
            case 'User':
               $x =  $this->model('Report_model')->getUserRowByDate($data);
            if(empty($x)){
                Flasher::setFlash('Data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/report');
                exit;
            } else{
                $_SESSION['report_print'] = [
                    'data' => $data['data'],
                    'date' => $data['date'],
                    'row' => $x,
                    'rowId' => $this->model('Report_model')->getUserSingleRowByDate($data),
                    'paper' => 'A4',
                    'title' => 'laporan_pertanggal_'.$data['data']
                ];
                
                header('Location: ' . BASEURL . '/report/date_print');
            }    
                break;
                // Transaction
            case 'Transaction':
               $x =  $this->model('Report_model')->getTransactionRowByDate($data);
            if(empty($x)){
                Flasher::setFlash('Data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/report');
                exit;
            } else{
                $_SESSION['report_print'] = [
                    'data' => $data['data'],
                    'date' => $data['date'],
                    'row' => $x,
                    'rowId' => $this->model('Report_model')->getTransactionSingleRowByDate($data),
                    'paper' => 'A4',
                    'title' => 'laporan_pertanggal_'.$data['data']
                ];
                
                header('Location: ' . BASEURL . '/report/date_print');
            }    
                break;
        }

       
    }
    public function by_month(){
        $data = [
            'data' => $_POST['data'],
            'month' => $_POST['month'],
            'year' => $_POST['year']

        ];

        switch($data['data']){
            case 'User':
               $x =  $this->model('Report_model')->getUserRowByMonth($data);
            if(empty($x)){
                Flasher::setFlash('Data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/report');
                exit;
            } else{
                $_SESSION['report_print'] = [
                    'data' => $data['data'],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'row' => $x,
                    'rowId' => $this->model('Report_model')->getUserSingleRowByMonth($data),
                    'paper' => 'A4',
                    'title' => 'laporan_perbulan_'.$data['data']
                ];
              
                header('Location: ' . BASEURL . '/report/month_print');
            }    
                break;
            case 'Transaction':
               $x =  $this->model('Report_model')->getTransactionRowByMonth($data);
            if(empty($x)){
                Flasher::setFlash('Data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/report');
                exit;
            } else{
                $_SESSION['report_print'] = [
                    'data' => $data['data'],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'row' => $x,
                    'rowId' => $this->model('Report_model')->getTransactionSingleRowByMonth($data),
                    'paper' => 'A4',
                    'title' => 'laporan_perbulan_'.$data['data']
                ];
              
                header('Location: ' . BASEURL . '/report/month_print');
              
            }    
                break;
        }
    }
    public function by_year(){
        $data = [
            'data' => $_POST['data'],
            'year' => $_POST['year']

        ];

        switch($data['data']){
            case 'User':
               $x =  $this->model('Report_model')->getUserRowByYear($data);
            if(empty($x)){
                
                Flasher::setFlash('Data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/report');
                exit;
            } else{
                $_SESSION['report_print'] = [
                    'data' => $data['data'],
                    'year' => $data['year'],
                    'row' => $x,
                    'rowId' => $this->model('Report_model')->getUserSingleRowByYear($data),
                    'paper' => 'A4',
                    'title' => 'laporan_pertahun_'.$data['data']
                ];

                header('Location: ' . BASEURL . '/report/year_print');
            }    
                break;
            case 'Transaction':
               $x =  $this->model('Report_model')->getTransactionRowByYear($data);
            if(empty($x)){
                Flasher::setFlash('Data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/report');
                exit;
            } else{
                $_SESSION['report_print'] = [
                    'data' => $data['data'],
                    'year' => $data['year'],
                    'row' => $x,
                    'rowId' => $this->model('Report_model')->getTransactionSingleRowByYear($data),
                    'paper' => 'A4',
                    'title' => 'laporan_pertahun_'.$data['data']
                ];
               
                header('Location: ' . BASEURL . '/report/year_print');
            }    
                break;
        }
    }


    public function date_print(){ 
        $data = $_SESSION['report_print']; 
      
        $this->view('template/header_dompdf', $data);
        $this->view('report/by_date', $data);
        $this->view('template/footer_dompdf', $data);

     
    }
    public function month_print(){
      
        $data = $_SESSION['report_print']; 
      
        $this->view('template/header_dompdf', $data);
        $this->view('report/by_month', $data);
        $this->view('template/footer_dompdf', $data);
     
        
    }
    public function year_print(){
        $data = $_SESSION['report_print']; 
       
        $this->view('template/header_dompdf', $data);
        $this->view('report/by_year', $data);
        $this->view('template/footer_dompdf', $data);
    }

}
