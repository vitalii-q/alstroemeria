<?php

namespace app\Controllers;

use app\Engine\Foundation\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $this->view->render('blog/blog');
    }

    public function article($article)
    {
        echo (string)$article;
    }
}