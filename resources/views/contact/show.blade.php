@extends('master')

@section('title', "$contact->firstname", "$contact->surename")

@section('content')

    <div class="row">
        <h3>
            {{ $contact->firstname }} {{ $contact->insertion }} {{ $contact->surename }}
        </h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            Email:<br>
            Tel:<br>

            @if($company != NULL)
            Company:
            @elseif($school != NULL)
            School:
            @endif
        </div>
        <div class="col-md-6">
            {{ $contact->email }}<br>
            {{ $contact->phonenumber }}<br>
            @if($company != NULL)
                <a href="{{ route('company.show', $company->id) }}">{{ $company->name }}</a>
            @elseif($school != NULL)
                <a href="{{ route('school.show', $school->id) }}">{{ $school->name }}</a>
            @endif
        </div>
    </div>

    <div>
        @if(Auth::check())
                @if(Auth::user()->contact_id == $contact->id OR Auth::user()->getRole() == 'admin' )
                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-default"> <span class="glyphicon glyphicon-pencil"></span></a>
                @endif
            @if(Auth::user()->getRole() == 'admin' )
                {!! Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                        {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                        {!! Form::close() !!}
            @endif
        @endif
    </div>
@stop