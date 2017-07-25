@extends('master')

@section('title', "$company->name")

@section('content')

    <div class="row">
        <h3>
            {{ $company->name }}
        </h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            Tel:<br>
        </div>
        <div class="col-md-6">
            {{ $company->phonenumber }}<br>
        </div>
    </div>

    <div class="row">
        <h5><b>Contacts</b></h5>
        <blockquote>
            @foreach($contacten as $contact)
                <a href="{{ route('contact.show', $contact->id) }}">
                    <p>
                        {{ $contact->firstname }}
                    </p>
                </a>
                <?php
                    if(Auth::check())
                        {
                            $check;
                            if ($contact->id == Auth::user()->contact_id)
                            {
                                $check = TRUE;
                            }
                        }
                ?>
            @endforeach
        </blockquote>
    </div>
    @if($stages != NULL)
    <div class="row">
        <h5><b>Internships</b></h5>
        <blockquote>
            @foreach($stages as $array)
                @foreach($array as $stage)
                    <a href="{{ route('internship.show', $stage->id) }}">
                        <p>
                            <h4>{{ $stage->name }} | Status: {{ $stage->status }}</h4>
                        </p>
                    </a>
                @endforeach
            @endforeach
        </blockquote>
    </div>
    @endif
    @if(Auth::check())
    @if(isset($check) OR Auth::user()->getRole() == 'admin')
        <div class="row">
            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-default"> <span
                        class="glyphicon glyphicon-pencil"></span></a>
        </div>
    @endif
    @endif

@stop