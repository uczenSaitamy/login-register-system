<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:36
 */
require('config/config.php');
require('config/session.php');


if (isset($_POST['register'])) {
    $email = $_POST['Email'];
    $password1 = $_POST['Password1'];
    $password2 = $_POST['Password2'];
    $name = $_POST['Name'];
    $my_date = date("Y-m-d H:i:s");

    $sql = "SELECT email from USERS where email = '" . $email . "'";
    $query = mysqli_query($con, $sql);

    if ($query->num_rows == 0 && isset($email)) {
        if ($password1 == $password2) {
            $password = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `sign-up-in`.`USERS` (`email`, `password`, `created_at`) VALUES ('" . $email . "', '" . $password . "', '" . $my_date . "')";

            if ($query = mysqli_query($con, $sql)) {

                if (isset($name)){
                    $sql = "UPDATE `sign-up-in`.`USERS` SET `name`= '".$name."' WHERE `email`='".$email."'";
                    if ($query = mysqli_query($con, $sql)){

                        $_SESSION['logged'] = true;
                        header('Location: home.php');
                        exit();
                    }
                }
            } else header('Location: index.php');
        } else header('Location: index.php');
    } else header('Location: index.php');
}