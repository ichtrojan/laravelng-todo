<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get(['id', 'completed', 'title']);
        return view('home', compact('tasks'));
    }

    public function create (Request $request) {
      $task = new Task;
      $task->title = $request->title;
      $task->completed = 0;
      $task->save();

      return redirect('/');
    }

    public function completed ($id) {
      $task = Task::find($id);
      $task->completed = 1;
      $task->save();

      return redirect('/');
    }

    public function delete ($id) {
      $task = Task::find($id);
      $task->delete();

      return redirect('/');
    }
}
