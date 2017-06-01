<?php
/**
* home controller
*/
require_once 'app/controller/controller.php';

class Demo extends Controller
{
    public function project($entry_id)
    {   
        if (isset($entry_id)) {
        	$project = $this->model('project');
        	$p = $project->find($entry_id);
            $user = $this->model('user')->findName($p['user_id']);
            if ($user == null) {
                $p['author'] = '';
            } else {
                $p['author'] = $user['name'];
            }
        	if ($p == 'error') {
        		echo $p;
        		return;
        	}
            $result = $this->model('mock')->getAll($entry_id);
            $mocks = array();
            if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) { 
                    $mock = new stdClass;
                    $r = $result[$i];
                    $elements = array();
                    $e_result = $this->model('element')->getAll($r['entry_id']);
                    if (count($e_result) > 0) {
                        for ($j = 0; $j < count($e_result); $j++) { 
                            $element = new stdClass;
                            $e_r = $e_result[$j];
                            $element->gesture = $e_r['gesture'];
                            $element->link_to = $e_r['link_to'];
                            $element->transition = $e_r['transition'];
                            $element->x = $e_r['x'];
                            $element->y = $e_r['y'];
                            $element->w = $e_r['width'];
                            $element->h = $e_r['height'];
                            $elements[$j] = $element;
                        }
                    }
                    $mock->elements = $elements;  
                    $mock->client_id = $r['entry_id'];
                    $mock->image = $r['image'];
                    $mock->notes = $r['note'];
                    $mock->title = $r['title'];
                    $mock->mPosition = $r['position'];
                    $mocks[$i] = $mock;
                }
            }

       

            $this->view('project', array('mocks' => $mocks, 'project' => $p));
            // echo json_encode($mocks);
        } else {
            echo json_encode(array());
        }
    }
}
