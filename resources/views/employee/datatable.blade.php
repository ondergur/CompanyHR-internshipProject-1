@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/firststyle.css") }}">
@endpush

@section('content')
    <div id="konteynir">
        {{Form::open(['route' => 'employees.index', 'method' => 'GET', 'id' => 'employeeFilter']) }}
        <div class="row justify-content-between">
            <div class="col-md-1">
            </div>
            <div class="col-md">
                {{Form::text('namefilter', request('namefilter') , ['class' => 'form-control', 'placeholder' => 'Name Filter'])}}
            </div>
            <div class="col-md">
                {{Form::text('lastnamefilter', request('lastnamefilter'), ['class' => 'form-control', 'placeholder' => 'Lastname Filter'])}}
            </div>
            <div class="col-md">
                {{Form::text('emailfilter', request('emailfilter'), ['class' => 'form-control', 'placeholder' => 'E-mail Filter'])}}
            </div>
            <div class="col-md">
                {{Form::text('phonefilter', request('phonefilter') , ['class' => 'form-control', 'placeholder' => 'Phone Filter'])}}
            </div>
            <div class="col-md">
                {{Form::select('companyfilter', $company_names, request('companyfilter'), ['class' => 'form-control', 'placeholder' => 'All'])}}
            </div>
            <div class="col-md-2">
                {{Form::submit('Filter', ['class' => 'btn btn-success my-2 my-sm-0'])}}
                {{Form::button('Export', ['class' => 'btn btn-danger my-2 my-sm-0', 'id' => 'export-button'])}}
            </div>
        </div>
        {{Form::close()}}
        <table id="employee_table" class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script type="text/javascript">

        $(function () {
            var oTable = $('#employee_table').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url:'{{route('employees.getdata')}}',
                    data: function (d) {
                        d.namefilter = $('input[name=namefilter]').val();
                        d.lastnamefilter = $('input[name=lastnamefilter]').val();
                        d.emailfilter = $('input[name=emailfilter]').val();
                        d.phonefilter = $('input[name=phonefilter]').val();
                        d.companyfilter = $('select[name=companyfilter]').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'companyid', name: 'companyid'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $('#employeeFilter').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });

            $('#export-button').on('click', function(e) {
                var data = $('#employeeFilter').serialize();

                window.location = '/employees/export?'+data;
                console.log(data)
            });
        });
    </script>
@endpush