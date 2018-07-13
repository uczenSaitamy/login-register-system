<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 19:32
 */
require('../config/config.php');
require('../config/unsecured_session.php');
require('../class/user.php');


if (isset($_POST['login'])) {

    $auth = new user($con);
    $auth->email = $_POST['email'];
    $password = $_POST['password'];

    if ($auth->isUser()) {
        if (!$auth->setUser()) {
            $_SESSION['message'] = 'uncaught error';
            header('Location: ../signin.php');
            exit();
        }
        if ($auth->passwordVerify($password)) {
            $_SESSION['user'] = $auth->email;
            $_SESSION['logged'] = true;
            header('Location: ../home.php');
            exit();
        } else {
            $_SESSION['message'] = 'Incorect password';
            header('Location: ../signin.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'There is no such user with that email';
        header('Location: ../signin.php');
        exit();
    }
} else {
    header('Location: ../signin.php');
    exit();
}