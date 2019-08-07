<?php

return [
    "home" => ["HomeController@index", "/"],
    "login" => ["AuthController@login", "/login"],
    "authorize" => ["AuthController@authorize", "/login", "POST"],
    "register" => ["AuthController@register", "/register"],
    "register.store" => ["AuthController@store", "/register", "POST"],
    "account" => ["AccountController@index", "/account"]
];
