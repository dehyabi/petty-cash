@extends('layouts.main')

@section('content') 

<div class="card-header">
    <a href="{{ route('all.group.petty.cash') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Petty Cash > Update Group Petty Cash</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card border-0 rounded-lg my-5">
                    <div class="card-header">
                        <h4 class="text-center font-weight-light my-4">Update Group Petty Cash</h4>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mx-3 mt-3 text-center" role="alert">{{ Session::get('error') }}</div>
                    @endif                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.group.petty.cash', $group_petty_cash->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label class="small mb-1" for="group_petty_cash">Group Petty Cash</label>
                                        <input required class="form-control py-4" name="group_petty_cash" type="text" value="{{ $group_petty_cash->group_petty_cash }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block mb-4">Update Group Petty Cash</button></div>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection