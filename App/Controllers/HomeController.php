<?php 
namespace App\Controllers;
use App\Models\Task;
class HomeController 
{

    public function show()
    {

        $tasks = Task::all();
        // $tasksPending = Task::where('completed',false)->get();
        // ejemplo de como hacer una consulta
        return view("index",['tasks'=>$tasks]);
        

    }


}