<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:36
 */
require('../config/config.php');
require('../config/unsecured_session.php');
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

            if(!$auth->checkEmailLength()){
                $_SESSION['message-email'] = 'Email is too short( min 8) or too long(max 100)';
                header('Location: ../signup.php');
                exit();
            }

            if(!$auth->checkPasswordLength()){
                $_SESSION['message-password'] = 'Password is too short( min 6) or too long(max 100)';
                header('Location: ../signup.php');
                exit();
            }

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
            $_SESSION['message-password'] = 'Passwords are different';
            header('Location: ../signup.php');
            exit();
        }
    } else {
        $_SESSION['message-email'] = 'Email assigned to another account';
        header('Location: ../signup.php');
        exit();
    }
}