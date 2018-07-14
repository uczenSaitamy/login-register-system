<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 14.07.18
 * Time: 11:54
 */

if (isset($_SESSION['message-email'])) { ?>
    <small id="messages" class="form-text text-danger">
        <?php echo $_SESSION['message-email'] ?>
    </small>
    <?php unset($_SESSION['message-email']);
} else { ?>
    <small id="emailHelp" class="form-text text-muted text-danger">We'll never share your email with anyone
        else.
    </small> <?php
}