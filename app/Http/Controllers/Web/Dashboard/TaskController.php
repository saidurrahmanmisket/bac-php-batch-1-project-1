<?php
namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();

        return view('frontend.todo', compact("tasks"));
    }

    public function create(){
        return view('frontend.add-todo');
    }

    function store(Request $request){

        $validate = $request->validate([
            'task_name' => "required|string|max:20"
        ]);


       $task = Task::create([
            'task_name' => $request->task_name,
            'ip_address' => "216354"
       ]);

       return redirect()->route('home');
    }

}
