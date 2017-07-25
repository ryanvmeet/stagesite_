@extends('master')

@section('title', 'Contact')

@section('content')
    <h1>Contacten</h1>
    <div class="contact-wrapper">
        @foreach($contacts as $contact)
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('contact.show', $contact->id) }}">
                        {{ $contact->firstname }}
                        {{ $contact->insertion }}
                        {{ $contact->surename }}
                    </a>
                    <div style="float:right;">
                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-default"> <span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                        {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

