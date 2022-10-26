<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function show()
    {
        return view('index', ['data' => Task::all()]);
    }

    public function create(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return with(['success' => true, 'message' => 'Task saved successfully', 'data' => Task::all()]);
    }

    public function select(Request $request) {
        $id = $request->id;
        return view('show', ['data' => Task::find($id)]);
    }

    public function update(Request $request) {
        $task = Task::find($request->id);
        $task->name = $request->name;
        $task->save();
        return redirect('/')->with(['success' => true, 'message' => 'Task updated succcessfully']);;
    }

    public function delete(Request $request) {
        $id = $request->id;
        Task::destroy($id);
        return redirect('/');
    }
}
