@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header text-white bg-danger">Notifications</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Notification Message</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                            <tr>
                            <th scope="row">{{ $notification->id }}</th>
                            <td>{{ $notification->name }}</td>
                            <td>{{ $notification->product->name }}</td>
                            <td>{{ $notification->created_at }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>


            
            </div>
        </div>
    </div>
</div>
@endsection
