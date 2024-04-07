@extends('layouts.layout-employee')

@section('content') 

<div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data > Add Employee
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg my-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Employee</h3></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.employee') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Nama</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="{{ Session::get('nama') }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="alamat">Alamat</label>
                                        <input required class="form-control py-4" name="alamat" type="text" value="{{ Session::get('alamat') }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="no_hp">No. HP</label>
                                        <input required class="form-control py-4" name="no_hp" type="number" value="{{ Session::get('no_hp') }}"/>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="posisi">Posisi</label>
                                        <select required class="form-control" name="posisi" style="height: 49.33px">
                                            <option>{{ Session::get('posisi') }}</option>
                                            <option>Front End Developer</option>
                                            <option>Back End Developer</option>
                                            <option>Full Stack Developer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Submit</button></div>        
                            <div class="form-group mt-2 mb-0 text-center"><a href="{{ route('all.employee') }}">Cancel</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection