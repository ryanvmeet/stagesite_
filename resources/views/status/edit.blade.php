@extends('master')

@section('title', 'Edit Status')

@section('content')
    <h1>Edit {{ $status->name }}</h1>
    {!! Form::model($status, ['route' => ['status.update', $status->id], 'method' => 'patch']) !!}
    @include('status.forms.status')
    {!! Form::close() !!}

@stop