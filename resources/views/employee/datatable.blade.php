@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/firststyle.css") }}">
@endpush

@section('content')
    <div id="konteynir">
        <table id="employee_table" class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
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
        // $(document).ready( function () {
        //     $('#myTable').DataTable();
        // }

        $(function() {
            $('#employee_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('employees.getdata')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'companyid', name: 'companyid'}
                ]
            });
        });

        // $(function () {
        //     $('#employee_table').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: 'https://datatables.yajrabox.com/eloquent/basic-object-data',
        //         data:function (d) {
        //                d.id=$('#id').val();
        //                d.name=$('#name').val();
        //                d.lastname=$('#lastname').val();
        //                d.email=$('#email').val();
        //                d.phone=$('#phone').val();
        //                d.companyid=$('#companyid').val();
        //         }
        //     })
        // });
    </script>
@endpush