<?php 

namespace App\Controllers;
use App\Models\Task;
use Core\App;

class TasksController
{

    public function create(){
        Task::create([
            'title'=> $_POST['title'],
            'color'=> $_POST['color'], 
            'completed'=> 0 
        ]);
        
        return redirect('/');
        
    } 

    public function delete($taskId){
        $task = Task::find($taskId);
        $task->delete();

        App::get('database')[0]->delete('task',$_POST['id']);
        return redirect('/');
        
    }

    public function toggle($taskId){
        if($_POST['completed']){
            $_POST['completed'] = false;
        }else{
            $_POST['completed'] = true;
        }
        
        $task = Task::find($taskId);
        $task->update(['completed'=> $_POST['completed']]);
        
        App::get('database')[0]->update('task',$taskId,[
            'completed'=> $_POST['completed']
        ]);
        
        return redirect('/');
        
    }

}