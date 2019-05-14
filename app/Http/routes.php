<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

use Illuminate\Http\Request;
use App\Task;
use App\News;

Route::get('/', function() {
    return view('index');
})->name('home');

Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', function () {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]); //в уроке это вид tasks
    })->name('tasks_index');

    Route::post('/', function(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_store');

    Route::delete('/{task}', function( Task $task) {
        $task->delete();
        return redirect(route('tasks_index'));
    })->name('tasks_destroy');


//на форму редактирования
    Route::get('/{task}/edit', function( Task $task) {
        return view('tasks.edit', [
            'task' => $task,
        ]);
    })->name('tasks_edit');

//с формы редактирования на tasks
    Route::put('/{task}', function(Request $request, Task $task) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_edit', $task->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_update');
});




Route::group(['prefix' => 'news'], function() {
    Route::get('/', function () {
        $news = News::all();
        return view('news.index');
    })->name('news_index');


    Route::post('/', function (Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'text' => 'required',                   
        ]);
        if ($validator->fails()) {
            return redirect(route('news_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $news = new News();
        $news->name = $request->name;
        $news->text = $request->text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_store');

    Route::get('/{news}/show', function( News $news) {
        return view('news.show', [
            'news' => $news,
        ]);
    })->name('news_show');
    
    
    Route::delete('/{news}', function( News $news) {
        $news->delete();
        return redirect(route('news_index'));
    })->name('news_destroy');
});
