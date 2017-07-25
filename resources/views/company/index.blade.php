@extends('master')

@section('title', 'Company')

@section('content')
    <h1>Companies</h1>
    <div class="contact-wrapper">
        @foreach($company as $companys)
            <div class="row">
                <a href="{{ route('company.show', $companys->id) }}">
                    {{ $companys->name }}

                </a>
                <div style="float:right;">
                    <a href="{{ route('company.edit', $companys->id) }}" class="btn btn-default"> <span
                                class="glyphicon glyphicon-pencil"></span></a>
                    {!! Form::open(['route' => ['company.destroy', $companys->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                    {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                    {!! Form::close() !!}
                </div>
             {{--   <a href="{{ route('company.destroy', $companys->id) }}" data-token="{{ csrf_token() }}" class="delete">Verwijderen</a>
                <a href="{{ route('company.edit', $companys->id) }}">Wijzig</a>--}}
            </div>
        @endforeach
    </div>
@stop
