<?php

$host = 'localhost';
$user = 'damian';
$password = '123qwe';
$database = 'sign-up-in';

try {
    $con = new PDO("mysql:host=$host;dbname=$database", $user, $password);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
