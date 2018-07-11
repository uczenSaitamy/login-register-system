<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 11.07.18
 * Time: 18:10
 */
require_once('views/header.html');
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
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
require_once('views/footer.html');