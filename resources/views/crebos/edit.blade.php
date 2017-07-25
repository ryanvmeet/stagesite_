@extends('master')

@section('title', 'Edit Location')

@section('content')
    <h1>Edit Crebo</h1>
    {!! Form::model($crebo, ['route' => ['crebo.update', $crebo->id], 'method' => 'patch']) !!}
        @include('crebos.forms.crebo')
    {!! Form::close() !!}

@stop