<?php

class Menu extends Controller
{
    public $page_name = 'menu';


    public function index()
    {
        $data = [
            'judul' => $this->model('Asset_model')->getTitle(),
            'page' => $this->page_name,
            'row' =>  $this->model('Menu_model')->getAllRow()
        ];
        $this->view('template/header', $data);
        $this->view('template/sidebar', $data);
        $this->view('template/navbar', $data);
        $this->view('menu/index', $data);
        $this->view('template/footer');
    }


    public function add()
    {

        // Check if image file is a actual image or fake image
        if (isset($_FILES["menu_image"])) {
            $target_dir = BASEDIRECTORY.'/uploads/images/';
            $file_name = basename($_FILES["menu_image"]["name"]);
            $target_file = $target_dir . $file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["menu_image"]["tmp_name"]);
            $upload = move_uploaded_file($_FILES["menu_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_file);
            if ($upload == false) {

                Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/menu');
                exit;
                var_dump($upload);
            } else {
                $menu_image = $file_name;
            }
        }
        $menu = $_POST['menu_name'];
        $v = substr($menu , 0, 1);
        $r = $this->model('Menu_model')->getDescRowKey($v);


        if (empty($r)) {
            $x = 0 + 1;
        } else {
            $x = $r['code'] + 1;
        }

        $code = ($v).$x;

        $data = [
            'menu_name' => $_POST['menu_name'],
            'menu_code' => $code,
            'menu_category' => $_POST['menu_category'],
            'menu_description' => $_POST['menu_description'],
            'menu_price' => $_POST['menu_price'],
            'menu_image' => $menu_image

        ];

        if ($this->model('Menu_model')->add($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/menu');

            exit;
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }


    public function getedit()
    {
   
        echo json_encode($this->model('Menu_model')->getRowById($_POST['menu_id']));
    }


    public function edit()
    {   
        
        if (isset($_FILES["menu_image"])) {
            $target_dir = BASEDIRECTORY.'/uploads/images/';
            $file_name = basename($_FILES["menu_image"]["name"]);
            $target_file = $target_dir . $file_name;
            // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // $check = getimagesize($_FILES["menu_image"]["tmp_name"]);
            $upload = move_uploaded_file($_FILES["menu_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $target_file);
            if ($upload == false) {

                // Flasher::setFlash('Foto gagal', 'ditambahkan', 'danger');
                // header('Location: ' . BASEURL . '/menu');
                // exit;
                var_dump($upload);
            } else {
                $menu_image = $file_name;
            }
        }else{
            $menu_image = $_POST['txt_image'];
        }
       
        $data = [
            'menu_id' => $_POST['menu_id'],
            'menu_name' => $_POST['menu_name'],
            'menu_category' => $_POST['menu_category'],
            'menu_description' => $_POST['menu_description'],
            'menu_price' => $_POST['menu_price'],
            'menu_image' => $menu_image

        ];
       
       
        if ($this->model('Menu_model')->edit($data) > 0) {
            Flasher::setFlash('Data berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Data Batal', 'diubah', 'warning');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }

    public function delete($id)
    {
        // var_dump($_POST);
        if ($this->model('Menu_model')->delete($id) > 0) {
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }

    public function getmenu(){
       
       echo json_encode($this->model('Menu_model')->getRowById($_POST['menu_id']));
    }



    
}
