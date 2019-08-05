@extends('layouts.master')

@section('title')
Ypslon Shop
@endsection

@section('content')

@foreach($products->chunk(3) as $productChunk)
<div class="row">
@foreach($productChunk as $product)
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <h6> {{ $product->type . ' -> ' . $product->genre }} </h6>
        <img src="{{asset('images/products/' . $product->image)}}">
    <div class="caption">
        <h3>{{ $product->author . ' - ' . $product->name }}</h3>
        <div class="clearfix">
        <div> {{ $product->price . ' €' }}</div>
        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-primary mb-2 pull-right" role="button">Add To Cart</a>
    </div>
</div>
</div>
</div>
@endforeach
</div>

@endforeach

@endsection