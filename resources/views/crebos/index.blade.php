@extends('master')

@section('title', 'education offers')

@section('content')
    <h1>education offers</h1>
    <div class="contact-wrapper">
        <a href="{{ Route('crebo.create') }}">Create</a>
        @foreach($infos as $info)
            <div class="row">
                <div class="col-md-12"><p>
                        {{ $info->name }}
                        @if(Auth::user()->getRole() == 'admin')
                        {!! Form::open(['route' => ['crebo.destroy', $info->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                        {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                        {!! Form::close() !!}
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@stop

