@extends('layouts.main')

@section('content') 

<div class="card-header">
        Data User > Daftar User
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card rounded-lg my-5">
                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Daftar User</h4></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-md">
                                    <a href="{{ route('all.user') }}"" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block">Daftar User</button></a>
                                
                                <a href="{{ route('all.group.user') }}" class="menu-lokasi">
                                <button class="py-3 btn btn-outline-dark btn-block my-4">Daftar Group User</button></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection