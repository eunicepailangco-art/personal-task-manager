<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create($validated);

        $tasks = Task::latest()->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'success' => 'Task added successfully!',
        ]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        $tasks = Task::latest()->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'success' => 'Task updated successfully!',
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        $tasks = Task::latest()->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'success' => 'Task deleted successfully!',
        ]);
    }
}