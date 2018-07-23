@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="">
                    <img class="card-img-top" src="{{asset('company_logos/'.$company->logo)}}"
                         alt="{{$company->logo.' logo'}}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{url('companies/'.$company->id)}}">{{$company->name}}</a>
                        </h5>
                        <p class="card-text">
                            Address: {{$company->address}}
                        </p>
                        <p class="card-text">
                            Phone: {{$company->phone}}
                        </p>
                        <p class="card-text">
                            E-mail: <a href="mailto:{{$company->mail}}">{{$company->email}}</a>
                        </p>
                        <p class="card-text">
                            Web Site: <a href="{{$company->website}}">{{$company->website}}</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <a href="{{route('companies.edit', $company)}}" class="btn btn-primary">Edit Company</a>
                        </div>
                        <div class="float-right">
                            {{Form::open([ 'method' => 'delete', 'route' => ['companies.destroy', $company]])}}
                            {{Form::submit('Delete Company', array('class' => 'btn btn-danger justify-content-end')) }}
                            {{Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
