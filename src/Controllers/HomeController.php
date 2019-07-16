<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $page = 'home';
        $this->render('index', ['page' => $page]);
    }
}
