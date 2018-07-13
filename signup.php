<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:05
 */

require_once('layout/header.php');
require('config/unsecured_session.php');
require('layout/messages.php');
require('layout/goToIndex.html');
?>

    <div class="row mt-5 mx-auto">
        <div class="col">
            <div class="display-4">
                Sign up
            </div>
            <form method="post" action="/controllers/register.php">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                           placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" minlength="6" required>
                </div>
                <div class="form-group">
                    <label for="password2">Password</label>
                    <input type="password" class="form-control" id="password2" name="password2"
                           placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Submit</button>
            </form>
        </div>
    </div>
<?php
require_once('layout/footer.html');