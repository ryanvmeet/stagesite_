@extends('master')

@section('title', 'Edit contact')

@section('content')
    @if(Auth::user()->contact_id == $contact->id OR Auth::user()->getRole() == 'admin' )
        <h1>Edit contact</h1>
        {!! Form::model($contact, ['route' => ['contact.update', $contact->id], 'method' => 'put']) !!}
        @include('contact.forms.contact')
        {!! Form::close() !!}
    @endif
@stop