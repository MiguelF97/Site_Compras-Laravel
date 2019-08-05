@extends('adminlte::page')

@section('title','Edit User')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>User Number {{ $user->id }}</h1>

        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            {{ Form::label('email', 'E-mail:') }}
            {{ Form::text('email', null, array('class' => 'form-control')) }}
            {{ Form::label('role', 'Role:') }}
            {{ Form::select('role', ['guest' => 'Guest', 'admin' => 'Admin'], null, array('class' => 'form-control')) }}
            
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
                    {!! Html::linkRoute('users.show', 'Cancel', array($user->id), array('class' => 'btn btn-danger btn-block'))!!}
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