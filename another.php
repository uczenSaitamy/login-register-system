<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 19:30
 */

require('config/secured_session.php');
require_once('layout/header.php');
require_once('layout/navbar.php');
?>
    <div class="row mt-5 mx-auto">
        <div class="col">
            <div class="display-4">
                you are on another secure page
            </div>
        </div>
    </div>
    <div class="row mt-3 mx-auto">
        <div class="col">
            <p class="lead">u can't visit any other pages. But u can go back -></p>
        </div>
        <div class="col">
            <a href="/home.php" class="btn btn-primary float-left">back</a>
        </div>
    </div>
<?php
require_once('layout/tryToVisit.php');
require_once('layout/footer.html');