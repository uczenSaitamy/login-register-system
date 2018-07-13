<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 19:30
 */
session_start();

if (!(isset($_SESSION['logged'])) && !($_SESSION['logged']==true))
{
    header('Location: index.php');
    exit();
}
require ('config/session.php');
require_once('layout/header.php');
?>
    <div class="container">
        <div class="row mt-5 mx-auto">
            <div class="col">
                <div class="display-4">
                    Hello inside
                </div>
            </div>
            <div class="col">
                <a href="/controllers/logout.php" class="btn btn-outline-danger">Logout</a>
            </div>

        </div>
        <div class="row mt-5 mx-auto">
            <div class="col">
                <div class="display-4">
                    go back -->
                </div>
                <a href="/home.php" class="btn btn-primary">back</a>
            </div>

        </div>
    </div>
<?php
require_once('layout/footer.html');