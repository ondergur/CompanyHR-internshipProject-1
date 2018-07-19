@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="">
                    <img class="card-img-top" src="{{asset('company_logos/'.$company->logo)}}" alt="{{$company->logo.' logo'}}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{url('companies/'.$company->id)}}">{{$company->name}}</a>
                        </h5>
                        <p class="card-text">
                            Address:    {{$company->address}}
                        </p>
                        <p class="card-text">
                            Phone:    {{$company->phone}}
                        </p>
                        <p class="card-text">
                            E-mail:    {{$company->email}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{$company->website}}" class="btn btn-primary">Go to website</a>
                        <a href="{{route('companies.edit', $company)}}" class="btn btn-danger">Edit this Company</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
