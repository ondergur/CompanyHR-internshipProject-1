@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="">
                    <div class="card-body">

                        {{Form::model($employee, ['route' => $route, 'method' => $method])}}

                        <div class="form-group row yeni">
                            {{Form::label('name', 'Name: ', ['class' => 'col-sm-3 col-form-label'])}}
                            <div class="col-sm-7">
                                {{Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            {{--Name validation--}}
                            @if($errors->has('name'))
                                <div class="btn btn-danger">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row yeni">
                            {{Form::label('lastname', 'Last Name: ', ['class' => 'col-sm-3 col-form-label'])}}
                            <div class="col-sm-7">
                                {{Form::text('lastname', null, ['class' => 'form-control']) }}
                            </div>
                            {{--Name validation--}}
                            @if($errors->has('lastname'))
                                <div class="btn btn-danger">
                                    {{$errors->first('lastname')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row yeni">
                            {{Form::label('email', 'E-Mail Address: ', ['class' => 'col-sm-3 col-form-label'])}}
                            <div class="col-sm-7">
                                {{Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                            {{--Mail validation--}}
                            @if($errors->has('email'))
                                <div class="btn btn-danger">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row yeni">
                            {{Form::label('phone', 'Telephone Number: ', ['class' => 'col-sm-3 col-form-label'])}}
                            <div class="col-sm-7">
                                {{Form::text('phone', null, ['class' => 'form-control'])}}
                            </div>
                            @if($errors->has('phone'))
                                <div class="btn btn-danger">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group row yeni">
                            {{Form::label('companyid', 'Company: ', ['class' => 'col-sm-3 col-form-label'])}}
                            <div class="col-sm-7">
                                {{Form::select('companyid', $company_names, ['class' => ''])}}
                            </div>
                        </div>

                        <div class="form-group row yeni">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-7">
                                {{Form::submit('Save changes', ['class' => 'btn btn-success'])}}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
