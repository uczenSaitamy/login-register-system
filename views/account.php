<div class="row text-center">
    <div class="col-lg">
        <p class="display-4">Welcome <span class="text-success"><?=$user->getEmail()?></span> on account page.</p>
    </div>
</div>
<div class="row text-center">
<div class="col-lg">
<a href="<?= url('logout')?>" class="btn btn-success btn-lg text-uppercase">logout</a>
</div>
</div>