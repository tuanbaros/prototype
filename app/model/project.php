<?php

require_once 'app/model/model.php';

/**
* 
*/
class Project extends Model
{
    private $id;

    private $title;

    private $entry_id;

    private $description;

    private $width;

    private $height;

    private $orientation;

    private $poster;

    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->table('projects');
    }

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function set_entry_id($entry_id)
    {
        $this->entry_id = $entry_id;
    }

    public function get_entry_id()
    {
        return $this->entry_id;
    }

    public function set_description($description)
    {
        $this->description = $description;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function set_width($width)
    {
        $this->width = $width;
    }

    public function get_width()
    {
        return $this->width;
    }

    public function set_height($height)
    {
        $this->height = $height;
    }

    public function get_height()
    {
        return $this->height;
    }

    public function set_orientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function get_orientation()
    {
        return $this->orientation;
    }

    public function set_poster($poster)
    {
        $this->poster = $poster;
    }

    public function get_poster()
    {
        return $this->poster;
    }

    public function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }

    public function store()
    {
        $columns = 'title, entry_id, description, width, height, orientation, poster, user_id';
        $values = "'$this->title', '$this->entry_id', '$this->description', '$this->width', '$this->height', '$this->orientation', '$this->poster', '$this->user_id'";
        $id = $this->repository->insert($columns, $values);
        if ($id < 1) {
            $set = "title='$this->title', description='$this->description', width='$this->width', height='$this->height', poster='$this->poster', user_id='$this->user_id'";
            $whereClause = "entry_id='$this->entry_id'";
            $success = $this->repository->update($set, $whereClause);
            if ($success > -1) {
                return "success";
            } else {
                return "error";
            }
        } else {
            return "success";
        }
    }

    public function getAll($offset)
    {
        $result = $this->repository->all('*', $offset);
        return $result;
    }

    public function find($entry_id)
    {
        $whereClause = "entry_id='$entry_id'";
        $result = $this->repository->findByWhere($whereClause);
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            return $data[0];
        }
        return 'error';
    }
}
