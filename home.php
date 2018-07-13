<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 19:30
 */
session_start();

if (!(isset($_SESSION['logged'])) && !($_SESSION['logged'] == true)) {
    header('Location: index.php');
    exit();
}

require_once('layout/header.php');
?>
    <div class="row mt-5 mx-auto">
        <div class="col">
            <div class="display-4">
                Hello inside
            </div>
        </div>
        <?php require('layout/logout.html') ?>
    </div>
    <div class="row mt-5 mx-auto">
        <div class="col">
            <div class="display-4">
                check another site -->
            </div>
            <a href="/another.php" class="btn btn-primary">another</a>
        </div>

    </div>
<?php
require_once('layout/footer.html');