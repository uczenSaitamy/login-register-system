<?php

return [
    "/" => ["HomeController@index", "home"],
    "/login" => ["AuthController@login", "login"],
    "/register" => ["AuthController@register", "register"]
];
