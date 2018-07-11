<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:10
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
                    Sing in
                </div>
                <form method="post" action="/login.php">
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp"
                               placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
require_once('views/footer.html');