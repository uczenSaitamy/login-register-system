<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 13.07.18
 * Time: 15:16
 */

if (isset($_SESSION['message'])) { ?>
    <div class="row mt-5 ">
        <div class="col alert alert-danger text-center">
            <div class="h3 font-weight-light"> <?php echo $_SESSION['message'] ?></div>
        </div>
    </div>
    <?php unset($_SESSION['message']);
}