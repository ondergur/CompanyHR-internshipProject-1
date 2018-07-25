@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/firststyle.css") }}" >
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('employees.show', $employee)}}">{{$employee->name}} {{$employee->lastname}}</a>
                        </h5>
                        <p class="card-text">
                            Phone: {{$employee->phone}}
                        </p>
                        <p class="card-text">
                            E-mail: <a href="mailto:{{$employee->mail}}">{{$employee->email}}</a>
                        </p>
                        <p class="card-text">
                            Company: {{$employee->companyid}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <a href="{{route('employees.edit', $employee)}}" class="btn btn-primary">Edit Employee</a>
                        </div>
                        <div class="float-right">
                            {{Form::open([ 'method' => 'delete', 'route' => ['employees.destroy', $employee]])}}
                            {{Form::submit('Delete Employee', array('class' => 'btn btn-danger justify-content-end')) }}
                            {{Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
