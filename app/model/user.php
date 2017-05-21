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

    private $open_id;

    private $token;

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

    public function get_id()
    {
        return $this->id;
    }

    public function register()
    {
        $columns = 'name, email, password';
        $values = "'$this->name','$this->email', '$this->password'";
        $id = $this->repository->insert($columns, $values);
        return $id;
    }

    public function set_open_id($open_id)
    {
        $this->open_id = $open_id;
    }

    public function get_open_id()
    {
        return $this->open_id;
    }

    public function set_token($token)
    {
        $this->token = $token;
    }

    public function get_token()
    {
        return $this->token;
    }

    public function login()
    {
        $whereClause = "email='$this->email' and password='$this->password'";
        $result = $this->repository->findByWhere($whereClause);
        $arr = $result->fetchAll();
        if (count($arr) > 0) {
            $token = $this->create_token($arr[0]['id'], $arr[0]['email']);
            $set = "token='{$token}'";
            $id = $arr[0]['id'];
            $whereClause = "id='{$id}'";
            $success = $this->repository->update($set, $whereClause);
            if ($success > 0) {
                $arr[0]['token'] = $token;
                return $arr[0];
            }
        }
        return []; 
    }

    private function create_token($id, $email) {
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

    public function loginWithOpenId()
    {
        $columns = 'name, open_id, token';
        $values = "'$this->name', '$this->open_id', '$this->token'";
        $duplicate = 'token';
        $valuesUpdate = "'$this->token'";
        $id = $this->repository->insert_duplicate($columns, $values, $duplicate, $valuesUpdate);
        if ($id < 1) {
            return "error";
        } else {
            return "success";
        }
    }

    public function find()
    {
        $whereClause = "open_id='{$this->open_id}' and token='{$this->token}'";
        $result = $this->repository->findByWhere($whereClause);
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            $this->set_id($data[0]['id']);
            return $this->get_id();
        }
        return 0;
    }

    public function findName($id)
    {
        $result = $this->repository->find($id);
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            return $data[0]['name'];
        }
        return '';
    }
}
