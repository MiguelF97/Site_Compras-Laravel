@extends('adminlte::page')

@section('title',' | Edit Product')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Product Number {{ $product->id }}</h1>

        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}

        {{ Form::label('type', 'Type:') }}
        {{ Form::select('type', ['Music' => 'Music', 'Movie' => 'Movie', 'Game' => 'Game'], null, array('class' => 'form-control')) }}
        {{ Form::label('author', 'Author / Diretor / Criador:') }}
        {{ Form::text('author', null, array('class' => 'form-control')) }}
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
        {{ Form::label('genre', 'Genre / Game Platform:') }}
        {{ Form::select('genre', 
                ['error1' => '---------- MUSIC ONLY ----------', 'Funk' => 'Funk', 'Dance' => 'Dance', 'Fado' => 'Fado', 'Rap' => 'Rap',
                'error2' => '---------- MOVIE ONLY ----------' , 'Comédia' => 'Comédia', 'Terror' => 'Terror', 'Ação' => 'Ação', 'Animação' => 'Animação',
                'error3' => '---------- GAME ONLY ----------', 'PS4' => 'PS4', 'XBOX' => 'XBOX', 'PC' => 'PC'], null, array('class' => 'form-control')) }}
        {{ Form::label('release', 'Release Date:') }}
        {{ Form::date('release', \Carbon\Carbon::now(), array('class' => 'form-control')) }}
        {{ Form::label('price', 'Price: (e.g. 0.99)') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
        {{ Form::label('image', 'Upload an Image:')}}
        {{ Form::file('image')}}

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
                    {!! Html::linkRoute('products.show', 'Cancel', array($product->id), array('class' => 'btn btn-danger btn-block'))!!}
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection