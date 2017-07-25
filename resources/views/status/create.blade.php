@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a new Internship</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => ['status'], 'method' => 'POST']) !!}

                        <fieldset class="col-md-5">
                            <legend>persoonlijke gegevens</legend>
                            <div class="form-group ">
                                {!! Form::label('name', 'Naam:*') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Categorie', 'Categorie:') !!}
                                {!! Form::select('categorie_id', $categorieArray, null, ['class' => 'form-control']) !!}
                            </div>
                        </fieldset>

                        <div class="form-group col-md-12">
                            {!! Form::submit('status toevoegen!', ['class' => 'btn btn-primary form-control ']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
