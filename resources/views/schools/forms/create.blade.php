<div class="form-group">
    {!! Form::label('name', 'school:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('street', 'street:') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('streetnumber', 'streetnumber:') !!}
    {!! Form::text('streetnumber', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('postcode', 'postcode:') !!}
    {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state', 'city:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
</div>