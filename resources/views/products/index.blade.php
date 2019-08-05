@extends('adminlte::page')

@section('title', 'All Products')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Products</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('products.create') }}" class="btn btn-lg btn-block btn-primary">Add New Product</a>
        </div>
        <hr>
    </div>

    <div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Type</th>
                    <th>Author / Director / Creator</th>
                    <th>Name</th>
                    <th>Genre / Game Platform</th>
                    <th>Release Date</th>
                    <th>Price (€)</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th> {{$product->id}} </th>
                            <td> {{$product->type}} </td>
                            <td> {{$product->author}} </td>
                            <td> {{$product->name}} </td>
                            <td> {{$product->genre}} </td>
                            <td> {{date('M j, Y', strtotime($product->release))}} </td>
                            <td> {{$product->price}} </td>
                            <td><a href="{{ route('products.show',$product->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('products.edit',$product->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        {!! $products->links(); !!}
    </div>

@endsection