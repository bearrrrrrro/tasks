<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function create(Request $request) {
        $data = $request->validate([
            'title'=>'required|max:255',
            'description'=>'max:1023',
        ]);
        $task = tap(new Task($data))->save();
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
