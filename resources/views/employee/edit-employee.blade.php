@extends('layouts.layout-employee')

@section('content')

<div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data > Edit Employee
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Employee</h3></div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.employee', $employee->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Nama</label>
                                        <input required class="form-control py-4" name="nama" value="{{ $employee->nama }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="alamat">Alamat</label>
                                        <input required class="form-control py-4" name="alamat" value="{{ $employee->alamat }}" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="no_hp">No. HP</label>
                                        <input required class="form-control py-4" name="no_hp" value="{{ $employee->no_hp }}" type="number"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="posisi">Posisi</label>
                                        <select required class="form-control" name="posisi" style="height: 49.33px">
                                            <option>{{ $employee->posisi }}</option>
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