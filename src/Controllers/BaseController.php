<?php

namespace App\Controllers;

class BaseController
{
    public function error404()
    {
        echo "Page not found";
    }

    public function render(string $view, array $vars = [])
    {
        extract($vars);
        ob_start();
        require(dirname(dirname(__DIR__)) . '/views/' . $view . '.php');
        $content = ob_get_clean();
        echo $content;
    }
}
