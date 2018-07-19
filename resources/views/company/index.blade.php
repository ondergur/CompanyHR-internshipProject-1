@extends('layouts.app')

@section('content')
    {{--<h1 style="margin: 0px; padding-left: 40px; padding-bottom: 16px">Company Index</h1>--}}
    <h1 class="baslik">Company Index</h1>
        @if(count($companies))
            <div class="row">
                @foreach($companies as $company)
                    <div class="col-sm-3">
                        {{--<li> <a href="/company/{{$company->id}}">{{ $company->name }} </a> </li>--}}
                        <div class="card" style="">
                            <img class="card-img-top" src="{{asset('company_logos/'.$company->logo)}}" alt="{{$company->logo.' logo'}}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{url('companies/'.$company->id)}}">{{$company->name}}</a>
                                </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="{{url('companies/'.$company->id)}}" class="btn btn-primary">Company Information</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else

            <p>You don't have any Company!</p>

        @endif
    <div style="padding-left: 40px; padding-top: 16px"> {{ $companies->links() }} </div>
    <a href="{{ url('companies/create') }}" class="btn btn-success" style="margin-left: 40px">Create New Company!</a>

@endsection
