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

    public function findByWhere($whereClause)
    {
        $sql = "select * from {$this->table} where {$whereClause}";
        return $this->db->query($sql);
    }

    public function insert($columns, $values)
    {
        $sql = "insert into {$this->table} ({$columns}) values ({$values}) on duplicate key update open_id=open_id";
        var_dump($sql);
        // $this->db->query($sql);
        die();
        return $this->db->lastInsertId();
    }

    public function insert_duplicate($columns, $values, $duplicate, $valuesUpdate)
    {
        $sql = "insert into {$this->table} ({$columns}) values ({$values}) on duplicate key update {$duplicate}={$valuesUpdate}";
        $result = $this->db->query($sql);
        return $result->rowCount();
    }

    public function update($set, $whereClause)
    {
        $sql = "update {$this->table} set {$set} where {$whereClause}";
        $result = $this->db->query($sql);
        return $result->rowCount();
    }

    public function delete($whereClause)
    {
        $sql = "delete from {$this->table} where {$whereClause}";
        $result = $this->db->query($sql);
        return $result->rowCount();
    }

    public function count($whereClause) {
        $sql = "select count(*) from {$this->table}";
        if (isset($whereClause)) {
            $sql = $sql . " where {$whereClause}";
        }
        $req = $this->db->query($sql);
        return $req->fetchColumn();
    }

    public function __sleep()
    {
        return $this->db;
    }
    
    public function __wakeup()
    {
        $this->__construct();
    }
}
