<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:10
 */
require_once('layout/header.php');
require('config/unsecured_session.php');
require('layout/messages.php');
require('layout/goToIndex.html');
?>

    <div class="row mt-5 mx-auto">
        <div class="col">
            <div class="display-4">
                Sing in
            </div>
            <form method="post" action="/controllers/login.php">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                           placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </form>
        </div>
    </div>
<?php
require_once('layout/footer.html');