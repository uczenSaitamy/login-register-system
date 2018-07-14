<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 14.07.18
 * Time: 11:49
 */

if (isset($_SESSION['message-password'])) { ?>
    <small id="messages" class="form-text text-danger">
        <?php echo $_SESSION['message-password'] ?>
    </small>
    <?php unset($_SESSION['message-password']);
}




