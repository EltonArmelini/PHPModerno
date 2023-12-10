<?php

Auth::tryLogin($_POST['email'], $_POST['password']);

if(Auth::check())
{
    return header("Location: /");
}

return header("Location: /login-form");