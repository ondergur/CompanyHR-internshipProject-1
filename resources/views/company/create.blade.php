@extends('layouts.app')

@section('content')

    {{--To show every error inthe same place--}}
    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
        {{--{{ implode('', $errors->all(':message')) }} </div>--}}
    {{--@endif--}}

    <div class="col-sm-6">
    <div class="well">
        <h1>Create a New Company </h1>
        {{Form::open(['route' => 'companies.store']) }}

        <div class="form-group row">
            {{Form::label('name', 'Name: ', ['class' => 'col-sm-2 col-form-label'])}}
            <div class="col-sm-5">
            {{Form::text('name', '', ['class' => 'form-control']) }}
            </div>
            {{--Name validation--}}
            @if($errors->has('name'))
                <div class="btn btn-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group row">
            {{Form::label('email', 'E-Mail Address: ', ['class' => 'col-sm-2 col-form-label'])}}
            <div class="col-sm-5">
                {{Form::text('email', '', ['class' => 'form-control']) }} </div>
                {{--Mail validation--}}
                @if($errors->has('email'))
                    <div class="btn btn-danger">
                        {{$errors->first('email')}}
                    </div>
                @endif
        </div>

        <div class="form-group row">
            {{Form::label('phone', 'Telephone Number: ', ['class' => 'col-sm-2 col-form-label'])}}
            <div class="col-sm-5">
            {{Form::text('phone', '', ['class' => 'form-control'])}} </div>
        </div>


        <div class="form-group row">
            {{Form::label('website', 'Web Site: ', ['class' => 'col-sm-2 col-form-label'])}}
            <div class="col-sm-5">{{Form::text('website', '', ['class' => 'form-control'])}}</div>
        </div>

        <div class="form-group row">
            {{Form::label('address', 'Address: ', ['class' => 'col-sm-2 col-form-label'])}}
            <div class="col-sm-5">{{Form::textarea('address', '', ['class' => 'form-control'])}}</div>
            {{--Address validation--}}
            @if($errors->has('address'))
                <div class="alert alert-danger">
                    {{$errors->first('address')}}
                </div>
            @endif
        </div>

        <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        {{Form::submit('Create Your Company!', ['class' => 'btn btn-primary'])}}
        </div>
        </div>
        {{Form::close() }}

    </div>
    </div>
@endsection
