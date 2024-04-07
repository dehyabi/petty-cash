@extends('layouts.layout-employee')

@section('content')

<div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data > Delete Employee
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Delete Employee</h3></div>
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-md text-center">
                                    <div class="form-group">
                                        <label class="mb-3">Apakah anda yakin akan menghapus data karyawan ini?</label>
                                        <div>Nama: {{ $employee->nama }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4"><a href="{{ route('delete.employee', $employee->id) }}" style="text-decoration: none"><button class="btn btn-danger btn-block">Delete</button></a></div>
                            <div class="form-group mt-2 mb-0 text-center"><a href="{{ route('all.employee') }}">Cancel</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
