<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
        
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'completed' => 'nullable|boolean'
        ]);

        $newTask = Task::create($data);

        return redirect(route('tasks.index'));

    }

    public function edit(Task $task){
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'completed' => 'nullable|boolean'
        ]);

        $task->update($data);

        return redirect(route('tasks.index'));

    }

    public function destroy(Task $task){
        $task->delete();
        return redirect(route('tasks.index'));
    }
}
