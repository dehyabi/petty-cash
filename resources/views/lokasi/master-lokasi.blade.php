@extends('layouts.main')

@section('content') 

<div class="card-header">
    <a href="{{ route('menu.lokasi') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2"> Lokasi Outlet > Master Lokasi
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card rounded-lg my-5">
                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Master Lokasi</h4></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body mb-4">
                            <div class="form-row">
                                <div class="col-md">
                                <a href="{{ route('all.city') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block">Daftar Kota</button></a>
                                
                                <a href="{{ route('all.area') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block my-4">Daftar Area</button></a>
                                
                                <a href="{{ route('all.site') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block">Daftar Site</button> </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection