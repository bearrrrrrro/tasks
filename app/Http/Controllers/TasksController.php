<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function get() {
        $tasks = Task::where('user_id', '=', Auth::id())->get();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request) {
        $data = $request->validate([
            'title'=>'required|max:255',
            'description'=>'max:1023',
        ]);
        $task = new Task($data);
        $task->user_id = Auth::id();
        $task->save();
        return redirect('tasks');
    }

    public function delete($id) {
        Task::find($id)->delete();
        return redirect('/tasks');
    }

    public function check($id) {
        $task = Task::find($id);
        $task->is_completed = !$task->is_completed;
        $task->save();
        return redirect('/tasks');
    }
}
