<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:05
 */

require_once('views/header.html');
require('config/session.php');
?>
    <div class="container">
        <div class="row mt-5 mx-auto">
            <div class="col-lg-3">
                <a href="/index.php" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="row mt-5 mx-auto">
            <div class="col">
                <div class="display-4">
                    Sing up
                </div>
                <form method="post" action="/register.php">
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp"
                               placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="Password1">Password</label>
                        <input type="password" class="form-control" id="Password1" name="Password1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="Password2">Password</label>
                        <input type="password" class="form-control" id="Password2" name="Password2" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name">
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
require_once('views/footer.html');