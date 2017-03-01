@extends('layouts.main')

@section('content')
<div class="col-xs-8">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>Dashboard</h3>
            <hr>
            <center>You are logged in!</center>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
@include('layouts.includes.sidebar')
@endsection