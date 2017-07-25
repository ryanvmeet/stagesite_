@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <div>
                        {!! Form::open(['url' => ['/search/'], 'method' => 'POST']) !!}

                        <fieldset class="col-md-12">
                            <legend>Filter</legend>
                            <div class="form-group ">
                                {!! Form::label('zoekt', 'Company with a status: searching') !!}
                                {!! Form::Checkbox('zoekt', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('done', 'Have there already been interships') !!}
                                {!! Form::checkbox('done', null, ['class' => 'form-control']) !!}
                            </div>
                        </fieldset>

                        <div class="form-group col-md-6">
                            {!! Form::submit('Search', ['class' => 'btn btn-primary form-control ']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                <div class="panel-body">
                <h1>Companies:</h1>
                @foreach($company as $c)
                        <div class="well-lg col-md-12">
                            <p>
                                <h2>{{ $c->name }}</h2>
                            </p>
                                <div>
                                    @foreach($c->contacts as $co)
                                    <p><h3>Practicle trainer:
                                        {{ $co->firstname }} {{ $co->surename }}
                                        </h3>
                                    </p>
                                        @foreach($co->internships as $internship)
                                            <div class="well">
                                            <p>Title:
                                                {{ $internship->name }}
                                            </p>
                                            <p>Internship dates:
                                                From {{ $internship->begin }} till @if($internship->end == null) @else{{ $internship->end }} @endif
                                            </p>

                                            <p>Status:
                                                {{ $internship->status->name }}
                                            </p>
                                                <a href="{{ route('internship.show', [$internship->id]) }}" class="btn btn-primary">Read more</a>
                                            @if(Auth::check())
                                                    <?php
                                                    $contact = \App\Contact::findorfail(Auth::user()->contact_id);
                                                    ?>
                                                @if(Auth::user()->getRole() == 'practical trainer' OR Auth::user()->getRole() == 'admin' )
                                                    @if($contact->id == $internship->contact_id OR Auth::user()->getRole() == 'admin' )
                                                        <a href="{{ route('internship.edit', $internship->id) }}" class="btn btn-info">Edit</a>
                                                        {{--{!! Form::open(['route' => ['internship.destroy', $internship->id], 'method' => 'delete', 'class'=>'delete inline']) !!}
                                                        {!! Form::submit("trash", ['class' => 'btn btn-danger delete ']) !!}
                                                        {!! Form::close() !!}--}}
                                                    @endif
                                                @endif
                                            @endif
                                            </div>
                                            @endforeach
                                    @endforeach
                                </div>
                            <a href="{{ route('company.show', $c->id) }}" class="btn btn-primary">Read more about {{ $c->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 