@extends('master')

@section('title', 'Edit Schools')

@section('content')
    <h1>Edit {{ $school->name }}</h1>
    {!! Form::model($school, ['route' => ['school.update', $school->id], 'method' => 'patch']) !!}
    @include('schools.forms.school')
    {!! Form::close() !!}

@stop