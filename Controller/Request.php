<?php

namespace Controller;

use Core\AbstractController;
use Helper\Url;
use Model\Answer;
use Model\Category;
use Model\Request as RequestModel;

class Request extends AbstractController
{
    public function all()
    {
        if (isset($_GET['categoryId']) && !empty($_GET['categoryId'])) {
            $this->data['requests'] = RequestModel::getAll($_GET['categoryId']);
        } else {
            $this->data['requests'] = RequestModel::getAll();
        }
        $this->data['categories'] = Category::getAll();

        $this->render('all');
    }

    public function add()
    {
        $this->data['categories'] = Category::getAll();
//        print_r($this->data['categories']);
//        die();

        $this->render('add');
    }

    public function create()
    {
        $request = new RequestModel();
        $request->setName($_POST['name']);
        $request->setSurname($_POST['surname']);
        $request->setCategoryId($_POST['categoryId']);
        $request->setEmail($_POST['email']);
        $request->setSeen(0);
        $request->setAnswered(0);

        if (isset($_POST['phone']) && !empty($_POST['phone'])) {
            $request->setPhone($_POST['phone']);
        } else {
            $request->setPhone(null);
        }

        $request->setSubject($_POST['subject']);
        $request->setMessage($_POST['message']);
        $request->save();

        Url::redirect('request/all');
    }

    public function show($id)
    {
        $this->data['request'] = new RequestModel($id);
        $this->data['answers'] = Answer::getAll($id);
        $this->data['request']->setSeen(1);
        $this->data['request']->save();

        $this->render('show');
    }

    public function delete($id)
    {
        $request = new RequestModel($id);
        $request->delete();

        Url::redirect('request/all');
    }

    public function answer()
    {
        $requestId = $_POST['requestId'];

        $request = new RequestModel($requestId);
        $request->setAnswered(1);
        $request->save();

        $answer = new Answer();
        $answer->setName($_POST['name']);
        $answer->setSurname($_POST['surname']);
        $answer->setRequestId($requestId);
        $answer->setMessage($_POST['message']);
        $answer->save();

        Url::redirect('request/show/' . $requestId);
    }
}