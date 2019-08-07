<?php

namespace App\Controllers;

use Validator\Validator;
use App\Models\User;
use Request\Request;
use App\Repository\UserRepository;

class AuthController extends BaseController
{
    public function __construct(Request $request)
    {
        $this->repository = UserRepository::class;
        parent::__construct($request);
    }

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
                'email' => 'email|min:6|required|unique:USERS,email',
                'password' => 'min:6|required',
                'repeatPassword' => 'same:password|required',
                'rules' => 'required',
            ]
        );

        if ($validator->isError()) {
            return $this->render('register', ['errors' => $validator->getErrors()]);
        }

        $user = new User($this->request->post);

        if ($this->getRepository()->save($user)) {
            return $this->render('home', ['msg' => 'Registration has been successful']);
        }

        return $this->render('register', ['msg' => 'Registration has been failed']);
    }
}
