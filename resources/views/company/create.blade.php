@extends('master')

@section('title', "Company")

@section('content')
    <h1>Company Formulier</h1>

    {!! Form::open(['route' => 'company.store']) !!}
    @include('company.forms.company')
    {!! Form::close() !!}

@stop