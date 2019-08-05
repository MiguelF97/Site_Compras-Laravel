@extends('adminlte::page')

@section('title', 'All Users')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Users</h1>
        </div>

        <hr>
    </div>

    <div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th> {{$user->id}} </th>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->role}} </td>
                            <td><a href="{{ route('users.show',$user->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('users.edit',$user->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        {!! $users->links(); !!}
    </div>

@endsection