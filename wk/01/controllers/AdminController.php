<?php
class AdminController extends Cola_Controller
{
    public function adminAction()
    {
        $model = $this->model('Data');
        $data = $model->find();
        $this->view->data = $data;
        $this->response->charset();
        $this->display();
    }

    public function ajaxAction() {
        $id = mysql_escape_string($this->get('id'));
        $type = mysql_escape_string($this->get('type'));
        $data = mysql_escape_string($this->get('data'));
        $model = $this->model('Data');
        $model->update($id, array($type => $data));
        echo 1;
    }

    public function delAction() {
        $id = mysql_escape_string($this->get('id'));
        $model = $this->model('Data');
        $model->delete($id);
        header('Location: admin.php');
    }
}
