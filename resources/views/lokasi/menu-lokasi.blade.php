@extends('layouts.main')

@section('content') 

<div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Master Data > Tambah Outlet
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card rounded-lg my-5">
                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Tambah Outlet</h4></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-md">
                                    <a href="{{ route('add.city') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block">Kota</button></a>
                                
                                <a href="{{ route('add.area') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block my-4">Area</button></a>
                                
                                <a href="{{ route('add.site') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block">Site</button>
                                </div>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection