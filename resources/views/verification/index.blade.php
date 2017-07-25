@extends('master')

@section('title', 'Registered user verification')

@section('content')


    <div class="row">
        <div>
            <h2>Registered user verification</h2>
        </div>
    </div>
    @if(Auth::check())
        @if(Auth::user()->getRole() == 'admin')
            @foreach($contacts as $contact)
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('contact.show', $contact->id) }}">
                            {{ $contact->email }}
                        </a>
                        <div style="float:right;">
                            {!! Form::open(['route' => ['verification.update', $contact->id], 'method' => 'patch', 'style' => 'display:inline']) !!}
                            {!! Form::submit("accept", ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['verification.destroy', $contact->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                            {!! Form::submit("decline", ['class' => 'btn btn-danger delete']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endif
@stop