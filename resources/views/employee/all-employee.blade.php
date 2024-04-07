@extends('layouts.layout-employee')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <i class="fas fa-table mr-1"></i>
                Data > All Employees
            </div>
            <div class="col text-right">
                <a href="{{ route('add.employee') }}" title="Add Employee"><button class="btn btn-primary">Add</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success mb-3 text-center" role="alert">{{ Session::get('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Posisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp

                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->alamat }}</td>
                        <td>{{ $employee->no_hp }}</td>
                        <td>{{ $employee->posisi }}</td>
                        <td>
                            <a href="{{ route('edit.employee', $employee->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('confirm.delete.employee', $employee->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                   
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
<script>
   $('#dataTable').DataTable({
    columnDefs: [
    {bSortable: false, targets: [4]} 
  ],
                dom: 'lBfrtip',
           buttons: [
               {
                   extend: 'excelHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1, 2, 3, 4]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1, 2, 3, 4 ]
                   }
               }
           ]
           });
       </script>
@endsection