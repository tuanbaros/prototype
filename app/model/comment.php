<?php

require_once 'app/model/model.php';

/**
* 
*/
class Comment extends Model
{
    private $id;

    private $content;

    private $user_id;

    private $project_id;

    public function __construct()
    {
        parent::__construct();
        $this->table('comments');
    }

    public function set_content($content)
    {
        $this->content = $content;
    }

    public function get_content()
    {
        return $this->content;
    }

    public function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }

    public function set_project_id($project_id)
    {
        $this->project_id = $project_id;
    }

    public function get_project_id()
    {
        return $this->project_id;
    }

    public function store()
    {
        $columns = 'content, user_id, project_id';
        $values = "'$this->content', '$this->user_id', '$this->project_id'";
        $id = $this->repository->insert($columns, $values);
        if ($id < 1) {
            return "error";
        } else {
            return "success";
        }
    }

    public function getNewComment($last_id)
    {
        $whereClause = "project_id='$this->project_id' and id > '$last_id'";
        $result = $this->repository->findByWhere($whereClause);
        return $result;
    }

    public function getAll($offset)
    {
        $whereClause = "project_id='$this->project_id'";
        $result = $this->repository->findLimit($whereClause, $offset);
        return $result;
    }
}
