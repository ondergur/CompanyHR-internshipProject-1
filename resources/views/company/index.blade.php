@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/firststyle.css") }}">
@endsection

@section('content')
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
        {{--<h1 style="margin: 0px; padding-left: 40px; padding-bottom: 16px">Company Index</h1>--}}
        <div class="row">
            <div class="col-md" id="baslik"><h1>Company Index</h1></div>
            <div class="col-md"><a href="{{ url('companies/create') }}" class="btn btn-success float-right">New Company</a></div>
        </div>
        @if(count($companies))
            {{--<div class="row">--}}
            {{--@foreach($companies as $company)--}}
            {{--<div class="col-sm-3">--}}
            {{--<li> <a href="/company/{{$company->id}}">{{ $company->name }} </a> </li>--}}
            {{--<div class="card" style="">--}}
            {{--<img class="card-img-top" src="{{asset('company_logos/'.$company->logo)}}"--}}
            {{--alt="{{$company->name.' logo'}}">--}}
            {{--<div class="card-body">--}}
            {{--<h5 class="card-title">--}}
            {{--<a href="{{route('companies.show', $company)}}">{{$company->name}}</a>--}}
            {{--</h5>--}}
            {{--<p class="card-text">Some quick example text to build on the card title and make up the--}}
            {{--bulk--}}
            {{--of the card's content.</p>--}}
            {{--<a href="{{ route('companies.show', $company) }}" class="btn btn-primary">Company--}}
            {{--Information</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}

            <ul class="list-group">
                <li class="list-group-item">
                    {{Form::open(['route' => 'companies.index', 'method' => 'GET']) }}
                    <div class="row justify-content-between">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md">
                            {{Form::text('namefilter', request('namefilter') , ['class' => 'form-control', 'placeholder' => 'Name Filter'])}}
                        </div>
                        <div class="col-md">
                            {{Form::text('addressfilter', request('addressfilter'), ['class' => 'form-control', 'placeholder' => 'Address Filter'])}}
                        </div>
                        <div class="col-md">
                            {{Form::text('phonefilter', request('phonefilter'), ['class' => 'form-control', 'placeholder' => 'Phone Filter'])}}
                        </div>
                        <div class="col-md">
                            {{Form::text('emailfilter', request('emailfilter') , ['class' => 'form-control', 'placeholder' => 'E-mail Filter'])}}
                        </div>
                        <div class="col-md">
                            {{Form::text('websitefilter', request('websitefilter'), ['class' => 'form-control', 'placeholder' => 'Website Filter'])}}
                        </div>
                        <div class="col-md-2">
                            {{Form::submit('Filter', ['class' => 'btn btn-success my-2 my-sm-0'])}}
                        </div>
                    </div>
                    {{Form::close()}}
                </li>
                <li class="list-group-item">
                    <div class="row justify-content-between">
                        <div class="col-md-1">Id</div>
                        <div class="col-md">Name</div>
                        <div class="col-md">Address</div>
                        <div class="col-md">Phone</div>
                        <div class="col-md">E-mail</div>
                        <div class="col-md">Website</div>
                        <div class="col-md-1">Edit</div>
                        <div class="col-md-1">Delete</div>
                    </div>
                </li>
                @foreach($companies as $company)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-1 scrollable-col">
                                {{$company->id}}
                            </div>
                            <div class="col-md scrollable-col">
                                <a href="{{route('companies.show', $company)}}">{{$company->name}}</a>
                            </div>
                            <div class="col-md scrollable-col">
                                {{$company->address}}
                            </div>
                            <div class="col-md scrollable-col">
                                {{$company->phone}}
                            </div>
                            <div class="col-md scrollable-col">
                                <a href="mailto:{{$company->email}}">{{$company->email}}</a>
                            </div>
                            <div class="col-md scrollable-col">
                                <a href="http://{{$company->website}}">{{$company->website}}</a>
                            </div>
                            <div class="col-md-1"><a href="{{route('companies.edit', $company)}}"><i
                                            class="far fa-edit"></i></a></div>
                            <div class="col-md-1">
                                {{Form::open([ 'method' => 'delete', 'route' => ['companies.destroy', $company]])}}
                                {{Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => '']) }}
                                {{Form::close() }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else

            <p>You don't have any Company!</p>

        @endif
        <div style="padding-top: 16px"> {{ $companies->links() }} </div>
    </div>
@endsection
