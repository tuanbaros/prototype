<?php

require_once 'app/model/model.php';

/**
* 
*/
class Mock extends Model
{
    private $id;

    private $title;

    private $entry_id;

    private $note;

    private $image;

    private $position;

    private $project_id;

    public function __construct()
    {
        parent::__construct();
        $this->table('mocks');
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

    public function set_note($note)
    {
        $this->note = $note;
    }

    public function get_note()
    {
        return $this->note;
    }

    public function set_image($image)
    {
        $this->image = $image;
    }

    public function get_image()
    {
        return $this->image;
    }

    public function set_position($position)
    {
        $this->position = $position;
    }

    public function get_position()
    {
        return $this->position;
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
        $columns = 'title, entry_id, note, image, position, project_id';
        $values = "'$this->title', '$this->entry_id', '$this->note', '$this->image', '$this->position', '$this->project_id'";
        $id = $this->repository->insert($columns, $values);
        if ($id < 1) {
            $set = "title='$this->title', note='$this->note', image='$this->image', position='$this->position', project_id='$this->project_id'";
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

    public function getAll($entry_id)
    {
        $whereClause = "project_id='$entry_id' order by position asc";
        $result = $this->repository->findByWhere($whereClause);
        $arr = $result->fetchAll();
        return $arr;
    }
}
