<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:36
 */
require('../config/config.php');
require('../config/session.php');
require('../class/user.php');


if (isset($_POST['register'])) {

    $auth = new user($con);
    $auth->email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $auth->name = $_POST['name'];
    $auth->created_at = date("Y-m-d H:i:s");

    if (!$auth->isUser()) {
        if ($password1 == $password2) {
            $auth->password = $password1;

            if ($auth->create()) {
                $_SESSION['user'] = $auth->email;
                $_SESSION['logged'] = true;
                header('Location: ../home.php');
                exit();
            } else {
                $_SESSION['message'] = 'Unexpected error, please try again';
                header('Location: ../signup.php');
                exit();
            }
        } else {
            $_SESSION['message'] = 'passwords are different';
            header('Location: ../signup.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'email assigned to another account';
        header('Location: ../signup.php');
        exit();
    }
}