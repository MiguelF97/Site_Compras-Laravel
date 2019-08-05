@extends('adminlte::page')

@section('title','New Product')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> New Product</h1>
            <hr>

            {!! Form::open(array('route' => 'products.store', 'files' => true)) !!}

                {{ Form::label('type', 'Type:') }}
                {{ Form::select('type', ['Music' => 'Music', 'Movie' => 'Movie', 'Game' => 'Game'], null, array('class' => 'form-control')) }}
                {{ Form::label('author', 'Author / Diretor / Criador:') }}
                {{ Form::text('author', null, array('class' => 'form-control')) }}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                {{ Form::label('genre', 'Genre / Plataforma (Jogo):') }}
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

                {{ Form::submit('Add New Product', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px')) }}
            {!! Form::close() !!}
        </div>
    </div>


@endsection