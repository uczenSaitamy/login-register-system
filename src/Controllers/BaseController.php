<?php

namespace App\Controllers;

class BaseController
{
    public function error404()
    {
        $error['code'] = '404';
        $error['message'] = 'Page not found.';
        $this->render('error', ['error' => $error]);
    }

    public function render(string $view, array $vars = [])
    {
        // echo ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view . '.php';exit;
        extract($vars);
        ob_start();
        require(ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR  . 'index.php');
        $content = ob_get_clean();
        echo $content;
    }
}
