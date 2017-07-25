@extends('master')

@section('title', 'Edit Location')

@section('content')
    <h1>Edit Location</h1>

    {!! Form::model($location, ['route' => ['location.update', $location->id], 'method' => 'patch']) !!}
    @include('locations.forms.location')
    {!! Form::close() !!}

@stop