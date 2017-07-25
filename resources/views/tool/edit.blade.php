@extends('master')

@section('title', 'Edit tool')

@section('content')
    <h1>Edit tool</h1>
    {!! Form::model($tool, ['route' => ['tool.update', $tool->id], 'method' => 'put']) !!}
    @include('tool.forms.tool')
    {!! Form::close() !!}
@stop