@extends('adminlte::page')

@section('title', 'View User Info')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>User Number {{ $user->id }}</h1>

            {!! Form::open(['route' => 'users.store']) !!}

                <li>{{ Form::label('name', 'Name:') }}
                {{ Form::label('name', $user->name ) }}</li>
                <li>{{ Form::label('email', 'E-mail:') }}
                {{ Form::label('email', $user->email) }}</li>
                <li>{{ Form::label('role', 'Role:') }}
                {{ Form::label('role', $user->role ) }}</li>
                
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd> {{ date('M j, Y H:i:s', strtotime($user->created_at)) }}</dd>
                </dl>
                <hr>
                <dl class="dl-horizontal">
                    <dt>Last update:</dt>
                    <dd> {{ date('M j, Y H:i:s',strtotime($user->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary btn-block'))!!}
                    </div>
                    <div class="col-sm-6">
                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])!!}

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection