@extends('master')

@section('title', "$tool->name")

@section('content')

    <div class="row">
        <h3>
            {{ $tool->name }}
        </h3>
    </div>
    <div class="row">
        <div class="col-md-5">
            Description:
        </div>
        <div class="col-md-5">
            {{ $tool->description }}<br>
        </div>
</div>
    <div class="row">
        <div class="col-md-5">
                Status:
        </div>
        <div class="col-md-5">
        {{ $status->name }}
        </div>

    @if(Auth::check())
            @if(Auth::user()->getRole() == 'admin')
                <div class="col-md-12">
                    <a href="{{ route('tool.edit', $tool->id) }}" class="btn btn-default"> <span
                        class="glyphicon glyphicon-pencil"></span></a>
                    {!! Form::open(['route' => ['tool.destroy', $tool->id], 'method' => 'delete', 'class'=>'delete inline']) !!}
                    {!! Form::submit("trash", ['class' => 'btn btn-danger delete ']) !!}
                    {!! Form::close() !!}
                </div>
            @endif
        @endif
    </div>

@stop


