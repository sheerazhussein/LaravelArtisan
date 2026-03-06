<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // index: Show all tasks
    public function index() 
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // store: Save new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($validated);

        return redirect()->back()->with('success', 'Task created successfully!');
    }
}
