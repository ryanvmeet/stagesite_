@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::model($review, ['route' => ['review.update', $review->id], 'method' => 'put']) !!}

                        <fieldset class="col-md-8">
                            <legend>Edit review</legend>
                            <div class="form-group ">
                                {!! Form::label('mark', 'Cijfer:*') !!}
                                {!! Form::text('mark', NULL, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group ">
                                {!! Form::label('review', 'review:*') !!}
                                {!! Form::textarea('review', NULL, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group ">
                                {!! Form::label('status', 'private:') !!}
                                {!! Form::checkbox('status', NULL, ['class' => 'form-control']) !!}
                            </div>

                            {!! Form::hidden('id',$review->id, NULL, ['class' => 'form-control', 'required']) !!}

                        </fieldset>
                        <div class="form-group col-md-12">
                            {!! Form::submit('Edit', ['class' => 'btn btn-primary form-control ']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
