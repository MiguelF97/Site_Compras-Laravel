@if (Auth::user() && Auth::user()->role == 'admin')

@extends('adminlte::page')

@section('title', 'Ypslon Admin')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop

@endif