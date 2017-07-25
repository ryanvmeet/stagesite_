@extends('master')

@section('title', 'scholen')

@section('content')

    <div class="row">
        <h3>
            {{ $school->name }}
        </h3>
    </div>
    @if(isset($addresses))
    @foreach ($addresses as $array)
        @foreach ($array as $address)
            <div class="row">
                <div class="col-md-5">
                    street:<br>
                    Streetnumber:<br>
                    postcode:<br>
                    city:
                </div>
                <div class="col-md-5">
                    {{ $address->street }}<br>
                    {{ $address->streetnumber }}<br>
                    {{ $address->postcode }}<br>
                    {{ $address->state }}
                </div>
                @if(Auth::check())
                    @if(Auth::user()->getRole() == 'teacher' OR Auth::user()->getRole() == 'admin')
                        <?php $contact_info = \App\Contact::findorfail(Auth::user()->contact_id); ?>
                        @if($contact_info->school_id == $school->id OR Auth::user()->getRole() == 'admin')
                <div class="col-md-1">
                    <a href="{{ route('location.edit', $address->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                </div>
                <div class="col-md-1">
                    {!! Form::open(['route' => ['location.destroy', $address->id], 'method' => 'delete', 'class'=>'delete inline']) !!}
                    {!! Form::submit("trash", ['class' => 'btn btn-danger delete ']) !!}
                    {!! Form::close() !!}
                </div>
                        @endif
                    @endif
                @endif

            </div>
            <hr>
        @endforeach
    @endforeach
    @endif

    @if(isset($teachers))
        <div class="row">
            <h3>Teachers</h3>
            <blockquote>
            @foreach($teachers as $teacher)
                @if(Auth::check())
                    @if(Auth::user()->contact_id == $teacher->id)
                    <a href="{{ Route('profile.index') }}">
                        @if(isset($teacher->insertion))
                            {{ $teacher->firstname }} {{ $teacher->insertion }} {{ $teacher->surename }}
                        @else
                            {{ $teacher->firstname }} {{ $teacher->surename }}
                        @endif
                    </a>
                    @else
                    <a href="{{ Route('contact.show', $teacher->id) }}">
                        @if(isset($teacher->insertion))
                            {{ $teacher->firstname }} {{ $teacher->insertion }} {{ $teacher->surename }}
                        @else
                            {{ $teacher->firstname }} {{ $teacher->surename }}
                        @endif
                    </a>
                    @endif
                @else
                    <a href="{{ Route('contact.show', $teacher->id) }}">
                        @if(isset($teacher->insertion))
                            {{ $teacher->firstname }} {{ $teacher->insertion }} {{ $teacher->surename }}
                        @else
                            {{ $teacher->firstname }} {{ $teacher->surename }}
                        @endif
                    </a>
                @endif
            @endforeach
            </blockquote>
        </div>
    @endif

    @if(isset($students))
        <div class="row">
            <h3>Students</h3>
            <blockquote>
                @foreach($students as $student)
                @if(Auth::check())
                    @if(Auth::user()->contact_id == $student->id)
                            <a href="{{ Route('profile.index') }}">
                            @if(isset($student->insertion))
                                {{ $student->firstname }} {{ $student->insertion }} {{ $student->surename }}
                            @else
                                {{ $student->firstname }} {{ $student->surename }}
                            @endif
                        </a>
                    @else
                        <a href="{{ Route('contact.show', $student->id) }}">
                            @if(isset($student->insertion))
                                {{ $student->firstname }} {{ $student->insertion }} {{ $student->surename }}
                            @else
                            {{ $student->firstname }} {{ $student->surename }}
                            @endif
                        </a>
                    @endif
                @else
                        <a href="{{ Route('contact.show', $student->id) }}">
                            @if(isset($student->insertion))
                                {{ $student->firstname }} {{ $student->insertion }} {{ $student->surename }}
                            @else
                                {{ $student->firstname }} {{ $student->surename }}
                            @endif
                        </a>
                @endif
                @endforeach
            </blockquote>
        </div>
    @endif
    @if(Auth::check())
        @if(Auth::user()->getRole() == 'teacher' OR Auth::user()->getRole() == 'admin')
            <?php $contact_info = \App\Contact::findorfail(Auth::user()->contact_id); ?>
            @if($contact_info->school_id == $school->id  OR Auth::user()->getRole() == 'admin')
                <div class="row">
        <div class="col-md-12">
            <h4>Add a location</h4>

            {!! Form::open(['route' => 'location.store']) !!}
            @include('locations.forms.location')
            {!! Form::close() !!}
        </div>
    </div>
            @endif
        @endif
    @endif

@stop

@section('content')

    <link rel="stylesheet" href="{{ asset('js/main.js') }}" type="text/css">

@stop