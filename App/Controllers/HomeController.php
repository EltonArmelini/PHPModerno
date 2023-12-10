<?php 
namespace App\Controllers;
use App\Models\Task;
class HomeController 
{

    public function show()
    {
        $tasks = Task::all();

        return view("index",['tasks'=>$tasks]);
        

    }


}