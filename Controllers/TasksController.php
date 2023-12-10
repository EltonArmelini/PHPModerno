<?php 

class TasksController
{

    public function create(){
        Task::create([
            'title'=> $_POST['title'],
            'color'=> $_POST['color'], 
            'completed'=> 0 
        ]);
        
        
        
    } 

    public function delete(){
        $task = Task::find($_POST['id']);
        $task->delete();

        App::get('database')[0]->delete('task',$_POST['id']);
        return redirect('/');
        
    }

    public function toggle(){
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
        
        return redirect('/');
        
    }

}