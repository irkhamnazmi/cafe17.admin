<?php 

class Account extends Controller{
    public function index(){
        // echo 'home/index';

        if(!isset($_SESSION['cashier_id'])){
            $data['judul'] = $this->model('Asset_model')->getTitle();
            $this->view('template/header_login', $data);
            $this->view('account/index');
            $this->view('template/footer_login');
        } else{
            header('Location: ' . BASEURL . '/dashboard');
          
        }   

      
    }

    public function getlogin()
    {
        // var_dump($_POST);
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'email' => trim($_POST['email']),
            'pass' => trim($_POST['pass']),
            'emailError' => '',
            'passError' => ''
        ];

        if (empty($data['email'])) {
            $data['emailError'] = "Masukan Email anda";
            Flasher::setFlash($data['emailError'], 'login', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // validasi password
        if (empty($data['pass'])) {
            $data['passError'] = "Masukan Sandi anda";
            Flasher::setFlash($data['passError'], 'login', 'danger');
            header('Location: ' . BASEURL . '/account');
            exit;
        }

        // cek jika error karena kosong 
        if (empty($data['emailError']) && empty($data['passError'])) {
            $loginUser = $this->model('Cashier_model')->getLogin($_POST);
            // var_dump($data['id']);
            if ($loginUser) {
                $this->CreateSession($loginUser);
                // Flasher::setFlash($loginUser['email'], 'login', 'success');
                // header('Location: ' . BASEURL . '/dashboard');
                // exit;
               
            } else {
                $data['passError'] = 'Email atau Sandi tidak valid';
                Flasher::setFlash($data['passError'], 'login', 'danger');
                header('Location: ' . BASEURL . '/account');
                exit;
                // var_dump($loginUser);

            }
        }
    }

    public function CreateSession($user)
    {
       
        $_SESSION['cashier_id'] = $user['cashier_id'];
        $_SESSION['cashier_name'] = $user['cashier_name'];
        $_SESSION['cashier_type'] = $user['cashier_type'];
        header('Location: ' . BASEURL . '/dashboard');
    }

    public function logout()
    {
       
        unset($_SESSION['cashier_id']);
        unset($_SESSION['cashier_name']);
        unset($_SESSION['cashier_type']);
        header('Location: ' . BASEURL . '/account');
       
        
    }
}

?>