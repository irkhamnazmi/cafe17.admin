<?php 

class Menu extends Controller{
    public $page_name = 'menu';


    public function index(){
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' => $this->page_name,
            'row' =>  $this->model('Menu_model')->getAllRow()          
        ];
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('menu/index',$data);
        $this->view('template/footer');
    }

}

?>