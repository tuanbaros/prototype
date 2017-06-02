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

    public function all($column, $offset)
    {
        $sql = "select {$column} from {$this->table} order by id desc limit 10 offset {$offset}";
        return $this->db->query($sql);
    }

    public function find($id)
    {
        $sql = "select id, name, open_id from {$this->table} where id={$id}";
        return $this->db->query($sql);
    }

    public function findByWhere($whereClause)
    {
        $sql = "select * from {$this->table} where {$whereClause}";
        return $this->db->query($sql);
    }

    public function findLimit($whereClause, $offset)
    {
        $sql = "select * from {$this->table} where {$whereClause} order by id desc limit 10 offset {$offset}";
        return $this->db->query($sql);
    }

    public function insert($columns, $values)
    {
        $sql = "insert ignore into {$this->table} ({$columns}) values ({$values})";
        $this->db->query($sql);
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
