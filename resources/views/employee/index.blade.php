@extends('layouts.app')

@section('content')
    {{--<h1 style="margin: 0px; padding-left: 40px; padding-bottom: 16px">Company Index</h1>--}}
    <h1 class="baslik">Employee Index</h1>
    @if(count($employees))
        <div class="row">
            @foreach($employees as $employee)
                <div class="col-sm-3">
                    {{--<li> <a href="/company/{{$company->id}}">{{ $company->name }} </a> </li>--}}
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('employees.show', $employee)}}">{{$employee->name}}</a>
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="{{ route('employees.show', $employee) }}" class="btn btn-primary">Employee
                                Information</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else

        <p>You don't have any Employee!</p>

    @endif
    <div style="padding-left: 40px; padding-top: 16px"> {{ $employees->links() }} </div>
    <a href="{{ url('employees/create') }}" class="btn btn-success" style="margin-left: 40px">Create New Employee!</a>

@endsection
