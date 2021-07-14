<?php 

class Blog extends Controller{
    public $page_name = 'blog';

    public function index(){
        
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' => $this->page_name,
            'row' => $this->model('Blog_model')->getAllRow()
        ];
        
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('blog/index',$data);
        $this->view('template/footer');
    }

}

?>
