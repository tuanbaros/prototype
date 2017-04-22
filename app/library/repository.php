<?php
/**
* repository class
*/
class Repository
{
    protected $db;

    protected $table;

    public function __construct()
    {
        require_once 'app/library/database.php';
        $this->db = Database::getInstance();
    }

    public function table($name)
    {
        $this->table = $name;
    }

    public function all($column = array('*'))
    {
        # code...
    }

    public function find($id)
    {
        # code...
    }

    public function insert($columns, $values)
    {
        # code ...
    }

    public function update($id)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }
}
