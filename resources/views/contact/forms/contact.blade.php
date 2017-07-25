<div class="form-group">
    {!! Form::label('firstname', 'Firstname:') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>
@include('errors.validateError', ['errorName' => 'firstname'])

<div class="form-group">
    {!! Form::label('insertion', 'Insertion:') !!}
    {!! Form::text('insertion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('surename', 'Surename:') !!}
    {!! Form::text('surename', null, ['class' => 'form-control']) !!}
</div>
@include('errors.validateError', ['errorName' => 'surename'])

<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phonenumber', 'Phone number:') !!}
    {!! Form::text('phonenumber', null, ['class' => 'form-control']) !!}
</div>
@if(Auth::check())
    @if (Auth::user()->getRole() == 'practical trainer')
        <div class="form-group">
            {!! Form::label('Company', 'Company:') !!}
            {!! Form::select('company_id', $companyArray, null, ['class' => 'form-control']) !!}
        </div>
    @endif

    @if (Auth::user()->getRole() == 'teacher')
        <div class="form-group">
            {!! Form::label('School', 'School:') !!}
            {!! Form::select('school_id', $schoolsArray, null, ['class' => 'form-control']) !!}
        </div>
    @endif
@endif
<div class="form-group">
    {!! Form::submit('Submit', array('class' => 'btn btn-primary form-control')) !!}
</div>