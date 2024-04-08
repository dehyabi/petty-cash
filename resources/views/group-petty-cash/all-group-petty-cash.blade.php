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
                        <th>Tanggal</th>
                        <th>Toko</th>
                        <th>Jenis Pembelian</th>
                        <th>Akun</th>
                        <th>User</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
@endsection