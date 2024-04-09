@extends('layouts.main')

@section('content') 

<div class="card-header">
<a href="{{ route('all.transaksi') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Transaksi > Tambah Transaksi Petty Cash</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card border-0 rounded-lg my-5">
                    <div class="card-header">
                        <h4 class="text-center font-weight-light my-4">Tambah Transaksi</h4>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.transaksi') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="outlet">Outlet</label>
                                        <select required class="py-3 form-site" name="outlet" type="text" value="">
                                            <option value=""></option>
                                        @foreach($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="jenis_pembelian">Jenis Pembelian</label>
                                        <select required class="py-3 form-site" name="jenis_pembelian" type="text" value="">
                                            <option value=""></option>
                                        @foreach($jenis_pembelians as $jenis_pembelian)
                                            <option value="{{ $jenis_pembelian->id }}">{{ $jenis_pembelian->jenis_pembelian }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="akun">Akun</label>
                                        <select required class="py-3 form-site" name="akun" type="text" value="">
                                            <option value=""></option>
                                        @foreach($petty_cashes as $petty_cash)
                                            <option value="{{ $petty_cash->id }}">{{ $petty_cash->akun }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="user">User</label>
                                        <select required class="py-3 form-site" name="user" type="text" value="">
                                            <option value=""></option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="debit">Debit</label>
                                        <input required class="form-control py-4" name="debit" type="number" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="kredit">Kredit</label>
                                        <input required class="form-control py-4" name="kredit" type="number" value="">
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