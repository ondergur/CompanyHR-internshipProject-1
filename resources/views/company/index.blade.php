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
    </style>
    <div id="konteynir">
        {{--<h1 style="margin: 0px; padding-left: 40px; padding-bottom: 16px">Company Index</h1>--}}
        <div class="row">
            <div class="col-md" id="baslik"><h1>Company Index</h1></div>
            <div class="col-md"><a href="{{ url('companies/create') }}" class="btn btn-success ">New Company</a></div>
            <div class="col-md" id="search-bar">
                <form class="form-inline justify-content-end">
                    <input class="form-control mr-sm-2" type="search" name="searchbar" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
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
                    <div class="row justify-content-between">
                        <div class="col-md-1">Id</div>
                        <div class="col-md">Name</div>
                        <div class="col-md">Address</div>
                        <div class="col-md">Phone</div>
                        <div class="col-md">E-mail</div>
                        <div class="col-md">Website</div>
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
