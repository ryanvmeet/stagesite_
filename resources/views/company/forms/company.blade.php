<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@include('errors.validateError', ['errorName' => 'name'])

<div class="form-group">
    {!! Form::label('phonenumber', 'Phone number:') !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control']) !!}
</div>
@include('errors.validateError', ['errorName' => 'phonenumber'])

<div class="form-group">
    {!! Form::submit('Submit', array('class' => 'btn btn-primary form-control')) !!}
</div>