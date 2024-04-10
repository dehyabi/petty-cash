@extends('layouts.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <a href="{{ route('menu.petty.cash') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2"> Petty Cash > Daftar Petty Cash</span>
            </div>
            <div class="col text-right">
                <a href="{{ route('add.petty.cash') }}" ><button class="btn btn-info">Add</button></a>
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
                        <th>Nomor Akun</th>
                        <th>Akun Petty Cash</th>
                        <th>Group Petty Cash</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $no=1;
                @endphp

                @foreach($petty_cashes as $petty_cash)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $petty_cash->nomor_akun }}</td>
                    <td>{{ $petty_cash->akun }}</td>
                    <td>{{ $petty_cash->group_petty_cash }}</td>
                    <td>
                        <a href="{{ route('edit.petty.cash', $petty_cash->id) }}"><i class="fas fa-edit" title="Edit"></i></a>
                        <a href="{{ route('confirm.delete.petty.cash', $petty_cash->id) }}"><i class="fas fa-trash-alt" title="Delete"></i></a>
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
    {bSortable: false, targets: [0]} 
  ],
                dom: 'lBfrtip',
           buttons: [
               {
                   extend: 'excelHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1, 2, 3]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1, 2, 3]
                   }
               }
           ]
           });
</script>
@endsection