<?php


$task = Task::find($_POST['id']);
$task->delete();

App::get('database')[0]->delete('task',$_POST['id']);

header('Location: /');


