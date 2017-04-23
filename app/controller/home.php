<?php
/**
* home controller
*/
require_once 'app/controller/controller.php';

class Home extends Controller
{
    public function index()
    {   
        $user = $this->model('user');
        if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
            $user->set_name($_SESSION['name']);
            $user->set_email($_SESSION['email']);
        }
        $this->view('home', ['user' => $user]);
    }
}
