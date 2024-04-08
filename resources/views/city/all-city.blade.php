@extends('layouts.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <a href="{{ route('master.lokasi') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Lokasi Outlet > Master Lokasi > Daftar Kota</span>
            </div>
            <div class="col text-right">
                <a href="{{ route('add.city') }}" ><button class="btn btn-info">Add</button></a>
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
                        <th>Kota</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $no=1;
                @endphp

                @foreach($cities as $city)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $city->kota }}</td>
                    <td>
                        <a href="{{ route('edit.city', $city->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('confirm.delete.city', $city->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
    {bSortable: false, targets: [1]} 
  ],
                dom: 'lBfrtip',
           buttons: [
               {
                   extend: 'excelHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1 ]
                   }
               }
           ]
           });
</script>
@endsection