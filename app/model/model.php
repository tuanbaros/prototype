<?php
/**
* 
*/
class Model
{
    protected $repository;

    public function __construct() {
        require_once 'app/library/repository.php';
        $this->repository = new Repository;
    }

    public function table($table)
    {
        $this->repository->table($table);
    }
}
