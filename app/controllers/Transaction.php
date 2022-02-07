<?php 

class Transaction extends Controller{
    public $page_name = 'transaction';


    
    public function index(){
        // echo 'home/index';
       

        $data = [
          
            'page' =>  $this->page_name,
            'row' => $this->model('Transaction_model')->getAllRow()
            
        ];
      
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('transaction/index',$data);
        $this->view('template/footer');
        unset($_SESSION['receipt_print']);
    }

    public function detail($id){
        $x = $this->model('Transaction_model')->getSingleRowById($id);
        $data = [
            'page' =>  $this->page_name,
            'status'=> $x['transaction_status'],
            'row' => $this->model('Transaction_model')->getRowById($x['transaction_id']),
            'rowId' => $x,
            'rowMenu' => $this->model('Menu_model')->getAllRow()
           
        ];

        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('transaction/detail',$data);
        $this->view('template/footer');
    }


    public function contact(){
        echo json_encode($this->model('Transaction_model')->getSingleRowById($_POST['transaction_id']));
    }


    public function confirm($id){
        $x = $this->model('Transaction_model')->getSingleRowById($id);
        switch($x['transaction_status']){
           
            case 'Menunggu Konfirmasi':
                $data = [
                    'transaction_status' => 'Menunggu Pembayaran',
                    'transaction_id' => $id,

                ];
                $this->model('Transaction_model')->postUpdateRowByStatus($data);
                break;
            case 'Menunggu Pembayaran':
                $data = [
                    'transaction_status' => 'Sedang Proses',
                    'transaction_id' => $id,

                ];
                $this->model('Transaction_model')->postUpdateRowByStatus($data);
                break;
            case 'Sedang Proses':
                $data = [
                    'transaction_status' => 'Lunas',
                    'transaction_id' => $id

                ];
                if($this->model('Transaction_model')->postUpdateRowByStatus($data)){
                    echo '<script>history.back()</script>';
                    $this->view('transaction/proof');
                  

                }

               
           
        }
      
      echo '<script>history.back()</script>';
    }

    public function delete($id){  

        $x = $this->model('Transaction_model')->getSingleRowById($id);
        switch($x['transaction_status']){
            case 'Menunggu Konfirmasi':
                $this->model('Transaction_model')->postDeleteAllDetailRow($x['transaction_id']);
                $this->model('Transaction_model')->postDeleteRow($x['transaction_id']);
                header('Location: ' . BASEURL . '/transaction');
                break;
            case 'Menunggu Pembayaran':
                $data = [
                    'transaction_status' => 'Menunggu Konfirmasi',
                    'transaction_id' => $x['transaction_id'],
                        
                ];
                $this->model('Transaction_model')->postUpdateRowByStatus($data);
                echo '<script>history.back()</script>';
                break;
            case 'Sedang Proses':
               if(!empty($x['transaction_image'])){
                $path = $_SERVER['DOCUMENT_ROOT'].BASEDIRECTORY.'/uploads/transaction/images/'.$x['transaction_image'];
                if (file_exists($path)) {
                    unlink($path);    
                } 
               }
            
           
                $data = [
                    'transaction_status' => 'Menunggu Pembayaran',
                    'transaction_id' => $x['transaction_id']

                ];
             
                $this->model('Transaction_model')->postUpdateRowByStatus($data);
                echo '<script>history.back()</script>';
           
        }
        
       
       
       
    }

    // public function getinvoice(){
    //     $x = $this->model('Transaction_model')->getLastRow();
           
    //     if(empty($x['code'])){
    //         $order = 1;
    //         // var_dump($order);
           
    //     }else{
    //         $number = substr($x['code'],strpos($x['code'],'INV'));
    //         $order = substr($number, 5,7);
    //         $order++; 
    //     }
    //     $code = 'CAFE17PWT/'.date('Ymd').'/INV';
    //     $new_inv = $code.sprintf("%03s", $order);
    //     echo json_encode($new_inv); 
    // }


    // public function getdatabyinvoice(){

    //     if(empty($this->model('Transaction_method')->getRowByInvoice($_POST['transaction_invoice_code']))){
    //         echo json_encode('available');
    //     }else{
    //         echo json_encode('unavailable');
    //     }


    // }

    public function create(){
        $x = $this->model('Transaction_model')->getLastRow();
           
            if(empty($x['code'])){
                $order = 1;
                // var_dump($order);
               
            }else{
                $number = substr($x['code'],strpos($x['code'],'INV'));
                $order = substr($number, 5,7);
                $order++; 
            }
            $code = 'CAFE17PWT/'.date('Ymd').'/INV';
            $new_inv = $code.sprintf("%03s", $order);

        $data = [
            'transaction_status' => 'Menunggu Konfirmasi',
            'transaction_category' => 'Offline',
            'transaction_invoice_code' => $new_inv,
            'transaction_customer_name' => $_POST['transaction_customer_name'],
            'transaction_customer_phone_number' => $_POST['transaction_customer_phone_number'],
            'transaction_customer_address' => $_POST['transaction_customer_address']
        ];


        if($this->model('Transaction_model')->postInsertRow($data)){
            $x = $this->model('Transaction_model')->getRowByInvoice($data['transaction_invoice_code']);
            header('Location: ' . BASEURL . '/transaction/detail/'.$x['transaction_id']);
        }
       
    
    }


    public function addorder($id){
        $data = [
            'transaction_id' => $id,
            'menu_id' => $_POST['menu_id'],
            'transaction_detail_qty' => $_POST['transaction_detail_qty'],
            'transaction_detail_price_total' => $_POST['transaction_detail_price_total'],
            'transaction_detail_note' => $_POST['transaction_detail_note']
        ];
        if($this->model('Transaction_model')->postInsertDetailRow($data)){
            header('Location: ' . BASEURL . '/transaction/detail/'.$data['transaction_id']);
        }
        
    }

    public function getid(){
        echo json_encode($this->model('Transaction_model')->getSingleRowById($_POST['transaction_id']));
    }

    public function receipt($id){
       $data = [
            'row' => $this->model('Transaction_model')->getRowById($id),
            'rowId' => $this->model('Transaction_model')->getSingleRowById($id)
       ];
  

       $_SESSION['receipt_print'] = [
        'row' => $data['row'],
        'rowId' => $data['rowId'],
        'paper' => 'A8',
        'title' => 'Struk_'.$data['rowId']['transaction_invoice_code']
    ];

    header('Location: ' . BASEURL . '/transaction/receipt_print');
       
      
    }

    public function receipt_print(){

        $data = $_SESSION['receipt_print']; 
        $this->view('template/header_dompdf', $data);
        $this->view('transaction/receipt', $data);
        $this->view('template/footer_dompdf', $data); 
    }

    
}
