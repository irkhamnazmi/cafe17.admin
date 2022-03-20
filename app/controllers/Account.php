<?php 

class Account extends Controller{
    public function index(){
        // echo 'home/index';
      

        if(empty($_SESSION['cashier'])){

            $this->view('template/header_login');
            $this->view('account/index');
            $this->view('template/footer_login');
        } else{
           
            echo '<script type="text/javascript"> location.replace("'. BASEURL .'/dashboard")</script>';
        }   

      
    }

    public function getlogin()
    {
       
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'email' => trim($_POST['email']),
            'pass' => trim($_POST['pass']),
            'captcha' => trim($_POST['validation']),
            'emailError' => '',
            'passError' => '',
            'captchaError' => ''
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

        // validasi captcha
        if (empty($data['captcha'])) {
            $data['captchaError'] = "Captcha tidak sesuai";
            Flasher::setFlash($data['captchaError'], 'login', 'danger');
            header('Location: ' . BASEURL . '/account');
            exit;
        }
        

        // cek jika error karena kosong 
        if (empty($data['emailError']) && empty($data['passError']) && empty($data['captchaError'])) {
            $loginUser = $this->model('Cashier_model')->getLogin($_POST);
            // var_dump($data['id']);
            if ($loginUser) {
                $this->CreateSession($loginUser);
                // Flasher::setFlash($loginUser['email'], 'login', 'success'); 
               
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
       
        $_SESSION['cashier'] = [
            'id' => $user['cashier_id'],
            'name' => $user['cashier_name'],
            'category' => $user['cashier_category']

        ];
        
         header('Location: ' . BASEURL . '/dashboard');
         exit;
       
    }

    public function logout()
    {
     
        unset($_SESSION['cashier']);
        echo '<script type="text/javascript"> location.replace("'. BASEURL .'")</script>';
        exit;
       
        
    }
}

?>