<?php
    
    class Beranda extends Controller{
        public function index(){
            // echo 'home/index';
            $data['judul'] = 'Beranda';
            $this->view('template/header', $data);
            $this->view('beranda/index');
            $this->view('template/footer');
        }
    }

?>