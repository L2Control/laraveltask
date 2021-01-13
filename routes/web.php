<?php

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


// Get register
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//Store register user
Route::post('/register', [RegisterController::class, 'store']);

// Get user
Route::get('/login', [LoginController::class, 'index'])->name('login');

//Store signed in user
Route::post('/login', [LoginController::class, 'store']);

//Logout user
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

/**
 * Display All Tasks
 */
Route::get('/', function () {
    $tasks = Task::where("users_id", Auth::id())->orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->deadline = $request->deadline;
    $task->users_id = Auth::id();
    $task->save();

    return redirect('/');
});

/**
 * Edit Task
 */
// Route::post('/edit/{id}', function(Request $request){

// });

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});
