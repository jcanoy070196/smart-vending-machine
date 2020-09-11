@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-danger">Home</div>
            
                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in {{ $user->name }} ! -->

                    <div class="row mb-3">
                        <div class="col-xl-6 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Total Lifetime Inventory Count</h6>
                                    <h1 class="display-4">{{$total_inventory_count}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body bg-danger">
                                    <div class="rotate">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Total Lifetime Inventory Amount</h6>
                                    <h1 class="display-4">P {{ $total_inventory_amount }}</h1>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mb-3">
                    <div class="col-xl-6 col-sm-6 py-2">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body bg-info">
                                    <div class="rotate">
                                        <i class="fa fa-twitter fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Total Lifetime Sales Count</h6>
                                    <h1 class="display-4">{{ $total_sales_count }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 py-2">
                            <div class="card text-white bg-warning h-100">
                                <div class="card-body">
                                    <div class="rotate">
                                        <i class="fa fa-share fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">Total Lifetime Sales Amount</h6>
                                    <h1 class="display-4">P {{ $total_sales_amount }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
