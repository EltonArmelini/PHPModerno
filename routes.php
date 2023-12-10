<?php 

return [
    ''  =>  ['HomeController','show'],
    'about' =>  ['PagesController','about'],
    'contact'   =>  ['PagesController','contact'],
    'services'  =>  ['PagesController','services'],
    'tasks/create'  => ['TasksController', 'create'], 
    'tasks/edit'    => ['TasksController', 'toggle'],
    'tasks/delete'=> ['TasksController', 'delete'],
    'login-form'=> ['LoginController','show'],
    'login'=> ['LoginController','login'],
    'logout'=> ['LoginController','logout']
];
