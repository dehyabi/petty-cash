@extends('layouts.main')

@section('content') 

@php

use App\Models\Outlet;
use App\Models\GroupUser;

$existOutlet = Outlet::where('outlets.id', $user->outlet)->pluck('outlet');
$existOutlet = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$existOutlet);

$existGroupUser = GroupUser::where('group_users.id', $user->group_user)->pluck('group_user');
$existGroupUser = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$existGroupUser);

@endphp

<div class="card-header">
    <a href="{{ route('all.user') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Data User > Update User</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card border-0 rounded-lg my-5">
                    <div class="card-header">
                        <h4 class="text-center font-weight-light my-4">Update User</h4>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.user', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="user">User</label>
                                        <input required class="form-control py-4" name="user" type="text" value="{{ $user->nama }}">
                                    </div>
                                    <div class="form-group"> 
                                        <label class="small mb-1" for="outlet">Outlet</label>
                                        <select required class="py-3 form-site" name="outlet" type="text" value="">
                                            <option value="{{ $user->outlet }}">{{ $existOutlet }}</option>
                                        @foreach($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="small mb-1" for="group_user">Group User</label>
                                        <select required class="py-3 form-site" name="group_user" type="text" value="">
                                            <option value="{{ $user->group_user }}">{{ $existGroupUser }}</option>
                                        @foreach($group_users as $group_user)
                                            <option value="{{ $group_user->id }}">{{ $group_user->group_user }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block mb-4">Update User</button></div>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection