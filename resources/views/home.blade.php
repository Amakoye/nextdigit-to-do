@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (auth()->user()->role ==0)
                    <div class="card-header">Dashboard {{auth()->user()->name}}</div>
                @endif

                @if (auth()->user()->role ==1)
                <div class="card-header">Dashboard {{auth()->user()->name}}</div>
                @endif

                @if (auth()->user()->role ==2)
                <div class="card-header">Dashboard {{auth()->user()->name}}</div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex mb-2">
                        <a href="/todos" class="btn btn-success btn-sm ml-2">Todos</a>
                        <a href="/todos/create" class="btn btn-info btn-sm ml-2">Add Todo</a>
                    </div>
                    @if (count($todos)>0)
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    @if (auth()->user()->role ===0 || auth()->user()->role ===2)
                                    <th>Action</th>
                                    @endif
                                </tr>
                                @foreach ($todos as $todo)
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>{{$todo->title}}</td>
                                    @if (auth()->user()->role ===0 || auth()->user()->role ===2)
                                        <td>
                                            <div class="d-flex">
                                                <a href="/todos/{{$todo->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                                    {!!Form::open(['action'=>['TodosController@destroy',$todo->id], 'method'=>'POST', 'class'=>'ml-2'])!!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm '])}}
                                                    {!!Form::close()!!}
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </table>
                            {{$todos->links()}}
                    @else
                        No lists found
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
