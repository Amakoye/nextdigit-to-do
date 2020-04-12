

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto">

        <div class="col-md-8">
            <h3>Add a new List</h3>
            {!!Form::open(['action'=>'TodosController@store','method'=>'POST', 'class'=>'form'])!!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection
