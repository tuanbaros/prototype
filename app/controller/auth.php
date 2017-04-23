<?php
/**
* auth controller
*/
require_once 'app/controller/controller.php';

class Auth extends Controller
{
    public function index()
    {   
        if (isset($_SESSION['token'])) {
            Route::redirect('home');
            die();
        }
        $this->view('auth');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->model('user');
        $user->set_name($name);
        $user->set_email($email);
        $user->set_password($password);

        $id = $user->register();
        if ($id < 1) {
            $_SESSION['error'] = 'error';
        }
        $_SESSION['email'] = $user->get_email();
        $_SESSION['name'] = $user->get_name();
        Route::redirect('auth');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->model('user');
        $user->set_email($email);
        $user->set_password($password);

        $result = $user->login();
        if (count($result) > 0)  {
            $_SESSION['name'] = $result['name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['token'] = $result['token'];
            Route::redirect('home');
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['login'] = 'error';
            Route::redirect('auth');
        }
    }

    public function logout()
    {
        $user = $this->model('user');
        $user->clear_token($_SESSION['token']);
        session_destroy();
        Route::redirect('auth');
    }
}
