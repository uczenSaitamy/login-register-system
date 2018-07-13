<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 13.07.18
 * Time: 19:00
 */

session_start();

if (!(isset($_SESSION['logged'])) && !($_SESSION['logged'] == true)) {
    header('Location: index.php');
    exit();
}