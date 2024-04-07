@extends('layouts.main')

@section('content') 

<div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data > Tambah Outlet
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg my-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Outlet</h3></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.employee') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md">
                                <button class="py-3 btn btn-outline-dark btn-block">Kota</button>
                                <button class="py-3 btn btn-outline-dark btn-block my-4">Area</button>
                                <button class="py-3 btn btn-outline-dark btn-block">Site</button>
                                </div>
                            </div>
 
                            <div class="form-group mt-3 mb-0 text-center"><a href="{{ route('all.employee') }}">Cancel</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection