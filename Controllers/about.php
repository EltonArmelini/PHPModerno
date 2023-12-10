<?php 

$user = User::findBy(['email' => 'test@test.com']);
var_dump(password_verify("1234",$user[0]->password));
die;
require 'Views/about.view.php';