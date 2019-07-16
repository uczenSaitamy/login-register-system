<?php

return [
    "home" => ["HomeController@index", "/"],
    "login" => ["AuthController@login", "/login"],
    "authorize" => ["AuthController@authorize", "/login", "POST"],
    "register" => ["AuthController@register", "/register"]
];
