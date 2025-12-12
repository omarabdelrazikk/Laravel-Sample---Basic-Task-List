<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Ramsey\Collection\Collection;


Route::get(
  "/",
  function () {
    return redirect()->route("tasks.index");
  }
);

Route::view("/tasks/create", "create")->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view("edit", ["task" => $task]);
})->name("tasks.edit");

Route::put(
  '/tasks/{task}',
  function (Task $task, TaskRequest $request) {
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task->update($request->validated());
    return redirect()->route("tasks.show", ['task' => $task->id])->with('success', "Task $task->id Edited Successfully");
  }
)->name('tasks.update');

Route::get('/tasks/{task}', function (Task $task) {
  return view("show", ["task" => $task]);
})->name("tasks.show");


Route::get('/tasks', function () {
  return view("index", ["tasks" => Task::latest()->paginate(5)]);
})->name("tasks.index");


Route::delete(
  '/tasks/{task}',
  function (Task $task) {
    $task->deleteOrFail();
    return redirect()->route('tasks.index')->with('success', "Task $task->id Deleted Successfully");
  }
)->name('tasks.delete');

Route::post(
  "/tasks",
  function (TaskRequest $request) {
    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->completed = false;
    // $task->save();
    $task = Task::create([
      ...$request->validated(),
      'completed' => false,
    ]);
    return redirect()->route("tasks.show", ['task' => $task->id])->with('success', 'Task Created Successfully');
  }
)->name('tasks.store');

Route::put(
  '/tasks/{task}/toggle-complete',
  function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with('task updated successfully');
  }
)->name('tasks.toggle-complete');

Route::fallback(
  function () {
    return redirect()->Route("tasks.index");
  }
);


/*
Route::get(
    "/hello",
    function () {
        return "hello";
    }
)->name("hello");

Route::get(
    '/greet/{name}',
    function ($name) {
        return "Hello " . $name . '!';
    }
);

Route::get(
    '/hallo',
    function () {
        return redirect()->route("hello");
    }
);
*/