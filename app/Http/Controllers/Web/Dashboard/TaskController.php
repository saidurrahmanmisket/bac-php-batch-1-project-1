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

    public function create()
    {
        return view('frontend.add-todo');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'task_name' => "required|string|max:100",
        ]);

        $task = Task::create([
            'task_name'  => $request->task_name,
            'ip_address' => "216354",
        ]);

        flash()->success('Task created successfully!');

        return redirect()->route('home');
    }

    public function toggle($id)
    {

        $task = Task::find($id);
        if (! $task) {
            abort(200, "Task not found");
        }
        if ($task->status == "pending") {
            $task->update([
                'status' => "complete",
            ]);
        } else {
            $task->update([
                'status' => "pending",
            ]);
        }
        $task->save();
        flash()->success('Task update successfully!');

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (! $task) {
            dd("Task not found");
        }
        $task->delete();

         flash()->warning('Task deleted successfully!');
        return redirect()->route('home');
    }

}
