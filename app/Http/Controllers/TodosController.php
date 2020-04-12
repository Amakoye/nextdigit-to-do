<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::orderBy('created_at','desc')->paginate(10);
        return view('todos.index')->with('todos',$todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
        ]);
        //update date
        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->save();

        return redirect('/todos')->with('success', 'List added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //check for correct user
         if(auth()->user()->role === 0 ||auth()->user()->role === 2 ){
            $todo = todo::find($id);
            return view('todos.edit')->with('todo', $todo);

        }else{
            return redirect('/todos')->with('error', 'Unauthorized page');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=>'required',
        ]);
        //update date
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->save();

        return redirect('/todos')->with('success', 'List updated successfully');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
         //check for correct user
         if(auth()->user()->role !== 0){
            return redirect('/todos')->with('error', 'Unauthorized page');
        }
        $todo->delete();
        return redirect('/todos')->with('success', 'List deleted');
    }
}
