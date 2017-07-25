@extends('master')

@section('title', 'Add a Location')

@section('content')
    <h1>Add a school</h1>
    {!! Form::open(['route' => 'location.store', $school]) !!}
    @include('locations.forms.location')
    {!! Form::close() !!}

@stop