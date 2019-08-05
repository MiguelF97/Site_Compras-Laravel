@extends('adminlte::page')

@section('title', ' | View Product Data')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Product Number {{ $product->id }}</h1>

            <img src="{{asset('images/products/' . $product->image)}}">
            {!! Form::open(['route' => 'products.store']) !!}

                <li>{{ Form::label('type', 'Type:') }}
                {{ Form::label('type', $product->type ) }}</li>
                <li>{{ Form::label('author', 'Author / Director / Creator:') }}
                {{ Form::label('author', $product->author ) }}</li>
                <li>{{ Form::label('name', 'Name:') }}
                {{ Form::label('name', $product->name ) }}</li>
                <li>{{ Form::label('genre', 'Genre / Game Platform:') }}
                {{ Form::label('genre', $product->genre ) }}</li>
                <li>{{ Form::label('release', 'Release Date:') }}
                {{ Form::label('release', $product->release ) }}</li>
                <li>{{ Form::label('price', 'Price:') }}
                {{ Form::label('price', $product->price.'€' ) }}</li>

            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd> {{ date('M j, Y H:i:s', strtotime($product->created_at)) }}</dd>
                </dl>
                <hr>
                <dl class="dl-horizontal">
                    <dt>Last update:</dt>
                    <dd> {{ date('M j, Y H:i:s',strtotime($product->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-primary btn-block'))!!}
                    </div>
                    <div class="col-sm-6">
                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])!!}

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection