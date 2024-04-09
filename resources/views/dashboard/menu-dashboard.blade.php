@extends('layouts.main')
@section('content')

<div class="card-header">
        <div class="row">
            <div class="col">
                Dashboard > Petty Cash
            </div>
        </div>
</div>

<div class="row my-3 text-center">
    <div class="col-md">
        <a class="card-link" href="{{ route('all.transaksi') }}">
        <div class="card-db card-middle card py-5 my-2">
            Transaksi
        </div>
        </a>
    </div>
    <div class="col-md">
        <a class="card-link" href="{{ route('menu.laporan') }}">
        <div class="card-db card-right card py-5 my-2">
            Laporan
        </div>
        </a>
    </div>
    <div class="col-md">
        <a class="card-link" href="{{ route('all.outlet') }}">
        <div class="card-db card-left card py-5 my-2">
            Lokasi Outlet
        </div>
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col text-center">
                Laporan Petty Cash Periode April 2024
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
                        <th>Tanggal</th>
                        <th>Toko</th>
                        <th>Akun</th>
                        <th>User</th>
                        <th>Jenis Pembelian</th>
                        <th>Penerimaan</th>
                        <th>Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    
                @foreach($allTransaksi as $transaksi)
                
                @php
                $created_at = explode(' ',$transaksi->created_at);
                $created_at = $created_at[0]; 

                $originalDate = $created_at;
                $newDate = date("d-m-Y", strtotime($originalDate));
                @endphp

                <tr>
                    <td>{{ $newDate }}</td>
                    <td>{{ $transaksi->outlet }}</td>
                    <td>{{ $transaksi->akun }}</td>
                    <td>{{ $transaksi->nama }}</td>
                    <td>{{ $transaksi->jenis_pembelian }}</td>
                    <td>{{ $transaksi->kredit }}</td>
                    <td>{{ $transaksi->debit }}</td>
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