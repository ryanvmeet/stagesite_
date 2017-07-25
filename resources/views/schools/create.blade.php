@extends('master')

@section('title', 'Add a School')

@section('content')
    <h1>Add a school</h1>
    {!! Form::open(['route' => 'school.store']) !!}
    @include('schools.forms.create')
    {!! Form::close() !!}

@stop