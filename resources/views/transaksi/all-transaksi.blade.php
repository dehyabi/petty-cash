@extends('layouts.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col">
                Transaksi > Transaksi Petty Cash
            </div>
            <div class="col text-right">
                <a href="{{ route('add.transaksi') }}" ><button class="btn btn-info">Add</button></a>
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
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>No. Transaksi</th>
                        <th>Outlet</th>
                        <th>Jenis Pembelian</th>
                        <th>Akun</th>
                        <th>User</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php 
                $no=1;
                @endphp

                @foreach($allTransaksi as $transaksi)
                
                @php
                $created_at = explode(' ',$transaksi->created_at);
                $created_at = $created_at[0]; 

                $originalDate = $created_at;
                $newDate = date("d-m-Y", strtotime($originalDate));
                @endphp

                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $newDate }}</td>
                    <td>{{ $transaksi->no_transaksi }}</td>
                    <td>{{ $transaksi->outlet }}</td>
                    <td>{{ $transaksi->jenis_pembelian }}</td>
                    <td>{{ $transaksi->akun }}</td>
                    <td>{{ $transaksi->nama }}</td>
                    <td>{{ $transaksi->debit }}</td>
                    <td>{{ $transaksi->kredit }}</td>
                    <td>
                        <a href="{{ route('edit.transaksi', $transaksi->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('confirm.delete.transaksi', $transaksi->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                   }
               }
           ]
           });
</script>
@endsection