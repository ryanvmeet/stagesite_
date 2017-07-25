@extends('master')

@section('title', "Tool")

@section('content')
    <h1>Tool Formulier</h1>

    {!! Form::open(['route' => 'tool.store']) !!}
    @include('tool.forms.tool')
    {!! Form::close() !!}

@stop