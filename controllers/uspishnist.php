<?php
class UspishnistController
{
    public $model;

    public function __construct()
    {
        $this->model = new UspishnistModel;
    }

    public function redirect($url)
    {
        if ($url)
            header('Location: ' . $url);
    }

    public function index()
    {
        $uspishnist = $this->model->getItems();
        $students = $this->model->getStudents();
        $subjects = $this->model->getSubjects();
        include 'views/uspishnist.php';
    }

    public function add()
    {
        //die(var_dump($_POST));
        if ($_POST) {

            $this->model->add();
        }
        $this->redirect("/pr7/index.php/uspishnist");
    }

    public function actions()
    {
        if ($_POST['delete'])
            $this->model->delete();
        if ($_POST['update'])
            $this->model->update();
        $this->redirect("/pr7/index.php/uspishnist");
    }
}
?>