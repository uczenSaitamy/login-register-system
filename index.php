<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 17:52
 */
require_once('layout/header.php');
require('config/unsecured_session.php');

require('layout/hello.html');
?>

    <div class="row mt-5 mx-auto">
        <div class="col-lg-3">
            <a href="/signin.php" class="btn btn-primary">Sign in</a>
        </div>

        <div class="col-lg-3">
            <a href="/signup.php" class="btn btn-secondary">Sign up</a>
        </div>
    </div>
<?php

require_once('layout/footer.html');