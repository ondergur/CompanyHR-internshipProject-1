@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/firststyle.css") }}">
@endsection

@section('content')
    {{--<h1 style="margin: 0px; padding-left: 40px; padding-bottom: 16px">Company Index</h1>--}}
    <style>
        .scrollable-col {
            max-height: 35px;
            overflow-y: auto;
        }

        .list-group-item {
            height: 59px;
        }

        .fa-trash-alt {
            color: red;
        }

        .fa-edit {
            color: green;
        }
    </style>
    <div id="konteynir">
        <div class="row">
            <div class="col-md" id="baslik"><h1>Employee Index</h1></div>
            <div class="col-md"><a href="{{route('employees.create')}}" class="btn btn-success ">New Employee</a></div>
            <div class="col-md" id="search-bar">
                <form class="form-inline justify-content-end">
                    <input class="form-control mr-sm-2" type="search" name="searchbar" placeholder="Search"
                           aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
        @if(count($employees))
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row justify-content-between">
                        <div class="col-md-1">Id</div>
                        <div class="col-md">Name</div>
                        <div class="col-md">Lastname</div>
                        <div class="col-md">E-mail</div>
                        <div class="col-md">Phone</div>
                        <div class="col-md">Company</div>
                        <div class="col-md-1">Edit</div>
                        <div class="col-md-1">Delete</div>
                    </div>
                </li>
                @foreach($employees as $employee)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-1 scrollable-col">
                                {{$employee->id}}
                            </div>
                            <div class="col-md scrollable-col">
                                {{$employee->name}}
                            </div>
                            <div class="col-md scrollable-col">
                                {{$employee->lastname}}
                            </div>
                            <div class="col-md scrollable-col">
                                <a href="mailto:{{$employee->email}}">{{$employee->email}}</a>
                            </div>
                            <div class="col-md scrollable-col">
                                {{$employee->phone}}
                            </div>
                            <div class="col-md scrollable-col">
                                {{$employee->company->name}}
                            </div>
                            <div class="col-md-1">
                                <a href="{{route('employees.edit', $employee)}}"><i class="far fa-edit"></i></a>
                            </div>
                            <div class="col-md-1">
                                {{Form::open([ 'method' => 'delete', 'route' => ['employees.destroy', $employee]])}}
                                {{Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => '']) }}
                                {{Form::close() }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else

            <p>You don't have any Employee!</p>

        @endif
        <div style="padding-top: 16px"> {{ $employees->links() }} </div>
    </div>
@endsection
