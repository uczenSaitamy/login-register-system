<?php

namespace App\Controllers;

use Validator\Validator;

class AuthController extends BaseController
{
    public function login()
    {
        return $this->render('login');
    }

    public function authorize()
    {
        var_dump('test');
    }

    public function register()
    {
        return $this->render('register');
    }

    public function store()
    {
        $validator = new Validator;

        $validator->validate(
            $this->request->post,
            [
                'email' => 'email|min:6',
                'password' => 'min:6|required',
                'repeatPassword' => 'same:password|required',
                'rules' => 'required',
            ]
        );

        if ($validator->isError()) {
            return $this->render('register', ['errors' => $validator->getErrors(), 'old' => $this->request->post]);
        }

        echo "data validated";
    }
}
