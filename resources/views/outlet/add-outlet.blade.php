@extends('layouts.main')

@section('content') 

<div class="card-header">
<a href="{{ route('all.outlet') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Lokasi Outlet > Tambah Outlet</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card border-0 rounded-lg my-5">
                    <div class="card-header">
                        <h4 class="text-center font-weight-light my-4">Tambah Outlet</h4>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Outlet</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Site</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Area</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Kota</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block mb-4">Tambah Outlet</button></div>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection