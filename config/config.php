<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:31
 */

$host = 'localhost';
$user = 'damian';
$password = '123qwe';
$database = 'sign-up-in';

//$con = new mysqli($host, $user, $password, $database);
//
//if ($con->connect_errno) {
//    echo "Error: " . $con->connect_error();
//    exit();
//}

try
{
    $con = new PDO("mysql:host=$host;dbname=$database", $user, $password);

}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
