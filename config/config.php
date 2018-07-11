<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:31
 */

$localhost = 'localhost';
$user = 'damian';
$password = '123qwe';
$database = 'sign-up-in';

$con = @mysqli_connect($localhost, $user, $password, $database);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
