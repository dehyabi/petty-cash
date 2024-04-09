@extends('layouts.main')

@section('content')

<div class="card-header">

        <a href="{{ route('all.outlet') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2"> Lokasi Outlet > Konfirmasi Delete Data</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Delete Outlet</h4></div>
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-md text-center">
                                    <div class="form-group">
                                        <label class="mb-3">Apakah anda yakin akan menghapus data ini?</label>
                                        <div>{{ $outlet->outlet }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4"><a href="{{ route('delete.outlet', $outlet->id) }}" style="text-decoration: none"><button class="btn btn-danger btn-block">Delete Outlet</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection