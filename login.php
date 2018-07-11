<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 19:32
 */
require('config/config.php');
require('config/session.php');


if (isset($_POST['login'])) {
    $email = $_POST['Email'];
//    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $password = $_POST['Password'];
    $sql = "SELECT email, password from USERS where email = '" . $email . "'";

    $query = mysqli_query($con, $sql);
    if ($query->num_rows > 0) {
        $row = mysqli_fetch_row($query);
        if (password_verify($password, $row[1])) {
            $_SESSION['logged'] = true;
            header('Location: home.php');
        } else header('Location: signin.php');
    } else header('Location: signin.php');
} else header('Location: signin.php');