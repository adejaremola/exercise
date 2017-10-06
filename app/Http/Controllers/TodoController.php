<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function add(Request $request) {
        if ($request->ajax()) {
            $todo = new Todo();
            $todo->title = $request->title;
            $todo->save();     
            $last_todo = $todo->id;
            $todos = Todo::whereId($last_todo)->get();
            return view("ajaxData", compact('todos'));
        }
    }

    public function update(Request $request, Todo $todo) {       
        if ($request->ajax()) {
            $todo->title = $request->title;
            $todo->save();
            return "OK";       
        }
    }

    public function index() {
        $todos = Todo::all();
        return view("index", compact('todos'));
    }

    public function destroy(Request $request, Todo $todo) {
      if($request->ajax()){
        $todo->delete();
        return "OK";
      }
    }

    public function done(Request $request, Todo $todo) {
      if($request->ajax()){
        $task->status = 1;
        $task->save();
        return "OK";
      }
    }
}
