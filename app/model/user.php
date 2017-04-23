<?php
/**
* 
*/
require_once 'app/model/model.php';

class User extends Model
{
    private $id;

    private $name;

    private $email;

    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->table('users');
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function register()
    {
        $columns = 'name, email, password';
        $values = "'$this->name','$this->email', '$this->password'";
        $id = $this->repository->insert($columns, $values);
        return $id;
    }

    public function login()
    {
        $whereClause = "email='$this->email' and password='$this->password'";
        $result = $this->repository->findByWhere($whereClause);
        $arr = $result->fetchAll();
        if (count($arr) > 0) {
            $token = $this->get_token($arr[0]['id'], $arr[0]['email']);
            $set = "token='{$token}'";
            $id = $arr[0]['id'];
            $whereClause = "id='{$id}'";
            $success = $this->repository->update($set, $whereClause);
            var_dump($success);
            if ($success > 0) {
                $arr[0]['token'] = $token;
                return $arr[0];
            }
        }
        return []; 
    }

    private function get_token($id, $email) {
        $random = $this->random_string(30);
        $time = time();
        return md5($id . $email . $time) . $random;
    }

    private function random_string($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function clear_token($token) {
        $set = "token=''";
        $whereClause = "token='{$token}'";            
        $success = $this->repository->update($set, $whereClause);
    }
}
