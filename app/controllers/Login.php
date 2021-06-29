<?php 

class Login extends Controller{
    public function index(){
        // echo 'home/index';
        $data['judul'] = $this->model('User_model')->getTitle();
        $this->view('template/header_login', $data);
        $this->view('login/index');
        $this->view('template/footer_login');
    }
}

?>