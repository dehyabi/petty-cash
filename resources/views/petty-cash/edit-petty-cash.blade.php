@extends('layouts.main')

@section('content') 

@php

use App\Models\GroupPettyCash;
use App\Models\PettyCash;

$existGroupPettyCash = GroupPettyCash::where('group_petty_cashes.id', $petty_cash->group)->pluck('group_petty_cash');
$existGroupPettyCash = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$existGroupPettyCash);


@endphp

<div class="card-header">
        <a href="{{ route('all.petty.cash') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Petty Cash > Update Akun Petty Cash</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card border-0 rounded-lg my-5">
                    <div class="card-header">
                        <h4 class="text-center font-weight-light my-4">Update Akun Petty Cash</h4>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.petty.cash', $petty_cash->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="nomor_akun">Nomor Akun Petty Cash</label>
                                        <input required class="form-control py-4" name="nomor_akun" type="text" value="{{ $petty_cash->nomor_akun }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="akun">Akun Petty Cash</label>
                                        <input required class="form-control py-4" name="akun" type="text" value="{{ $petty_cash->akun }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="group">Group Petty Cash</label>
                                        <select required class="py-3 form-site" name="group" type="text" value="">
                                            <option value="{{ $petty_cash->group }}">{{ $existGroupPettyCash }}</option>
                                        @foreach($group_petty_cashes as $group_petty_cash)
                                            <option value="{{ $group_petty_cash->id }}">{{ $group_petty_cash->group_petty_cash }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block mb-4">Update Akun Petty Cash</button></div>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection