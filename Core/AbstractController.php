<?php

namespace Core;

use Helper\Url;

class AbstractController
{
    protected $data;

    public function __construct()
    {
        $this->data = [];
        $this->data['title'] = 'Exam';
        $this->data['meta_description'] = 'Exam';
    }

    protected function render($template)
    {
        include_once PROJECT_ROOT . '\design\parts\header.php';
        include_once PROJECT_ROOT . '\design\\' . $template . '.php';
        include_once PROJECT_ROOT . '\design\parts\footer.php';
    }

    public function link($path, $param = null)
    {
        return Url::link($path, $param);
    }
}