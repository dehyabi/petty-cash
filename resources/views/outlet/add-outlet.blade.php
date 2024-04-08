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
                        <form method="POST" action="{{ route('store.outlet') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="outlet">Outlet</label>
                                        <input required class="form-control py-4" name="outlet" type="text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="site">Site</label>
                                        <select required class="py-3 form-site" name="site" type="text" value="">
                                            <option value=""></option>
                                        @foreach($sites as $site)
                                            <option value="{{ $site->id }}">{{ $site->site }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="area">Area</label>
                                        <select required class="py-3 form-site" name="area" type="text" value="">
                                            <option value=""></option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="kota">Kota</label>
                                        <select required class="py-3 form-site" name="kota" type="text" value="">
                                            <option value=""></option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->kota }}</option>
                                        @endforeach
                                        </select>
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