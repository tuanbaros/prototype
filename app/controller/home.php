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
        $user->set_name('tuan');
        $this->view('home', ['user' => $user]);
    }
}
