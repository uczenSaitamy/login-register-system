<div class="row">
    <div class="col-lg">
        <?php if ($page === 'home') { ?>
            <h1 class="display-3 mt-3">
                <a href="<?php echo url($page) ?>" class="text-decoration-none text-light"><?php echo $page ?></a>
            </h1>
        <?php } else { ?>
            <h1 class="display-4 mt-3">
                <a href="<?php echo url('home') ?>" class="text-decoration-none text-light">home</a>
                -
                <span class="display-3 mt-3">
                    <a href="<?php echo url($page) ?>" class="text-decoration-none text-light"><?php echo $page ?></a>
            </h1>
        <?php } ?>
    </div>
</div>