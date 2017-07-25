@extends('master')

@section('title', 'Add a Location')

@section('content')
    <h1>Add an education offer</h1>
    {!! Form::open(['route' => 'crebo.store']) !!}
    @include('crebos.forms.crebo')
    {!! Form::close() !!}

@stop