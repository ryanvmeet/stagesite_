@extends('master')

@section('title', 'scholen')

@section('content')


    <div class="row">
        <div>
            <h2>Scholen</h2>
        </div>
    </div>
    @foreach($schools as $school)
        <div class="row">
            <a href="{{ route('school.show', $school->id)}}" class="btn btn-link">
                <div class="col-md-12">
                    {{ $school->name }}
                    @if(Auth::check())
                        @if(Auth::user()->getRole() == 'teacher')
                            <?php $contact = \App\Contact::findorfail(Auth::user()->contact_id) ?>
                            @if($contact->school_id == $school->id)
                    <div style="float:right;">
                        <a href="{{ route('school.edit', $school->id) }}" class="btn btn-default"> <span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        {!! Form::open(['route' => ['school.destroy', $school->id], 'method' => 'delete', 'class'=>'delete inline']) !!}
                        {!! Form::submit("trash", ['class' => 'btn btn-danger delete ']) !!}
                        {!! Form::close() !!}
                    </div>
                        @endif
                        @endif
                        @endif
                </div>
            </a>
        </div>
    @endforeach
@stop