<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 20:38
 */

session_start();

if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true)) {
    header('Location: home.php');
    exit();
}