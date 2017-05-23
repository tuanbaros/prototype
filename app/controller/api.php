<?php
/**
* auth controller
*/
require_once 'app/controller/controller.php';

class Api extends Controller
{
    public function login()
    {
        $name = $_POST['name'];
        $openid = $_POST['open_id'];
        $token = $_POST['token'];

        $user = $this->model('user');
        $user->set_name($name);
        $user->set_token($token);
        $user->set_open_id($openid);

        echo $user->loginWithOpenId();
    }

    public function upload()
    {
        $openid = $_POST['open_id'];
        $token = $_POST['token'];
        $user = $this->model('user');
        $user->set_open_id($openid);
        $user->set_token($token);
        $id = $user->find();
        if ($id > 0) {
            $project = json_decode($_POST['project']);
            $p = $this->model('project');
            $p->set_entry_id($project->mEntryId);
            $p->set_title($project->title);
            $p->set_description($project->description);
            $p->set_width($project->w);
            $p->set_height($project->h);
            $p->set_orientation($project->orientation);
            $p->set_poster($project->poster);
            $p->set_user_id($id);
            $result = $p->store();
            if (isset($project->mockups)) {
                $mocks = $project->mockups;
                for ($i=0; $i < count($mocks); $i++) { 
                    if (isset($project->mockups[$i]->elements)) {
                        $elements = $project->mockups[$i]->elements;
                        for ($j=0; $j < count($elements) ; $j++) { 
                            $element = $this->model('element');
                            $element->set_x($elements[$j]->x);
                            $element->set_y($elements[$j]->y);
                            $element->set_w($elements[$j]->w);
                            $element->set_h($elements[$j]->h);
                            $element->set_link_to($elements[$j]->link_to);
                            $element->set_transition($elements[$j]->transition);
                            $element->set_gesture($elements[$j]->gesture);
                            $element->set_mock_id($elements[$j]->mMockId);
                            $element->set_entry_id($elements[$j]->mEntryId);
                            $result = $element->store();
                        }
                    }

                    $mock = $this->model('mock');
                    $mock->set_title($mocks[$i]->title);
                    $mock->set_entry_id($mocks[$i]->client_id);
                    $mock->set_note($mocks[$i]->notes);
                    $mock->set_image($mocks[$i]->image);
                    $mock->set_position($mocks[$i]->mPosition);
                    $mock->set_project_id($mocks[$i]->mProjectId);
                    $result = $mock->store();
                }
            }
            echo $result;
        } else {
            echo "error";
        }
    }

    public function projects($offset)
    {
        $result = $this->model('project')->getAll($offset);
        $array = array();
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            for ($i=0; $i < $result->rowCount(); $i++) { 
                $project = new stdClass;
                $r = $data[$i];
                $project->title = $r['title'];
                $project->description = $r['description'];
                $project->w = $r['width'];
                $project->h = $r['height'];
                $project->orientation = $r['orientation'];
                $project->poster = $r['poster'];
                $project->mEntryId = $r['entry_id'];
                $project->author = $this->model('user')->findName($r['user_id']);
                $array[$i] = $project; 
            }
        }
        echo json_encode($array);
    }

    private function showResponse($resonse)
    {
        echo "<pre>";
        print_r($resonse);
        echo "</pre>";
        // die();
    }
}
