@extends('master')

@section('title', "Contact")

@section('content')
    <h1>Contact Formulier</h1>

    {!! Form::open(['route' => 'contact.store']) !!}
    @include('contact.forms.contact')
    {!! Form::close() !!}

@stop