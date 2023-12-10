<?php


if($_POST['completed']){
    $_POST['completed'] = false;
}else{
    $_POST['completed'] = true;
}

$task = Task::find($_POST['id']);
$task->update(['completed'=> $_POST['completed']]);

App::get('database')[0]->update('task',$_POST['id'],[
    'completed'=> $_POST['completed']
]);

header('Location: /');



