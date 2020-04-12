<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class PagesController extends Controller
{
    //
    public function index(){

       /*  $todos = Todo::orderBy('created_at','desc')->paginate(10);
        return view('todos.index')->with('todos',$todos); */
        return view('pages.index');
    }
}
