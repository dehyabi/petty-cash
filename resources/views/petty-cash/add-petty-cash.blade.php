@extends('layouts.main')

@section('content') 

<div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Master Data > Tambah Akun Petty Cash
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg my-5">
                    <div class="card-header">
                        <h4 class="text-center font-weight-light my-4">Tambah Akun Petty Cash</h4>
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
                                        <label class="small mb-1" for="nama">Nomor Akun Petty Cash</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="nama">Akun Petty Cash</label>
                                        <input required class="form-control py-4" name="nama" type="text" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block">Tambah Akun Petty Cash</button></div>        
                            <div class="form-group mt-3 mb-0"><a href="{{ route('menu.petty.cash') }}"><i class="fas fa-arrow-left"></i> <span> Back</span></a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection