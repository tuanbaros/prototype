<?php
/**
* 
*/
require_once 'app/model/model.php';

class User extends Model
{
    private $name;

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
}
