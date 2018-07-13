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
                you are on secure page
            </div>
        </div>
    </div>
    <div class="row mt-3 mx-auto">
        <div class="col">
            <p class="lead">u can visit another secured page by clicking this button -></p>
        </div>
        <div class="col">
            <a href="/another.php" class="btn btn-primary float-left">another</a>
        </div>
    </div>
<?php
require_once('layout/footer.html');