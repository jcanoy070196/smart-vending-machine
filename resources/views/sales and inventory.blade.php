@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                <div class="card-header  text-white bg-danger">Sales and Inventory</div>
                <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="inventory-status-home-tab" data-toggle="pill" href="#pills-inventory-status" role="tab" aria-controls="pills-inventory-status" aria-selected="true">Inventory Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="inventory-home-tab" data-toggle="pill" href="#pills-inventory" role="tab" aria-controls="pills-inventory" aria-selected="true">Inventory History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-sales-tab" data-toggle="pill" href="#pills-sales" role="tab" aria-controls="pills-sales" aria-selected="false">Sales</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-inventory-status" role="tabpanel" aria-labelledby="pills-inventory-status-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory_configs as $inventory_config)
                                    <tr>
                                    <th scope="row">{{$inventory_config->id}}</th>
                                    <td>{{$inventory_config->product->name}}</td>
                                    <td>{{$inventory_config->quantity}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           
                        </div>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#inventoryModal">Add Inventory Item</button>
                    </div>
                    <div class="tab-pane fade" id="pills-inventory" role="tabpanel" aria-labelledby="pills-inventory-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Batch ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory_items as $inventory_item)
                                    <tr>
                                    <th scope="row">{{$inventory_item->id}}</th>
                                    <td>{{$inventory_item->user->name}}</td>
                                    <td>{{$inventory_item->product->name}}</td>
                                    <td>{{$inventory_item->quantity}}</td>
                                    <td>P {{$inventory_item->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-sales" role="tabpanel" aria-labelledby="pills-sales-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Sales ID</th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales_items as $sales_item)
                                    <tr>
                                    <th scope="row">{{$sales_item->id}}</th>
                                    <td>{{$sales_item->student->idNumber}} </td>
                                    <td>{{$sales_item->student->firstName}} {{$sales_item->student->lastName}}</td>
                                    <td>{{$sales_item->product->name}}</td>
                                    <td>{{$sales_item->quantity}}</td>
                                    <td>P {{$sales_item->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="inventoryModalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inventoryModalTitle">Add Inventory Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <form id="inventoryForm" method="POST" action="{{ url('api/inventory-items') }}">
                            <div class="form-group">
                                <label for="productLabel">Product</label>
                                <select name="productSelect" class="form-control" id="productSelect">
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input min="1" value="1" name="quantity" id="quantity" class="form-control" type="number" placeholder="Quantity">
                            </div>
                            <div class="form-group" style="display : none">
                                <input  value="{{ Auth::user()->id }}" name="userId" id="userId" class="form-control" type="number" placeholder="userId">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onClick="onSubmit()">Add Item</button>
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
