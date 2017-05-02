<?php
/**
* auth controller
*/
require_once 'app/controller/controller.php';

class Api extends Controller
{
    public function login()
    {
        $name = $_POST['name'];
        $openid = $_POST['open_id'];
        $token = $_POST['token'];

        $user = $this->model('user');
        $user->set_name($name);
        $user->set_token($token);
        $user->set_open_id($openid);

        echo $user->loginWithOpenId();
    }
}
