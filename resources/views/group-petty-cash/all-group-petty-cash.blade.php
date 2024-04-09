@extends('layouts.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <a href="{{ route('menu.petty.cash') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2"> Petty Cash > Daftar Group Petty Cash</span>
            </div>
            <div class="col text-right">
                <a href="{{ route('add.group.petty.cash') }}" ><button class="btn btn-info">Add</button></a>
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
                        <th>Group Petty Cash</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $no=1;
                @endphp

                @foreach($group_petty_cashes as $group_petty_cash)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $group_petty_cash->group_petty_cash }}</td>
                    <td>
                        <a href="{{ route('edit.group.petty.cash', $group_petty_cash->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('confirm.delete.group.petty.cash', $group_petty_cash->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
        
@endsection