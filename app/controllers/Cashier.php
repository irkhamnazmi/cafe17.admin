<?php 

class Cashier extends Controller{
    public $page_name = 'cashier';
   
    public function index(){
      
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' => $this->page_name,
            'row' => $this->model('Cashier_model')->getAllRow()

        ];
       
    
       
       
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('cashier/index',$data);
        $this->view('template/footer');
    }

    public function add(){
        if($this->model('Cashier_model')->add($_POST) > 0){
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }
    }


    public function getedit(){
        //    echo "OK";

           echo json_encode($this->model('Cashier_model')->getRowById($_POST['cashier_id']));
        
    }


    public function edit(){
        if($this->model('Cashier_model')->edit($_POST) > 0){
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }
  }

    public function delete($id){
        // var_dump($_POST);
        if($this->model('Cashier_model')->delete($id) > 0){
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/cashier');
            exit;
        }
    }



    public function search(){
       
        

        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' => $this->page_name,
            'row' => $this->model('Cashier_model')->getRowByKeyword()

        ];
       
    
       
       
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('cashier/index',$data);
        $this->view('template/footer');
    }

}

?>