<?php

namespace App\Controllers;

use Validator\Validator;

class AuthController extends BaseController
{
    public function login()
    {
        $this->render('login');
    }

    public function authorize()
    {
        var_dump('test');
    }

    public function register()
    {
        $this->render('register');
    }

    public function store()
    {
        $validator = new Validator;

        $validator->validate(
            $this->request->post,
            [
                'email' => 'email|min:6',
                'password' => 'min:6',
                'repeatPassword' => 'same:password',
                'rules' => 'required',
            ]
        );

        if ($validator->isError()) {
            echo "there is error";
            exit;
        }

        echo "data validated";
    }
}
