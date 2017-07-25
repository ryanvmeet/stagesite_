<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@include('errors.validateError', ['errorName' => 'name'])

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
@include('errors.validateError', ['errorName' => 'description'])
@if(Auth::user()->getRole() == 'practical trainer' OR Auth::user()->getRole() == 'teacher')
    {!! Form::hidden('status_id', 3, NULL, ['class' => 'form-control', 'required']) !!}
@else
<div class="form-group">
    {!! Form::label('Status', 'Status:') !!}
    {!! Form::select('status_id', $statusArray, null, ['class' => 'form-control']) !!}
</div>
@endif
<div class="form-group">
    {!! Form::submit('Submit', array('class' => 'btn btn-primary form-control')) !!}
</div>