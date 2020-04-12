@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto">

        <div class="col-md-8">
            <div class="d-flex">
                <h3>Edit List</h3>
                <a href="/todos" class="btn btn-info btn-sm ml-2">Go back</a>
            </div>

            {!!Form::open(['action'=>['TodosController@update', $todo->id],'method'=>'POST', 'class'=>'form'])!!}
            {{Form::hidden('_method', 'PUT')}}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $todo->title,['class'=>'form-control','placeholder'=>'Title'])}}
            </div>

            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection
