<?php 

class User extends Controller{
    public $page_name = 'user';

  

    public function index(){
      
        $data = [
          
            'page' =>  $this->page_name,
            'row' => $this->model('User_model')->getAllRow()
        ];
      
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('user/index',$data);
        $this->view('template/footer');
    }


    public function delete($id){
        // var_dump($_POST);
        if($this->model('User_model')->delete($id) > 0){
            Flasher::setFlash('berhasil','dihapus','success');
            header('Location: ' . BASEURL . '/user');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }



}

?>