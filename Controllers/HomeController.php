<?php 


class HomeController 
{

    public function show()
    {
        $tasks = Task::all();

        return view("index",['tasks'=>$tasks]);
        

    }


}