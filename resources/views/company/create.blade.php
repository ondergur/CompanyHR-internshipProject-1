@extends('layouts.app')

@section('content')
    <h1>Create a New Company </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }} </div>
    @endif

    {{Form::open(['route' => 'companies.store']) }}

    {{Form::label('name', 'Name: ')}}
    {{Form::text('name') }} <br>

    {{Form::label('email', 'E-Mail Address: ')}}
    {{Form::text('email') }} <br>

    {{Form::label('phone', 'Telephone Number: ')}}
    {{Form::text('phone')}} <br>

    {{Form::label('website', 'Web Site: ')}}
    {{Form::text('website')}} <br>

    {{Form::label('address', 'Address: ')}}
    {{Form::textarea('address')}} <br>

    {{Form::submit('Create!')}}

    {{Form::close() }}
@endsection
