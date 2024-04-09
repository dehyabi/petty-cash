@extends('layouts.main')

@section('content')

<div class="card-header">

        <a href="{{ route('all.group.petty.cash') }}"><i class="fas fa-arrow-left"></i></a> <span class="ml-2">Petty Cash > Group Petty Cash > Konfirmasi Delete</span>
</div>

<main> 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Delete Group Petty Cash</h4></div>
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-md text-center">
                                    <div class="form-group">
                                        <label class="mb-3">Apakah anda yakin akan menghapus data ini?</label>
                                        <div>{{ $group_petty_cash->group_petty_cash }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4"><a href="{{ route('delete.group.petty.cash', $group_petty_cash->id) }}" style="text-decoration: none"><button class="btn btn-danger btn-block">Delete Group Petty Cash</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection