@extends('layouts.app')

@section('content')
    <h1>Company Index</h1>
    <ul>
        @if(count($companies))
            @foreach($companies as $company)
                {{--<li> <a href="/company/{{$company->id}}">{{ $company->name }} </a> </li>--}}
                <li> <a href="{{url('companies/'.$company->id.'/edit')}}">{{$company->name}}</a> </li>
            @endforeach
        @else

            <p>You don't have any Company!</p>

        @endif
    </ul>
    {{ $companies->links() }}
    <a href="{{ url('companies/create') }}" class="btn btn-primary">Create New Company!</a>

@endsection
