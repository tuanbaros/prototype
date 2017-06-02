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
            for ($i = 0; $i < $result->rowCount(); $i++) { 
                $project = new stdClass;
                $r = $data[$i];
                $project->title = $r['title'];
                $project->description = $r['description'];
                $project->w = $r['width'];
                $project->h = $r['height'];
                $project->orientation = $r['orientation'];
                $project->poster = $r['poster'];
                $project->mEntryId = $r['entry_id'];
                $user = $this->model('user')->findName($r['user_id']);
                if ($user == null) {
                    $project->author = '';
                    $project->author_open_id = '';
                } else {
                    $project->author = $user['name'];
                    $project->author_open_id = $user['open_id'];
                }
                $project->num_comment = $this->model('comment')->count($project->mEntryId);
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
        die();
    }

    public function download()
    {
        if (isset($_POST['project_entry_id'])) {
            $entry_id = $_POST['project_entry_id'];
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

            echo json_encode($mocks);
        } else {
            echo json_encode(array());
        }
    }

    public function comments($project_entry_id, $offset)
    {
        $comment = $this->model('comment');
        $comment->set_project_id($project_entry_id);
        $result = $comment->getAll($offset);
        $array = array();
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            for ($i = 0; $i < $result->rowCount(); $i++) { 
                $c = new stdClass;
                $r = $data[$i];
                $c->id = $r['id'];
                $c->content = $r['content'];
                $user = $this->model('user')->findName($r['user_id']);
                if ($user == null) {
                    $c->user = '';
                    $c->user_open_id = '';
                } else {
                    $c->user = $user['name'];
                    $c->user_open_id = $user['open_id'];
                }
                $array[$i] = $c;
            }
        }
        echo json_encode($array);
    }

    public function comment()
    {
        $openid = $_POST['open_id'];
        $token = $_POST['token'];
        $user = $this->model('user');
        $user->set_open_id($openid);
        $user->set_token($token);
        $id = $user->find();
        if ($id > 0) {
            $comment = json_decode($_POST['comment']);
            $c = $this->model('comment');
            $c->set_user_id($id);
            $c->set_content($comment->content);
            $c->set_project_id($comment->project_id);
            $result1 = $c->store();
            if ($result1 == "error") {
                echo json_encode(array());
            } else {
                $last_id = 0;
                if (isset($_POST['last_id'])) {
                    $last_id = $_POST['last_id'];
                    $result = $c->getNewComment($last_id);
                    $array = array();
                    if ($result->rowCount() > 0) {
                        $data = $result->fetchAll();
                        for ($i = 0; $i < $result->rowCount(); $i++) { 
                            $c1 = new stdClass;
                            $r = $data[$i];
                            $c1->id = $r['id'];
                            $c1->content = $r['content'];
                            $user = $this->model('user')->findName($r['user_id']);
                            if ($user == null) {
                                $c1->user = '';
                                $c1->user_open_id = '';
                            } else {
                                $c1->user = $user['name'];
                                $c1->user_open_id = $user['open_id'];
                            }
                            $array[$i] = $c1;
                        }
                    }
                    echo json_encode($array);
                }
            }
        } else {
            echo json_encode(array());
        }
    }
}
