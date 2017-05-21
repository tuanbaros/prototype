<?php

require_once 'app/model/model.php';

/**
* 
*/
class Element extends Model
{
    private $id;

    private $x;

    private $y;

    private $w;

    private $h;

    private $link_to;

    private $transition;

    private $gesture;

    private $mock_id;

    private $entry_id;

    public function __construct()
    {
        parent::__construct();
        $this->table('elements');
    }

    public function set_x($x)
    {
        $this->x = $x;
    }

    public function get_x()
    {
        return $this->x;
    }

    public function set_y($y)
    {
        $this->y = $y;
    }

    public function get_y()
    {
        return $this->y;
    }

    public function set_w($w)
    {
        $this->w = $w;
    }

    public function get_w()
    {
        return $this->w;
    }

    public function set_h($h)
    {
        $this->h = $h;
    }

    public function get_h()
    {
        return $this->h;
    }

    public function set_transition($transition)
    {
        $this->transition = $transition;
    }

    public function get_transition()
    {
        return $this->transition;
    }

    public function set_link_to($link_to)
    {
        $this->link_to = $link_to;
    }

    public function get_link_to()
    {
        return $this->link_to;
    }

    public function set_gesture($gesture)
    {
        $this->gesture = $gesture;
    }

    public function get_gesture()
    {
        return $this->gesture;
    }

    public function set_mock_id($mock_id)
    {
        $this->mock_id = $mock_id;
    }

    public function get_mock_id()
    {
        return $this->mock_id;
    }

    public function set_entry_id($entry_id)
    {
        $this->entry_id = $entry_id;
    }

    public function get_entry_id()
    {
        return $this->entry_id;
    }

    public function store()
    {
        $columns = 'x, y, width, height, transition, gesture, link_to, mock_id, entry_id';
        $values = "'$this->x', '$this->y', '$this->w', '$this->h', '$this->transition', '$this->gesture', '$this->link_to', '$this->mock_id', '$this->entry_id'";
        $id = $this->repository->insert($columns, $values);
        if ($id < 1) {
            $set = "x='$this->x', y='$this->y', width='$this->w', height='$this->h', transition='$this->transition', gesture='$this->gesture', link_to='$this->link_to', mock_id='$this->mock_id'";
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
}
