<?php 

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\PagesController;
use App\Controllers\TasksController;
use Pecee\SimpleRouter\SimpleRouter;



SimpleRouter::get('/', [HomeController::class,'show']);
SimpleRouter::get('about', [PagesController::class,'about']);
SimpleRouter::get('contact', [PagesController::class,'contact']);
SimpleRouter::get('services', [PagesController::class,'services']);
SimpleRouter::post('tasks/create', [TasksController::class, 'create'],);
SimpleRouter::post('tasks/edit/{id}', [TasksController::class, 'toggle']);
SimpleRouter::post('tasks/delete/{id}', [TasksController::class, 'delete']);
SimpleRouter::get('login', [LoginController::class,'show']);
SimpleRouter::post('login', [LoginController::class,'login']);
SimpleRouter::post('logout', [LoginController::class,'logout']);

SimpleRouter::start();