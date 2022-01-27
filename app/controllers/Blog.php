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


    public function add()
    {

        // Check if image file is a actual image or fake image
        if (isset($_FILES["blog_image"])) {
            $target_dir = BASEDIRECTORY.'/uploads/blog/images/';
            $file_name = basename($_FILES["blog_image"]["name"]);
            $target_file = $target_dir . $file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["blog_image"]["tmp_name"]);
            $upload = move_uploaded_file($_FILES["blog_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_file);
            if ($upload == false) {

                Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/blog');
                exit;
                var_dump($upload);
            } else {
                $blog_image = $file_name;
            }
        }
     

        $data = [
            'blog_title' => $_POST['blog_title'],
            'cashier_id' => $_POST['cashier_id'],
            'blog_description' => $_POST['blog_description'],
            'blog_image' => $blog_image

        ];

        if ($this->model('Blog_model')->add($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/blog');

            exit;
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/blog');
            exit;
        }
    }


    public function getedit()
    {
    
        echo json_encode($this->model('Blog_model')->getRowById($_POST['blog_id']));
    }


    public function edit()
    {

        // Check if image file is a actual image or fake image
        if ($_FILES["blog_image"]["error"] = 0) {
            $target_dir = BASEDIRECTORY.'/uploads/blog/images/';
            $file_name = basename($_FILES["blog_image"]["name"]);
            $target_file = $target_dir . $file_name;
            // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // $check = getimagesize($_FILES["blog_image"]["tmp_name"]);
            $upload = move_uploaded_file($_FILES["blog_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_file);
            if ($upload == false) {

                // Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
                // header('Location: ' . BASEURL . '/blog');
                // exit;
                var_dump($upload);
            } else {
                $blog_image = $file_name;
            }
        }else{
            $blog_image = $_POST['txt_image'];
        }
     

        $data = [
            'blog_id' => $_POST['blog_id'],
            'blog_title' => $_POST['blog_title'],
            'cashier_id' => $_POST['cashier_id'],
            'blog_description' => $_POST['blog_description'],
            'blog_image' => $blog_image

        ];

        if ($this->model('Blog_model')->edit($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/blog');

            exit;
        } else {
            Flasher::setFlash('Data gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/blog');
            exit;
        }
    }


    public function delete($id)
    {
        // var_dump($_POST);
        if ($this->model('Blog_model')->delete($id) > 0) {
            $row  = $this->model('Blog_model')->getRowById($id);
            $path = $_SERVER['DOCUMENT_ROOT'].BASEDIRECTORY.'/uploads/blog/'.$row['blog_image'];
            if (file_exists($path)) {
                unlink($path);    
            } 
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/blog');
            exit;
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/blog');
            exit;
        }
    }


}

?>
