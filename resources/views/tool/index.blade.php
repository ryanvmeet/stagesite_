@extends('master')

@section('title', 'Tool')

@section('content')

    <div class="row">
        <div>
            <h2>Tools</h2>
        </div>
    </div>
    @foreach($tool as $tools)
        <div class="row">
            <a href="{{ route('tool.show', $tools->id) }}" class="btn btn-link">
                <div class="col-md-12">
                    {{ $tools->name }}
                    <div style="float:right;">
                        <a href="{{ route('tool.edit', $tools->id) }}" class="btn btn-default"> <span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        @if(Auth::check())
                        @if(Auth::user()->getRole() == 'admin')
                        {!! Form::open(['route' => ['tool.destroy', $tools->id], 'method' => 'delete', 'class'=>'delete inline']) !!}
                        {!! Form::submit("trash", ['class' => 'btn btn-danger delete ']) !!}
                        {!! Form::close() !!}
                            @endif
                            @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@stop
